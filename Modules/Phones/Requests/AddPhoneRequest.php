<?php

namespace Modules\Phones\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPhoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //lets validate phone form data before we submit to db
        return [
            'name' => ['required', 'max:50'], 
            'price' => ['required', 'integer'],  
            'category' => ['required'], 
        ];
    }
}
