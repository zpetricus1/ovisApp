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

class RacunController extends Controller
{

    public function dodajstavku(Request $request){
        if(($request->has('idracun') && !empty($request->input('idracun'))) && 
        ($request->has('description') && !empty($request->input('description'))) &&
        ($request->has('unit_price') && !empty($request->input('unit_price'))) &&
        ($request->has('amount') && !empty($request->input('amount')))) {
        
        $data = $request->only('idracun','description','unit_price','amount');
        $insert = DB::table('units')->insert(
            [
            'description' => $data['description'], 
            'unit_price' => $data['unit_price'], 
            'amount' => $data['amount'], 
            'price' => ($data['unit_price'] * $data['amount'])
            ]
        );

        if($insert){
           // $maxid= DB::select('select id from units order by id desc limit 1');
           
            $rezRacun = DB::select('select id from bills where id = :id', ['id' => $data['idracun']]);
          if($rezRacun==true){
            $id= DB::table('units')->select('id')->orderBy('id', 'desc')->first();
            DB::table('unit_bill')->insert(
                   [
                   'unit_id' => $id->id, 
                   'bill_id' => $data['idracun'], 
                 ]
              ); 
          }else{
            echo "<script> alert('Neispravan ID računa!'); </script>";
            $bill = Bill::all();
            return view('racuni',['bills'=>$bill]);
          }
   
        }

        // $upit = DB::select('select units.description, bills.fullname from units, bills, unit_bill where units.id = unit_bill.unit_id and bills.id = unit_bill.bill_id');
        // dd($upit);




        echo "<script> alert('Stavka je dodana!'); </script>";

        $bill = Bill::all();
        return view('racuni',['bills'=>$bill]);

        } else {
            echo "<script> alert('Niste unijeli sve podatke! Stavka nije dodana'); </script>";
            $bill = Bill::all();
        return view('racuni',['bills'=>$bill]);
        }   
    }

    function show(){
        $bill = Bill::all();
        return view('racuni',['bills'=>$bill]);
    }


    
}
