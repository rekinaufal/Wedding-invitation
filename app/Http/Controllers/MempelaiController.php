<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mempelai;
use App\Models\Pria;
use App\Models\Wanita;
use App\Models\TempatAcara;

class MempelaiController extends Controller
{
    public static $pageTitle = 'Mempelai';
    
    public function index ()
    {
        $Mempelai = Mempelai::all();
        $pageTitle = self::$pageTitle;
        return view ('mempelai.index', compact('pageTitle', 'Mempelai'));
    }

    public function create()
    {
        $Mempelai = new Mempelai();
        $Pria = Pria::all();
        $Wanita = Wanita::all();
        $TempatAcara = TempatAcara::all();
        $pageTitle = self::$pageTitle;
        return view('mempelai.create', compact('Mempelai', 'pageTitle', 'Pria', 'Wanita', 'TempatAcara'));
    }

    public function store(Request $request)
    {
        request()->validate(Mempelai::$rules);

        $req = $request->all();
        $req['password'] = Hash::make($req['password']);
        $Mempelai = Mempelai::create($req);

        return redirect()->route('mempelai.index')
            ->with('success', 'Mempelai created successfully.');
    }

    public function show ($id)
    {
        $Mempelai = Mempelai::find($id);
        $pageTitle = self::$pageTitle;

        return view ('mempelai.show', compact('pageTitle', 'Mempelai'));
    }

    public function edit($id)
    {
        $Mempelai = Mempelai::find(decrypt($id));
        $pageTitle = self::$pageTitle;
        // $pageBreadcrumbs = self::$pageBreadcrumbs;
        // $pageBreadcrumbs[] = [
        //     'page' => '/application/memoItemIns/'.$id.'/edit',
        //     'title' => 'Update '.self::$pageTitle,
        // ];

        return view('mempelai.edit', compact('Mempelai', 'pageTitle'));
    }

    public function update(Request $request, Mempelai $Mempelai )
    {
        request()->validate(Mempelai::$rules);

        $req = $request->all();
        $Mempelai->update($req);

        return redirect()->route('mempelai.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $Mempelai = Mempelai::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('mempelai.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
