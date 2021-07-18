<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class EditAnAdController extends Controller
{
    public function index($id) {
        $ad = Ad::where('id', $id)->first();
        $categories = Category::all();

        return view('pages.edit-an-ad', [
            'ad' => $ad,
            'categories' => $categories
        ]);
    }

    public function edit(Request $request, $id) {
        $ad = Ad::where('id', $id)->first();
        $ad->title = $request->input('title');
        $ad->category_id = $request->input('category_id');
        $ad->price = $request->input('price');
        $ad->text = $request->input('text');

        if ( $request->file('image') ) {
            $path = Storage::putfile('public', $request->file('image') );
            $url = Storage::url($path);
            $ad->image = $url;
        } else {
            $ad->image = 'nophoto.jpg';
        }

        $ad->save();
        return redirect()->route('ad', $id);
    }
}
