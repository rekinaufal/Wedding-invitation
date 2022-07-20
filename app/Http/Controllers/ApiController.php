<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pria;
use App\Models\Wanita;
use App\Models\TempatAcara;
use App\Models\Galeri;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    public function getDataPria(Request $request)
    {
        $DataPria['data'] = Pria::where('id', $request->id)->first();
        echo json_encode($DataPria);
        exit;
        
        // $DataEmployee = Employee::where([
        //     ['id', '=', $request->id]
        //     ])->get();

        // foreach ($DataEmployee as $v) {
        //     $datainsm = $v->gaji;
        // }
        // return response()->json([
        //     'DataEmployee' => $DataEmployee
        // ]);
    }

    public function getDataWanita(Request $request)
    {
        $DataWanita['data'] = Wanita::where('id', $request->id)->first();
        echo json_encode($DataWanita);
        exit;
    }

    public function getDataTempatAcara(Request $request)
    {
        $DataTempatAcara['data'] = TempatAcara::where('id', $request->id)->first();
        echo json_encode($DataTempatAcara);
        exit;
    }

    public function getDataGaleri(Request $request)
    {
        $DataGaleri['data'] = DB::table('galeri as a')
                                ->select('b.name as nama_pembuat', 'a.created_by', 'a.kategori_id', 'c.nama as nama_kategori')
                                ->leftJoin('users as b', 'a.created_by', '=', 'b.id')
                                ->leftJoin('kategori as c', 'a.kategori_id', '=', 'c.id')
                                ->where('a.created_by', $request->created_by)
                                ->groupBy('a.created_by', 'b.name', 'a.kategori_id', 'c.nama')
                                ->first();
        // $SqlCreated_by = "SELECT b.name nama_pembuat, a.created_by, a.kategori_id, c.nama nama_kategori 
        //                     FROM galeri a
        //                     LEFT JOIN users b ON a.created_by = b.id 
        //                     LEFT JOIN kategori c ON a.kategori_id = c.id
        //                     WHERE a.created_by ='" .$request->created_by. "'
        //                     GROUP BY a.created_by, b.name, a.kategori_id, c.nama
        //                     ORDER BY a.created_by DESC LIMIT 1;  
        //                 ";
        // $DataGaleri['data'] = DB::select($SqlCreated_by);
        
		// $Galeri = json_decode(json_encode($DataGaleri), true);
        echo json_encode($DataGaleri);
        exit;
    }
}
