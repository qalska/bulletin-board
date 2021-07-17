<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ad;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }

    public function getAdsByUser() {
        $user_id = Auth::user()->id;
        $ads = Ad::where('user_id', $user_id)->get();
        $categories = Category::all();

        return view('home', [
            'ads' => $ads,
            'categories' => $categories
        ]);
    }
}
