<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class StaticsController extends Controller
{
     public function profile() {

      return view('statics/profile');

    }
}
