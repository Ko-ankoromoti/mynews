<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下を追記することでPRofile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    //
    public function create(Request $request)
    {
        
        // 以下を追記
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profiles/create');
    }

    //
    public function edit()
    {
        return view('admin.profiles.edit');
    }
    //
    public function updete()
    {
        return redirect('admin/profiles/edit');
    }
}
