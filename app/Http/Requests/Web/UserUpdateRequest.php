<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $rules = [];


        $rules['name'] = 'required|string';


        $rules['password'] = 'required|string|confirmed|min:8';

        $rules['email'] = 'required|string|unique:users';

        $rules['phone'] = 'required|unique:users';


        if($this->request->has('photo')){
            $rules['photo'] = 'image||mimes:jpeg,png,jpg';
        }


        $rules['role_id'] = 'required';


        if($this->request->get('role_id') == 2 && $this->request->has('start_time') ) {


            $statTime = $this->request->get('start_time');
            $endTime = $this->request->get('end_time');
            $day = $this->request->get('day');

            foreach ($statTime as $key => $val) {
                $rules['start_time.' . $key] = 'required';
                $rules['end_time.' . $key] = 'required';
                $rules['day.' . $key] = 'required|min:3';
            }

            //validation error need apply in front end

        }

        return $rules;
    }
}
