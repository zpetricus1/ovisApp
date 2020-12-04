<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DynamicPDFController extends Controller
{
    function index(){
        $podaci_o_racunu = $this->dohvati_racun();
        return view('racuni')->with('dohvati_racun', $dohvati_racun);
    }

    function dohvati_racun(){
        $podaci_o_racunu = DB::table('units')
                            ->limit(10)
                            ->get();
        return $podaci_o_racunu;
    }
}
