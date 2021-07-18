<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdController extends Controller
{
    public function index($id) {
        $ad = Ad::where('id', $id)->first();

        return view('pages.ad', [
            'ad' => $ad
        ]);
    }
}
