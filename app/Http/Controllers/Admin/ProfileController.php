<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下を追記することでPRofile Modelが扱えるようになる
use App\Profile;

// 以下を追記
use App\ProfileHistory;

use Carbon\Carbon;

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
        
        return redirect('admin/profile/create');
    }
     public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

    //
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
          abort(404);    
        }
        return view('admin.profile.edit', ['profile_form' =>$profile]);
    }
    //
    public function update(Request $request)
    {
        //
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        unset($profile_form['remove']);
        $profile->fill($profile_form)->save();
        
        // 以下を追記
        $profilehistory = new ProfileHistory();
        $profilehistory->profile_id = $profile->id;
        $profilehistory->edited_at = Carbon::now();
        $profilehistory->save();
        
        return redirect()->back();
    }
}
       