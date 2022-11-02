<?php

namespace Modules\Profile\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\Signup\Models\User;
use DB;

class ProfileController
{
    public function create()
    { 
        return view('dashboard::profile.profile');
    }

    public function updateProfile(Request $request){

        $attributes = request()->validate([
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone'     => ['max:10'],
            'occupation' => ['max:20'],
        ]);
        
        $fileDestination = base_path('theme/assets/uploads/');
        
//var_dump($request->file('profile_photo'));
        

        if(!$request->hasFile('profile_photo')){
            DB::table('users')->where('id',Auth::user()->id)
                ->update([
                    'name'    => $attributes['name'],
                    'email' => $attributes['email'],
                    'phone'     => $attributes['phone']?'':'not set', 
                    'occupation'    => $attributes["occupation"]?'':'not set',
            ]);
        }else{
            $profile_photo = $request->file('profile_photo');
            $profile_photo_name = $profile_photo->hashName();
            DB::table('users')->where('id',Auth::user()->id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attributes['email'],
                'phone'     => $attributes['phone']?'':'not set',
                'photo' => $profile_photo_name, 
                'occupation'    => $attributes["occupation"]?'':'not set',
            ]);
            
            $profile_photo->move($fileDestination,$profile_photo_name);
        }
        

        return redirect()->back()->with('success','Profile updated successfully');
    }

}
