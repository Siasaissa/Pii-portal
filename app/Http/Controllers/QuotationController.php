<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function Quotation (){
        return view("dash.Quotation");
    }
}
