<?php

namespace App\Http\Requests;

use App\Models\ShipmentCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipmentCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_company_create');
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
