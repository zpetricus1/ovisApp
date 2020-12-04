<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage;
use Session;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;
use Illuminate\Support\Arr;
use Illuminate\Database\Query\Builder;
use PDO;
use Illuminate\Database\Eloquent\Model;
use PDF;
use App;

class RacunistavkeController extends Controller
{


    public function showbills(Request $request){
        if(($request->has('billid') && !empty($request->input('billid')))){
             $data = $request->only('billid');

            $ids= DB::table("unit_bill")->select('unit_id')->where('bill_id', $data['billid'])->get()->all();
            
            
                foreach($ids as $id){
                    $unit= Unit::where('id', $id->unit_id)->get();
                    
                    echo view('racunistavka',['units'=>$unit]);
                    
                }
                

         }

     }

    
}
