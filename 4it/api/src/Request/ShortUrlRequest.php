<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 07-Apr-18
 * Time: 11:55 PM
 */

namespace ForIt\Api\Request;


use Illuminate\Foundation\Http\FormRequest;

class ShortUrlRequest extends FormRequest
{
    function authorize(){
        return true;
    }

    function rules(){
        return [
            'apiKey'=>'required|exists:api_keys,key',
            'longUrl'=>'required|url',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'apiKey.exists'  => 'Invalid apiKey',
        ];
    }
}