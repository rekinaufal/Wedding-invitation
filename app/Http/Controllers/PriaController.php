<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Pria;
use App\Models\Mempelai;

class PriaController extends Controller
{
    public static $pageTitle = 'Pria';
    
    public function index ()
    {
        $Pria = Pria::all();
        $pageTitle = self::$pageTitle;
        return view ('pria.index', compact('pageTitle', 'Pria'));
    }

    public function create()
    {
        $Pria = new Pria();
        $Pria = new Pria();
        $pageTitle = self::$pageTitle;
        return view('pria.create', compact('Pria', 'pageTitle', 'Pria'));
    }

    public function store(Request $request)
    {
        request()->validate(Pria::$rules);

        // $req = $request->all();
        $Pria = new Pria;
        $Pria->nama = $request->nama;
        $Pria->pesan = $request->pesan;
        $Pria->facebook = $request->facebook;
        $Pria->instagram = $request->instagram;
        $Pria->twitter = $request->twitter;
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file_name = Str::random(30) . '_' . $name;
            $file->move(base_path() . '/public/assets/gambar', $file_name);

            $Pria->gambar = '/assets/gambar/' . $file_name;
        }
        // $Pria = Pria::create($req);
        $Pria->save();

        return redirect()->route('pria.index')
            ->with('success', 'Pria created successfully.');
    }

    public function show ($id)
    {
        $Pria = Pria::find($id);
        $pageTitle = self::$pageTitle;

        return view ('pria.show', compact('pageTitle', 'Pria'));
    }

    public function edit($id)
    {
        $Pria = Pria::find(decrypt($id));
        $pageTitle = self::$pageTitle;
        // $pageBreadcrumbs = self::$pageBreadcrumbs;
        // $pageBreadcrumbs[] = [
        //     'page' => '/application/memoItemIns/'.$id.'/edit',
        //     'title' => 'Update '.self::$pageTitle,
        // ];

        return view('pria.edit', compact('Pria', 'pageTitle'));
    }

    public function update(Request $request, Pria $Pria )
    {
        request()->validate(Pria::$rules);

        $req = $request->all();
        $Pria->update($req);

        return redirect()->route('pria.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $Pria = Pria::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('pria.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
