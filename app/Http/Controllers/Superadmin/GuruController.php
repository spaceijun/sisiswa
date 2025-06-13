<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Guru;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GuruRequest;
use App\Models\Superadmin\Kela;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $gurus = Guru::with('kela')->paginate();

        return view('superadmin.guru.index', compact('gurus'))
            ->with('i', ($request->input('page', 1) - 1) * $gurus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $guru = new Guru();
        $kelas = Kela::all();
        $users = User::where('role', 'Guru')->get();

        return view('superadmin.guru.create', compact('guru', 'kelas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuruRequest $request): RedirectResponse
    {
        Guru::create($request->validated());

        return Redirect::route('superadmin.gurus.index')
            ->with('success', 'Guru created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $guru = Guru::find($id);

        return view('superadmin.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $guru = Guru::find($id);

        return view('superadmin.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuruRequest $request, Guru $guru): RedirectResponse
    {
        $guru->update($request->validated());

        return Redirect::route('superadmin.gurus.index')
            ->with('success', 'Guru updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Guru::find($id)->delete();

        return Redirect::route('superadmin.gurus.index')
            ->with('success', 'Guru deleted successfully');
    }
}
