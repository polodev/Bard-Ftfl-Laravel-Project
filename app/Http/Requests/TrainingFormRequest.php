<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrainingFormRequest extends Request
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
            'training_name' => 'required|min:3',
            'training_type'=> 'required',
            'description'=>'required',
            'applying_information'=>'required|min:10',
            'objectives'=>'required|min:10',
            'start_date'=>'required',
            'end_date'=>'required',
            'provided_resources'=>'required',
            'accommodation'=>'required',
            'daily_schedule'=>'required',
            'fees_structure'=>'required',
            'responsible_person'=>'required',
            //'image_path'=>'required'

        ];
    }
}
