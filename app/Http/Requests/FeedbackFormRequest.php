<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FeedbackFormRequest extends Request
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
            'trainer_id' => 'required',
            'A1' => 'required',
            'A2' => 'required',
            'A3' => 'required',
            'A4' => 'required',
            'A5' => 'required',
            'B1' => 'required',
            'B2' => 'required',
            'B3' => 'required',
            'comments' => 'required',
        ];
    }
}
