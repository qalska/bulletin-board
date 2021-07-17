<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\Category;

class MainPageController extends Controller
{
    public function index() {
        $ads = Ad::orderBy('id', 'DESC')->get();
        $categories = Category::all();

        return view('pages.index', [
            'ads' => $ads,
            'categories' => $categories
        ]);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        
        if ($category_id == '0') {
            $ads = Ad::where('title', 'LIKE', "%{$search}%")->orderBy('id', 'DESC')->get();
        } else {
            $ads = Ad::where([
                ['category_id', '=', "$category_id"],
                ['title', 'LIKE', "%{$search}%"]
                ])->orderBy('id', 'DESC')->get();
        }
        
        $categories = Category::all();
        return view('pages.index', [
            'ads' => $ads,
            'categories' => $categories
        ]);
    }

    public function getAdsByCategory($title) {
        $category = Category::where('title', $title)->first();
        $categories = Category::all();

        return view('pages.index', [
            'ads' => $category->ads,
            'categories' => $categories,
            'category' => $category
        ]);
    }
}
