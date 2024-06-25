<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_edit');
    }

    public function rules()
    {
        return [
            'user_id'          => [
                'required',
                'integer',
            ],
            'products.*'       => [
                'integer',
            ],
            'products'         => [
                'required',
                'array',
            ],
            'total_price'      => [
                'required',
            ],
            'item_count'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'shipping_address' => [
                'string',
                'required',
            ],
            'shipping_phone'   => [
                'string',
                'required',
            ],
            'shipping_name'    => [
                'string',
                'nullable',
            ],
            'email'    => [
                'email',
                'required'

            ],
            'status'           => [
                'required',
            ],
            'paid'             => [
                'required',
            ],
            'shipped'          => [
                'required',
            ],
        ];
    }
}
