<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pria;
use App\Models\Wanita;
use App\Models\TempatAcara;
use Illuminate\Http\Request;

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
}
