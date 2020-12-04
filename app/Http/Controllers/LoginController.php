<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Storage; 
use Session;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response;


class LoginController extends Controller
{
    public function index()
    {
        return view('racuni');
    }

    public function login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
            ]);
            $credentials = $request->only('username', 'password');
            $resultsEmail = DB::select('select username from users where username = :username', ['username' => $credentials['username']]);
            $resultsPassword = DB::select('select password from users where password = :password', ['password' => sha1($credentials['password'])]);
    
            if ($resultsEmail==true && $resultsPassword==true ) {
                $bill = Bill::all();
                return view('racuni',['bills'=>$bill]);
            }else{
                echo "<script> alert('Ne postoji korisnik sa navedenim podacima!'); </script>";
                return view('login');
            }
    }
}
