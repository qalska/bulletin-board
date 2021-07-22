<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Ad extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    static function store($ad, $request_data) {
        $ad->title = $request_data->input('title');
        $ad->category_id = $request_data->input('category_id');
        $ad->price = $request_data->input('price');
        $ad->text = $request_data->input('text');
        $ad->user_id = Auth::user()->id;

        if ( $request_data->file('image') ) {
            $path = Storage::putfile('public', $request_data->file('image') );
            $url = Storage::url($path);
            $ad->image = $url;
        } else {
            $ad->image = 'nophoto.jpg';
        }

        $ad->save();
    }

}
