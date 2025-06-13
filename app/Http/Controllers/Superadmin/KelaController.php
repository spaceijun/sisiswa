<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\Kela;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KelaRequest;
use App\Models\Superadmin\Guru;
use App\Models\Superadmin\KelasCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KelaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $kelas = Kela::with(['kelasCategory', 'guru'])->paginate();

        return view('superadmin.kela.index', compact('kelas'))
            ->with('i', ($request->input('page', 1) - 1) * $kelas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kela = new Kela();
        $kelasCategories = KelasCategory::all();
        $guru = Guru::all();

        return view('superadmin.kela.create', compact('kela', 'kelasCategories', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelaRequest $request): RedirectResponse
    {
        Kela::create($request->validated());

        return Redirect::route('superadmin.kelas.index')
            ->with('success', 'Kela created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $kela = Kela::find($id);

        return view('superadmin.kela.show', compact('kela'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kela = Kela::find($id);
        $kelasCategories = KelasCategory::all();
        $guru = Guru::all();


        return view('superadmin.kela.edit', compact('kela', 'kelasCategories', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelaRequest $request, Kela $kela): RedirectResponse
    {
        $kela->update($request->validated());

        return Redirect::route('superadmin.kelas.index')
            ->with('success', 'Kela updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Kela::find($id)->delete();

        return Redirect::route('superadmin.kelas.index')
            ->with('success', 'Kela deleted successfully');
    }
}
