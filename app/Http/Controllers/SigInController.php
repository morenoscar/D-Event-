<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SigInController extends Controller
{
  public function sigin()
  {
      return view('/pages/pre-home/sigin');
  }

  public function register()
  {
      return view('/pages/pre-home/register');
  }
}
