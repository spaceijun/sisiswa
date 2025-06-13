<?php

namespace App\Http\Controllers;

use App\Services\FonnteService;
use App\Http\Requests\SiswaRequest;
use App\Models\Superadmin\Kela;
use App\Models\Superadmin\Siswa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index');
    }

    public function siswa(Request $request): View
    {
        $siswas = Siswa::paginate();

        return view('guru.siswa.index', compact('siswas'))
            ->with('i', ($request->input('page', 1) - 1) * $siswas->perPage());
    }

    public function editSiswa($id): View
    {
        $siswa = Siswa::find($id);
        $kelas = Kela::all();
        $users = User::where('role', 'Siswa')->get();

        return view('guru.siswa.edit', compact('siswa', 'kelas', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSiswa(Request $request, Siswa $siswa): RedirectResponse
    {
        $request->validate([
            'penilaian' => 'required|numeric|min:0|max:100'
        ]);

        // Simpan nilai lama untuk perbandingan (opsional)
        $nilaiLama = $siswa->penilaian;

        // Update penilaian siswa
        $siswa->update($request->only('penilaian'));

        // Kirim notifikasi WhatsApp ke siswa dan orangtua
        try {
            $fonnteService = new FonnteService();
            $deviceToken = env('FONNTE_DEVICE_TOKEN');

            // 1. Kirim notifikasi ke siswa (dari table siswa column telephone)
            if (!empty($siswa->telephone)) {
                $messageSiswa = "🎓 *NOTIFIKASI PENILAIAN* 🎓\n\n";
                $messageSiswa .= "Halo {$siswa->nama_siswa},\n\n";
                $messageSiswa .= "Penilaian Anda telah diperbarui:\n";
                $messageSiswa .= "📊 Nilai: *{$request->penilaian}*\n";

                // Tambahkan informasi perubahan jika ada nilai sebelumnya
                if ($nilaiLama !== null) {
                    $messageSiswa .= "📈 Nilai Sebelumnya: {$nilaiLama}\n";
                }

                $messageSiswa .= "\nTerima kasih atas dedikasi Anda dalam belajar! 💪\n\n";
                $messageSiswa .= "_Pesan ini dikirim secara otomatis dari sistem akademik._";

                // Kirim ke siswa
                $resultSiswa = $fonnteService->sendWhatsAppMessage(
                    $siswa->telephone,
                    $messageSiswa,
                    $deviceToken
                );

                // Log hasil pengiriman ke siswa
                if ($resultSiswa['status']) {
                    Log::info('WhatsApp notification sent to student successfully', [
                        'siswa_id' => $siswa->id,
                        'phone' => $siswa->telephone,
                        'penilaian' => $request->penilaian
                    ]);
                } else {
                    Log::error('Failed to send WhatsApp notification to student', [
                        'siswa_id' => $siswa->id,
                        'phone' => $siswa->telephone,
                        'error' => $resultSiswa['error']
                    ]);
                }
            } else {
                Log::warning('Student has no telephone number', ['siswa_id' => $siswa->id]);
            }

            // 2. Kirim notifikasi ke orangtua (dari table users column telephone)
            if (!empty($siswa->user->telephone)) {
                $messageOrangtua = "👨‍👩‍👧‍👦 *NOTIFIKASI PENILAIAN ANAK* 👨‍👩‍👧‍👦\n\n";
                $messageOrangtua .= "Yth. Bapak/Ibu Orangtua,\n\n";
                $messageOrangtua .= "Penilaian anak Anda telah diperbarui:\n";
                $messageOrangtua .= "👤 Nama: *{$siswa->nama_siswa}*\n";
                $messageOrangtua .= "🆔 NIS: {$siswa->nis}\n";
                $messageOrangtua .= "📊 Nilai: *{$request->penilaian}*\n";

                // Tambahkan informasi perubahan jika ada nilai sebelumnya
                if ($nilaiLama !== null) {
                    $messageOrangtua .= "📈 Nilai Sebelumnya: {$nilaiLama}\n";
                }

                // Tambahkan motivasi berdasarkan nilai
                if ($request->penilaian >= 85) {
                    $messageOrangtua .= "\n🌟 Anak Anda berprestasi sangat baik! 🌟";
                } elseif ($request->penilaian >= 70) {
                    $messageOrangtua .= "\n👍 Prestasi anak Anda cukup baik, mari terus dukung! 💪";
                } else {
                    $messageOrangtua .= "\n💪 Mari bersama mendukung anak untuk belajar lebih giat! 📚";
                }

                $messageOrangtua .= "\n\nTerima kasih atas perhatian dan dukungan Anda.\n\n";
                $messageOrangtua .= "_Pesan ini dikirim secara otomatis dari sistem akademik._";

                // Kirim ke orangtua
                $resultOrangtua = $fonnteService->sendWhatsAppMessage(
                    $siswa->user->telephone,
                    $messageOrangtua,
                    $deviceToken
                );

                // Log hasil pengiriman ke orangtua
                if ($resultOrangtua['status']) {
                    Log::info('WhatsApp notification sent to parent successfully', [
                        'siswa_id' => $siswa->id,
                        'parent_phone' => $siswa->user->telephone,
                        'penilaian' => $request->penilaian
                    ]);
                } else {
                    Log::error('Failed to send WhatsApp notification to parent', [
                        'siswa_id' => $siswa->id,
                        'parent_phone' => $siswa->user->telephone,
                        'error' => $resultOrangtua['error']
                    ]);
                }
            } else {
                Log::warning('Parent has no telephone number', ['siswa_id' => $siswa->id]);
            }
        } catch (\Exception $e) {
            // Jangan biarkan error WhatsApp mengganggu proses update
            Log::error('WhatsApp notification error', [
                'siswa_id' => $siswa->id,
                'error' => $e->getMessage()
            ]);
        }

        return Redirect::route('guru.data.index')
            ->with('success', 'Penilaian siswa updated successfully');
    }
}
