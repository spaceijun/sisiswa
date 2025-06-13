<?php

namespace App\Http\Controllers;

use App\Models\Superadmin\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class SiswaController extends Controller
{
    public function index(Request $request): View
    {
        $siswas = Siswa::where('user_id', Auth::user()->id, 'kela')->paginate();

        return view('siswa.index', compact('siswas'))
            ->with('i', ($request->input('page', 1) - 1) * $siswas->perPage());
    }

    public function print(Request $request): View
    {
        $siswas = Siswa::where('user_id', Auth::user()->id)->get();

        return view('siswa.print', compact('siswas'));
    }
}
