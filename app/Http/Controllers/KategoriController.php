<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public static $pageTitle = 'Kategori';
    
    public function index ()
    {
        $Kategori = Kategori::all();
        $pageTitle = self::$pageTitle;
        return view ('kategori.index', compact('pageTitle', 'Kategori'));
    }

    public function create()
    {
        $Kategori = new Kategori();
        $pageTitle = self::$pageTitle;
        return view('kategori.create', compact('Kategori', 'pageTitle'));
    }

    public function store(Request $request)
    {
        request()->validate(Kategori::$rules);

        // $req = $request->all();
        $Kategori = new Kategori;
        $Kategori->nama         = $request->nama;
        $Kategori->created_by   = Auth::user()->id;
        $Kategori->save();

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori created successfully.');
    }

    public function show ($id)
    {
        $Kategori = Kategori::find($id);
        $pageTitle = self::$pageTitle;

        return view ('kategori.show', compact('pageTitle', 'Kategori'));
    }

    public function edit($id)
    {
        $Kategori = Kategori::find(decrypt($id));
        $pageTitle = self::$pageTitle;

        return view('kategori.edit', compact('Kategori', 'pageTitle'));
    }

    public function update(Request $request, $id)
    { 
        $fieldUpdate = [
            'nama'      => $request->input('nama'),
            'updated_by'=> Auth::user()->id,
        ];
        $update = DB::table('kategori')->where('id', $id)->update($fieldUpdate);

        return redirect()->route('kategori.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $Kategori = Kategori::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('kategori.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
