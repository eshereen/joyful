<?php

namespace App\Http\Requests;

use App\Models\ShipmentCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipmentCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shipment_company_edit');
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
