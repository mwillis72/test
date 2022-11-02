<?php

namespace Modules\Phones\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\Phones\Models\Phones;
use Modules\Phones\Requests\AddPhoneRequest;
use DB;

class PhonesController
{
    public function loadPhones()
    { 
        //we can get data of all phones using query builder in eloquent and pass to the phone's view
        $phones = DB::table('phones') 
                    ->paginate(3);
                    //->get();

        //we use the dashboard namespace prefix since we are using hmvc
        return view('dashboard::phones.phones',['phones' => $phones]);
    }

    public function addPhoneView()
    { 
        //We can load the view for adding new phones here
        //we use the dashboard namespace prefix since we are using hmvc
        return view('dashboard::phones.add');
    }

    public function addPhone(AddPhoneRequest $request){

        //lets validate phone form data before we submit to db
        // $attributes = request()->validate([
        //     'name' => ['required', 'max:50'], 
        //     'price' => ['required', 'integer'],  
        //     'category' => ['required'], 
        // ]);

        // lets try creating a new phone with Phones model
        Phones::create($request->validated());

        // redirect back onSuccess
        return redirect()->back()->with('success','Successfully added a new phone');
    }

    public function deletePhone($id){
       // delete the phone from phone's table with this eloquent query
        DB::table('phones')->where('id',$id)
        ->delete();
        
        return redirect()->back()->with('success','successfully updated the phone');
    }

}
