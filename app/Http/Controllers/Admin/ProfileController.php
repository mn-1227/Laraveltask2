<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
     public function add()
    {
        return view('admin.profile.create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
     public function create(Request $request){
        $this->validate($request, Profile::$rules);
        $news = new Profile;
        $form = $request->all();
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        // データベースに保存する
        $news->fill($form);
        $news->save();
        return redirect('admin/profile/create');
        
    }
}