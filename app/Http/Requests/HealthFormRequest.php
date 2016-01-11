<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
class HealthFormRequest extends Request
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
            'present_address' => 'required',
            'permanent_address' => 'required',
            'age_beginning_course' => 'required',
            'marital_status' => 'required',
            'birth_date' => 'required',
            'present_disease' => 'required',
            'physical_disability' => 'required',
            'navel' => 'required',
            'blood_pressure' => 'required',
            'respiration' => 'required',
            'anemia' => 'required',
            'jaundice' => 'required',
            'weight' => 'required',
            'heart' => 'required',
            'lung' => 'required',
            'liver' => 'required',
            'spleen' => 'required',
            'kidney' => 'required',
            'hernia' => 'required',
            'hydrocil' => 'required',
            'left_eye' => 'required',
            'right_eye' => 'required',
            'comments_mofficer' => 'required'
        ];
    }
}
