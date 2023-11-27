<?php

namespace App\Http\Controllers;

use App\Models\TransaksiBooking;
use App\Models\vila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Booking;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function index()
    {
    $transaksi = TransaksiBooking::with('vila')->get();
    return view('booking.index', compact('transaksi'));
    }
    public function showBookingForm($id)
    {
        $vila = vila::findOrFail($id);
        return view('customers.booking', compact('vila'));
    }
    public function createBookingForm($id)
    {
        $vila = vila::findOrFail($id);
        return view('customers.booking', compact('vila'));
    }
    private function isWeekend(\DateTime $date)
{
    return $date->format('N') >= 5; // Sabtu memiliki nilai 6 dan Minggu memiliki nilai 7 dalam format ISO-8601 (1 = Senin, 2 = Selasa, dst.)
}
    public function createBooking(Request $request)
    {
        // Validasi data
        $request->validate([
            'villa_id' => 'required|exists:vilas,id',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'notelp' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'metode_pembayaran' => 'required',
            'jumlah_dewasa' => 'required|integer|min:0',
            'jumlah_anak' => 'required|integer|min:0',
            'jumlah_balita' => 'required|integer|min:0',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        // Hitung total bayar
    $villa = vila::findOrFail($request->villa_id);
    $checkInDate = Carbon::createFromFormat('Y-m-d', $request->check_in);
    $checkOutDate = Carbon::createFromFormat('Y-m-d', $request->check_out);
    $diffDays = $checkOutDate->diffInDays($checkInDate); // Tambahkan 1 hari karena termasuk hari check-out

    // Tentukan harga yang akan digunakan berdasarkan weekday atau weekend
    $harga = $this->isWeekend($checkInDate) ? $villa->harga_weekend : $villa->harga;

    $totalBayar = $harga * $diffDays;

        // Simpan data pemesanan ke tabel transaksi_booking
        $transaksiBooking = new TransaksiBooking([
            'id_villa' => $request->villa_id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_bayar' => $totalBayar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_dewasa' => $request->jumlah_dewasa,
            'jumlah_anak' => $request->jumlah_anak,
            'jumlah_balita' => $request->jumlah_balita,
            'no_booking' => $this->autonumber(),
            // Tambahkan kolom lainnya sesuai kebutuhan
        ]);
        $transaksiBooking->save();

        // Set session flash 'no_booking' dengan nomor booking yang baru
        session(['no_booking' => $transaksiBooking->no_booking]);

        // Simpan session
        session()->save();

        // Redirect pengguna kembali ke halaman index atau halaman pemesanan sukses
        return redirect()->route('customers.index')->with('wa_message', 'Terima kasih telah memesan villadibandung.com ! Klik tombol di bawah ini untuk verifikasi booking anda via WhatsApp.');
    }
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan oleh form
        $request->validate([
            // sesuaikan validasi dengan kebutuhan Anda
            'nama_lengkap' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'notelp' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'metode_pembayaran' => 'required',
            'total_bayar' => 'required',
            // ... tambahkan validasi lainnya sesuai kebutuhan Anda
        ]);

        // Cari data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Update data booking berdasarkan input form
        $booking->update($request->all());

        // Redirect ke halaman edit dengan pesan sukses
        return redirect()->route('booking.index', $booking->id)->with('success', 'Data booking berhasil diupdate.');
    }
    public function edit($id)
    {
        // Ambil data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Tampilkan halaman edit booking dengan data yang diambil
        return view('booking.edit', compact('booking'));
    }

    // Fungsi untuk menghapus data booking
    public function destroy($id)
    {
        // Cari data booking berdasarkan ID
        $booking = Booking::findOrFail($id);

        // Hapus data booking
        $booking->delete();

        // Redirect ke halaman index setelah berhasil dihapus
        return redirect()->route('booking.index')->with('success', 'Data booking berhasil dihapus.');
    }
    public function autonumber() {
        // Mengambil Booking terbaru berdasarkan waktu dibuat
        $last = Booking::orderBy("waktu_dibuat", "DESC")->first();
        $number = 1;
    
        if ($last != null) {
            // Mengambil nomor antrian dari kode Booking terbaru
            $lastNumber = intval(substr($last->no_booking, -3)) + 1;
            // Menambahkan 1 ke nomor antrian terakhir
            $number = $lastNumber;
        }
    
        $number = str_pad($number, 3, "0", STR_PAD_LEFT);
    
        // $current_date = date("d");
        $current_month = date("m");
        $current_year = date("Y");
    
        return $current_year . $current_month . $number;
    }
    
}