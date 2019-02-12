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



        //dd($this->request->all());

        if($this->request->has('name')){
            $rules['name'] = 'required|string';
        }

        if($this->request->has('password') && $this->request->get('password')!=''){
            $rules['password'] = 'required|string|confirmed|min:8';
        }

        if($this->request->has('email')){
            $rules['email'] = 'required|string|unique:users';
        }

        if($this->request->has('phone')){
            $rules['phone'] = 'required|unique:users';
        }

        if($this->request->has('photo')){
            $rules['photo'] = 'image||mimes:jpeg,png,jpg';
        }

        if($this->request->has('role_id')){
            $rules['role_id'] = 'required';
        }

       /* if($this->request->has('start_time')) {

            $statTime = $this->request->get('start_time');
            $endTime = $this->request->get('end_time');
            $day = $this->request->get('day');

            foreach ($statTime as $key => $val) {
                $rules['start_time.' . $key] = 'required';
                $rules['end_time.' . $key] = 'required';
                $rules['day.' . $key] = 'required|min:3';
            }

            //validation error need apply in front end

        }*/

        return $rules;
    }
}
