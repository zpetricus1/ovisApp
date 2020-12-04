<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage; 
use Session;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;

class NoviracunController extends Controller
{
    public function index()
    {

    }

    public function noviracun(Request $request)
    {  

        if(($request->has('fullname') && !empty($request->input('fullname'))) && 
            ($request->has('address') && !empty($request->input('address'))) &&
            ($request->has('oib') && !empty($request->input('oib'))) &&
            ($request->has('billing_date') && !empty($request->input('billing_date')))) {
            
            $data = $request->only('fullname','address','oib','billing_date');
            DB::table('bills')->insert(
                [
                'fullname' => $data['fullname'], 
                'address' => $data['address'], 
                'oib' => $data['oib'], 
                'billing_date' => $data['billing_date']
                ]
            );

            echo "<script> alert('Račun je izdan!'); </script>";

            return view('noviracun');

        } else {
            echo "<script> alert('Niste unijeli sve podatke! Račun nije izdan'); </script>";
            return view('noviracun');
        }   
    }
}
