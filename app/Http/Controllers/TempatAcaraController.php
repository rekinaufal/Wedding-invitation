<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\TempatAcara;
use Illuminate\Support\Facades\Storage;
use DB;
use File;
use Illuminate\Support\Facades\Auth;

class TempatAcaraController extends Controller
{
    public static $pageTitle = 'TempatAcara';
    
    public function index ()
    {
        $TempatAcara = TempatAcara::all();
        $pageTitle = self::$pageTitle;
        return view ('tempatacara.index', compact('pageTitle', 'TempatAcara'));
    }

    public function create()
    {
        $TempatAcara = new TempatAcara();
        $pageTitle = self::$pageTitle;
        return view('tempatacara.create', compact('TempatAcara', 'pageTitle'));
    }

    public function store(Request $request)
    {
        request()->validate(TempatAcara::$rules);

        // $req = $request->all();
        $TempatAcara = new TempatAcara;
        $TempatAcara->tempat        = $request->tempat;
        $TempatAcara->tanggal       = $request->tanggal;
        $TempatAcara->waktu         = $request->waktu;
        $TempatAcara->pesan         = $request->pesan;
        $TempatAcara->created_by    = Auth::user()->id;
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $name = $file->getClientOriginalName();
            $file_name = Str::random(30) . '_' . $name;
            $file->move(base_path() . '/public/assets/gambar', $file_name);

            $TempatAcara->gambar = '/assets/gambar/' . $file_name;
        }
        $TempatAcara->save();

        return redirect()->route('tempatacara.index')
            ->with('success', 'Tempat Acara created successfully.');
    }

    public function show ($id)
    {
        $TempatAcara = TempatAcara::find($id);
        $pageTitle = self::$pageTitle;

        return view ('tempatacara.show', compact('pageTitle', 'TempatAcara'));
    }

    public function edit($id)
    {
        $TempatAcara = TempatAcara::find(decrypt($id));
        $pageTitle = self::$pageTitle;
        // $pageBreadcrumbs = self::$pageBreadcrumbs;
        // $pageBreadcrumbs[] = [
        //     'page' => '/application/memoItemIns/'.$id.'/edit',
        //     'title' => 'Update '.self::$pageTitle,
        // ];

        return view('tempatacara.edit', compact('TempatAcara', 'pageTitle'));
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
                'tempat'        => $request->input('tempat'),
                'tanggal'       => $request->input('tanggal'),
                'waktu'         => $request->input('waktu'),
                'pesan'         => $request->input('pesan'),
                'gambar'        => '/assets/gambar/' . $file_name,
                'updated_by'    => Auth::user()->id,
            ];
            //$TempatAcara->gambar = '/assets/gambar/' . $file_name;
        }else{
            $fieldUpdate = [
                'tempat'        => $request->input('tempat'),
                'tanggal'       => $request->input('tanggal'),
                'waktu'         => $request->input('waktu'),
                'pesan'         => $request->input('pesan'),
                'updated_by'=> Auth::user()->id,
            ];
        }
      
        $update = DB::table('tempatacara')->where('id', $id)->update($fieldUpdate);

        return redirect()->route('tempatacara.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        // delete file foto  
        $gambarold = TempatAcara::find($id);
        File::delete(base_path() . '/public' . $gambarold->gambar); //hapus foto old

        $TempatAcara = TempatAcara::find($id)->delete();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route('tempatacara.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
