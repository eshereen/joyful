<?php

namespace App\Http\Requests;

use App\Models\Countery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCounteryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('countery_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
