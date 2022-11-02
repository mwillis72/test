<?php

namespace Modules\Phones\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\Phones\Models\Phones;
use Modules\Phones\Requests\UpdatePhoneRequest;
use DB;

class UpdatePhonesController
{

    public function updatePhoneView($id)
    { 
        //we can get data about the phone with given id using raw sql in eloquent and pass to the view
        $phone = DB::select('select * from phones where id = ?', [$id]);

        //add pass to the update view
        return view('dashboard::phones.update',['phone'=>$phone]);
    }

    public function updatePhone(UpdatePhoneRequest $request, $id){

        //lets validate phone update form values before we submit to db
        $attributes = request()->validate([
            'name' => ['required', 'max:50'], 
            'price' => ['required', 'integer'],  
            'category' => ['required'], 
        ]);
       
        //if every validation passes, let update the phone data in db table
        DB::table('phones')->where('id',$id)
        ->update([
            'name'    => $attributes['name'],
            'price' => $attributes['price'],
            'category'     => $attributes['category'], 
        ]);
        
        // on successful update, let's redirect back with a success alert
        return redirect()->back()->with('success','successfully updated the phone');
    }

}
