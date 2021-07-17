<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class CreateANewAdController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('pages.create-a-new-ad', [
            'categories' => $categories
        ]);
    }

    public function CreateANewAd(Request $request) {

        return view('pages.create-a-new-ad');
    }
}
