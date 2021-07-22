<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class AdController extends Controller
{
    public function index($id) {
        $ad = Ad::where('id', $id)->first();

        return view('pages.ad.ad', [
            'ad' => $ad
        ]);
    }

    public function get_create_view() {
        $categories = Category::all();

        return view('pages.ad.create', [
            'categories' => $categories
        ]);
    }

    public function create_ad(Request $request) {
        $ad = new Ad();

        Ad::store($ad, $request);

        return redirect()->route('home');
    }

    public function get_edit_view($id) {
        $ad = Ad::where('id', $id)->first();
        $categories = Category::all();

        return view('pages.ad.edit', [
            'ad' => $ad,
            'categories' => $categories
        ]);
    }

    public function edit_ad(Request $request, $id) {
        $ad = Ad::where('id', $id)->first();

        Ad::store($ad, $request);

        return redirect()->route('home');
    }

    public function delete_ad($id) {
        $ad = Ad::where('id', $id)->first();
        $ad->delete();

        return redirect()->route('home');
    }
}
