<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BardTrainerFormRequest extends Request
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
          return [
        'name' => 'required',
        'email' => 'required|email',
        'gender'=>'required',
        'educational_qualification'=>'required',
        'previous_experience'=>'required',
        'country'=>'required',
        'description'=>'required',
        'skill_set'=>'required',
		  'date'=>'required',
        

        
    ];
        
  
    }
}
