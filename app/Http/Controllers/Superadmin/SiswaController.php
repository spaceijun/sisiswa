<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Models\Superadmin\Kela;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $siswas = Siswa::paginate();

        return view('superadmin.siswa.index', compact('siswas'))
            ->with('i', ($request->input('page', 1) - 1) * $siswas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $siswa = new Siswa();
        $kelas = Kela::all();
        $users = User::where('role', 'Siswa')->get();
        $orangtuas = User::where('role', 'OrangTua')->get();

        return view('superadmin.siswa.create', compact('siswa', 'kelas', 'users', 'orangtuas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiswaRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('siswa', $imageName, 'public');

            $validatedData['image'] = 'siswa/' . $imageName;
        }

        Siswa::create($validatedData);

        return Redirect::route('superadmin.siswas.index')
            ->with('success', 'Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $siswa = Siswa::find($id);

        return view('superadmin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $siswa = Siswa::find($id);
        $kelas = Kela::all();
        $users = User::where('role', 'Siswa')->get();
        $orangtuas = User::where('role', 'OrangTua')->get();


        return view('superadmin.siswa.edit', compact('siswa', 'kelas', 'users', 'orangtuas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiswaRequest $request, Siswa $siswa): RedirectResponse
    {
        $siswa->update($request->validated());

        return Redirect::route('superadmin.siswas.index')
            ->with('success', 'Siswa updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Siswa::find($id)->delete();

        return Redirect::route('superadmin.siswas.index')
            ->with('success', 'Siswa deleted successfully');
    }
}
