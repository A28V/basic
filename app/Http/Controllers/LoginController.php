<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    public function reg(Request $request){
     
        dd($request->all());
    }
}
