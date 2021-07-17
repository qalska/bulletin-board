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
        $ad = new Ad();
        $ad['title'] = $request['title'];
        $ad['category_id'] = $request['category_id'];
        $ad['price'] = $request['price'];
        $ad['text'] = $request['text'];

        if( $request[file('image')] ){
            $path = Storage::putfile('public', $request[file('image')]);
            $url = Storage::url($path);
            $ad['image'] = $request[$url];
        }

        $ad->save();
        return view('pages.create-a-new-ad');
    }
}
