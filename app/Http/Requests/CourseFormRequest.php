<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Course;


class CourseFormRequest extends Request
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
            /*
        'course_name'    => 'required|min:3',
        'introduction'   => 'required|min:5',
		'course_contents'=> 'required|min:3',
        'duration' => 'required|min:3',
        'course_fee' => 'required|min:2',
        'training_id' => 'required'
       */
    ];
    }
}
