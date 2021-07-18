<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class DeleteAnAdController extends Controller
{
    public function deleteAnAd($id) {
        $ad = Ad::where('id', $id)->first();
        $ad->delete();

        return redirect()->route('home');
    }
}
