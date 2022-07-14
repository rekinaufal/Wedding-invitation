<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Wanita;
use App\Models\Mempelai;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
class WanitaController extends Controller
{
    public static $pageTitle = 'Wanita';
    
    public function index ()
    {
        $Wanita = Wanita::all();
        $pageTitle = self::$pageTitle;
        return view ('wanita.index', compact('pageTitle', 'Wanita'));
    }

    public function create()
    {
        $Wanita = new Wanita();
        $pageTitle = self::$pageTitle;
        return view('wanita.create', compact('Wanita', 'pageTitle'));
    }

    public function store(Request $request)
    {
        request()->validate(Wanita::$rules);

        // $req = $request->all();
        $Wanita = new Wanita;
        $Wanita->nama = $request->nama;
        $Wanita->pesan = $request->pesan;
        $Wanita->facebook = $request->facebook;
        $Wanita->instagram = $request->instagram;
        $Wanita->twitter = $request->twitter;
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file_name = Str::random(30) . '_' . $name;
            $file->move(base_path() . '/public/assets/gambar', $file_name);

            $Wanita->gambar = '/assets/gambar/' . $file_name;
        }
        // $Wanita = Wanita::create($req);
        $Wanita->save();

        return redirect()->route('wanita.index')
            ->with('success', 'Wanita created successfully.');
    }

    public function show ($id)
    {
        $Wanita = Wanita::find($id);
        $pageTitle = self::$pageTitle;

        return view ('wanita.show', compact('pageTitle', 'Wanita'));
    }

    public function edit($id)
    {
        $Wanita = Wanita::find(decrypt($id));
        $pageTitle = self::$pageTitle;
        // $pageBreadcrumbs = self::$pageBreadcrumbs;
        // $pageBreadcrumbs[] = [
        //     'page' => '/application/memoItemIns/'.$id.'/edit',
        //     'title' => 'Update '.self::$pageTitle,
        // ];

        return view('wanita.edit', compact('Wanita', 'pageTitle'));
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('gambar')){
	        File::delete(base_path() . '/public' . $request->input('gambarold')); //hapus foto old

            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file_name = Str::random(30) . '_' . $name;
            $file->move(base_path() . '/public/assets/gambar', $file_name);
            
            $fieldUpdate = [
                'nama'      => $request->input('nama'),
                'pesan'     => $request->input('pesan'),
                'facebook'  => $request->input('facebook'),
                'instagram' => $request->input('instagram'),
                'twitter'   => $request->input('twitter'),
                'gambar'    => '/assets/gambar/' . $file_name,
            ];
        }else{
            $fieldUpdate = [
            'nama'      => $request->input('nama'),
            'pesan'     => $request->input('pesan'),
            'facebook'  => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'twitter'   => $request->input('twitter'),
            ];
        }
      
        $update = DB::table('Wanita')->where('id', $id)->update($fieldUpdate);

        return redirect()->route('wanita.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        // delete file foto  
        $gambarold = Wanita::find($id);
        File::delete(base_path() . '/public' . $gambarold->gambar); //hapus foto old
        
        $Wanita = Wanita::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('wanita.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
