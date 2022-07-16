<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public static $pageTitle = 'Galeri';
    private $mediaCollection = 'photo';
    
    public function index ()
    {
        $Galeri = Galeri::all();
        $pageTitle = self::$pageTitle;
        return view('galeri.index', compact('pageTitle', 'Galeri'));
    }

    public function create()
    {
        $Galeri = new Galeri();
        $Kategori = Kategori::all();
        $pageTitle = self::$pageTitle;
        return view('galeri.create', compact('Galeri', 'pageTitle', 'Kategori'));
    }

    public function store(Request $request)
    {
        // if($request->hasFile('gambar')){
        //     $files = $request->file('gambar');
        //     dd($files);
        //    foreach ($request->input('gambar', []) as $file) {
        //         request()->validate(Galeri::$rules);

        //         $Galeri = new Galeri;
        //         $Galeri->kategori_id  = $request->kategori_id;
        //         $Galeri->created_by   = Auth::user()->id;
        //         // $file = $request->file('gambar');
        //         // $filename = $file->getClientOriginalName();
        //         $name = $file->getClientOriginalExtension();
        //         $file_name = Str::random(30) . '_' . $name;
        //         $file->move(base_path() . '/public/assets/gambar', $file_name);
        //         $Galeri->gambar = '/assets/gambar/' . $file_name;

        //    }
        // }
        $qwe = $request->input('gambar');
        $path = '/assets/gambar/';
        foreach ($qwe as $file) {
            $Galeri = new Galeri;
            $Galeri->kategori_id  = $request->kategori_id;
            $Galeri->gambar = $path . $file;
            $Galeri->created_by   = Auth::user()->id;
            $Galeri->save();
        }
        return redirect()->route('galeri.index')->with('success', 'Galeri created successfully.');
    }

    public function storeMedia(Request $request)
    {
        $path = base_path() . '/public/assets/gambar';

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function show ($id)
    {
        $Galeri = Galeri::find($id);
        $pageTitle = self::$pageTitle;

        return view('galeri.show', compact('pageTitle', 'Galeri'));
    }

    public function edit($id)
    {
        $Galeri = Galeri::find(decrypt($id));
        $pageTitle = self::$pageTitle;
        // $pageBreadcrumbs = self::$pageBreadcrumbs;
        // $pageBreadcrumbs[] = [
        //     'page' => '/application/memoItemIns/'.$id.'/edit',
        //     'title' => 'Update '.self::$pageTitle,
        // ];

        return view('galeri.edit', compact('Galeri', 'pageTitle'));
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
                'updated_by'=> Auth::user()->id,
            ];
        }else{
            $fieldUpdate = [
            'nama'      => $request->input('nama'),
            'pesan'     => $request->input('pesan'),
            'facebook'  => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'twitter'   => $request->input('twitter'),
            'updated_by'=> Auth::user()->id,
            ];
        }
      
        $update = DB::table('Galeri')->where('id', $id)->update($fieldUpdate);

        return redirect()->route('Galeri.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        // delete file foto  
        $gambarold = Galeri::find($id);
        File::delete(base_path() . '/public' . $gambarold->gambar); //hapus foto old

        $Galeri = Galeri::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('galeri.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
