<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    public function store(Request $request) {
        $ad = new Ad();
        $ad->title = $request->input('title');
        $ad->category_id = $request->input('category_id');
        $ad->price = $request->input('price');
        $ad->text = $request->input('text');
        $ad->user_id = Auth::user()->id;

        if ( $request->file('image') ) {
            $path = Storage::putfile('public', $request->file('image') );
            $url = Storage::url($path);
            $ad->image = $url;
        } else {
            $ad->image = 'nophoto.jpg';
        }

        $ad->save();
        return redirect()->route('home');
    }
}
