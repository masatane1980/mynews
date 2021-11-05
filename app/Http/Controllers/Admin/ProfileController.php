<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

use App\ProfileHistory;

use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form =$request->all();
        
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/create');
    }

    public function edit (Request $request)
    {
        
        $profile = Profile::find($request->id);
        if (empty($profile)) {
          abort(404);
    }
    
        return view ('admin.profile.edit', ['profile_form' => $profile]);
        
    }

    public function update(Request $request) {
    $this->validate($request, Profile::$rules);
    
    $profile = Profile::find($request->id);
    $profile_form = $request->all();
    
    $profile->fill($profile_form)->save();
    
    $profile_history = new ProfileHistory();
    $profile_history->profile_id = $profile->id;
    $profile_history->edited_at = Carbon::now();
    $profile_history->fill($profile_form)->save();
    
    return redirect('admin/profile');
  }
}
