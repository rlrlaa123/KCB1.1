<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function index()
    {
        return view('/auth/agreement');
    }

}
