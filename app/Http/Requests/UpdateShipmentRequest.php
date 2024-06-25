<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_edit');
    }

    public function rules()
    {
        return [
            'area_id'             => [
                'required',
                'integer',
            ],
            'shipment_company_id' => [
                'required',
                'integer',
            ],
            'price'               => [
                'required',
            ],
        ];
    }
}
