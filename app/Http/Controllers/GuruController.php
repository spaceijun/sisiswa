<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Models\Superadmin\Kela;
use App\Models\Superadmin\Siswa;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
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

        $siswa->update($request->only('penilaian'));

        return Redirect::route('guru.data.index')
            ->with('success', 'Penilaian siswa updated successfully');
    }
}
