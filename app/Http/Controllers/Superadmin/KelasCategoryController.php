<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Superadmin\KelasCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KelasCategoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KelasCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $kelasCategories = KelasCategory::paginate();

        return view('superadmin.kelas-category.index', compact('kelasCategories'))
            ->with('i', ($request->input('page', 1) - 1) * $kelasCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kelasCategory = new KelasCategory();

        return view('superadmin.kelas-category.create', compact('kelasCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KelasCategoryRequest $request): RedirectResponse
    {
        KelasCategory::create($request->validated());

        return Redirect::route('superadmin.kelas-categories.index')
            ->with('success', 'KelasCategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $kelasCategory = KelasCategory::find($id);

        return view('superadmin.kelas-category.show', compact('kelasCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kelasCategory = KelasCategory::find($id);

        return view('superadmin.kelas-category.edit', compact('kelasCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KelasCategoryRequest $request, KelasCategory $kelasCategory): RedirectResponse
    {
        $kelasCategory->update($request->validated());

        return Redirect::route('superadmin.kelas-categories.index')
            ->with('success', 'KelasCategory updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        KelasCategory::find($id)->delete();

        return Redirect::route('superadmin.kelas-categories.index')
            ->with('success', 'KelasCategory deleted successfully');
    }
}
