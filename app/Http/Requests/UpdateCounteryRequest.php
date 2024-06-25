<?php

namespace App\Http\Requests;

use App\Models\Countery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCounteryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('countery_edit');
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
