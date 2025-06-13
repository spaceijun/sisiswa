<?php

namespace App\Http\Controllers;

use App\Models\Superadmin\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class OrangtuaController extends Controller
{
    public function index(Request $request): View
    {
        $siswas = Siswa::where('orangtua_id', Auth::user()->id, 'kela')->paginate();

        return view('orangtua.index', compact('siswas'))
            ->with('i', ($request->input('page', 1) - 1) * $siswas->perPage());
    }

    public function print(Request $request): View
    {
        $siswas = Siswa::where('orangtua_id', Auth::user()->id)->get();

        return view('orangtua.print', compact('siswas'));
    }
}
