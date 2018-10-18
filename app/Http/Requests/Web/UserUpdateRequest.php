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

        /*if($this->request->has('name')){
            $rules['name'] = 'required|string';
        }

        if($this->request->has('password') && $this->request->get('password')!=''){
            $rules['password'] = 'required|string|confirmed|min:8';
        }

        if($this->request->has('email')){
            $rules['email'] = 'required|string|unique:users';
        }

        if($this->request->has('phone')){
            $rules['phone'] = 'required|integer|unique:users';
        }

        if($this->request->has('photo')){
            $rules['photo'] = 'image||mimes:jpeg,png,jpg';
        }

        if($this->request->has('role_id')){
            $rules['role_id'] = 'required';
        }

        if($this->request->has('job_title')){
            $rules['job_title'] = 'required';
            $rules['orgnization'] = 'required';
        }*/

        return $rules;
    }
}
