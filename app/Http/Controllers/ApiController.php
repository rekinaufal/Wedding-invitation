<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pria;
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
}
