<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class HomeController extends Controller
{
    public function index() {
        $ads = Ad::all();
        return view('pages.index', [
            'ads' => $ads
        ]);
    }
}
