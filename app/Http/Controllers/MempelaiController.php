<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mempelai;
use App\Models\Pria;
use App\Models\Wanita;
use App\Models\TempatAcara;
use App\Models\Galeri;
use DB;
use Auth;

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
        // $Galeri = Galeri::all();

        $SqlCreated_by = "SELECT b.name nama_pembuat, a.created_by, a.kategori_id, c.nama nama_kategori 
                            FROM galeri a
                            LEFT JOIN users b ON a.created_by = b.id 
                            LEFT JOIN kategori c ON a.kategori_id = c.id
                            GROUP BY a.created_by, b.name, a.kategori_id, c.nama
                        ";
        // $SqlCreated_by = "SELECT b.name as pembuat, a.created_by, a.kategori_id, c.nama as kategori, a.gambar 
        //                     FROM galeri a
        //                     LEFT JOIN users b ON a.created_by = b.id 
        //                     LEFT JOIN kategori c ON a.kategori_id = c.id
        //                 ";
        $resultsCreated_by  = DB::select(DB::raw($SqlCreated_by));
		$Galeri = json_decode(json_encode($resultsCreated_by), true);
        
        // foreach ($resultresultsCreated_by as $value) {
        //     $id_create = $value['created_by'];
        //     $SqlGambar = "select gambar from galeri where created_by = '" . $id_create . "' ";
        //     $resultsGambar  = DB::select(DB::raw($SqlGambar));
        //     $Galeri = json_decode(json_encode($resultsGambar), true);
        // }
        // dd($Galeri);
        

        $pageTitle = self::$pageTitle;
        return view('mempelai.create', compact('Mempelai', 'pageTitle', 'Pria', 'Wanita', 'TempatAcara', 'Galeri'));
    }

    public function store(Request $request)
    {
        request()->validate(Mempelai::$rules);
        
        $req = $request->all();
        $req['created_by'] = Auth::user()->id;
        $Mempelai = Mempelai::create($req);

        return redirect()->route('mempelai.index')
            ->with('success', 'Mempelai created successfully.');
    }

    public function show ($id)
    {
        $Mempelai = Mempelai::find(decrypt($id));
        $DataGaleri = Galeri::where('created_by', $Mempelai->galeri_id)->get();
		$Galeri = json_decode(json_encode($DataGaleri), true);
        $pageTitle = self::$pageTitle;

        return view ('mempelai.show', compact('pageTitle', 'Mempelai', 'Galeri'));
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

    public function aktif(Request $request, $id)
    {
        $Mempelai = Mempelai::find($id);
        $Mempelai->status = 1;
        $Mempelai->save();

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
