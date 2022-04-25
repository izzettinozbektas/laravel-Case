<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;



class RegisterPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'site_url' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'company_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        foreach ($validator->errors()->messages() as $key => $msg){
            $message[$key] = implode(", ",$msg);
        }
        throw new HttpResponseException(
            response()->json($message, 400)
        );
    }
}
