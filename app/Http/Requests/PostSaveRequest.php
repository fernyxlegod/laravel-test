<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userId'=>['required', 'integer'],
            'title'=>['required', 'string'],
            'text'=>['required', 'string']
        ];
    }
}