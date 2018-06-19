<?php
namespace App\Http\Controllers;

use App\UsefulWebsite;
use Illuminate\Http\Request;

class UsefulWebsiteController extends Controller
{
    public function index(Request $request)
    {
        $data = UsefulWebsite::orderBy('id')->paginate(30);
        return view('library.useful_website', compact('data'));
    }

}
