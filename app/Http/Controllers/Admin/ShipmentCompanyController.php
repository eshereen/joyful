<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentCompanyRequest;
use App\Http\Requests\StoreShipmentCompanyRequest;
use App\Http\Requests\UpdateShipmentCompanyRequest;
use App\Models\ShipmentCompany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentCompanyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentCompanies = ShipmentCompany::all();

        return view('admin.shipmentCompanies.index', compact('shipmentCompanies'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shipmentCompanies.create');
    }

    public function store(StoreShipmentCompanyRequest $request)
    {
        $shipmentCompany = ShipmentCompany::create($request->all());

        return redirect()->route('admin.shipment-companies.index');
    }

    public function edit(ShipmentCompany $shipmentCompany)
    {
        abort_if(Gate::denies('shipment_company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shipmentCompanies.edit', compact('shipmentCompany'));
    }

    public function update(UpdateShipmentCompanyRequest $request, ShipmentCompany $shipmentCompany)
    {
        $shipmentCompany->update($request->all());

        return redirect()->route('admin.shipment-companies.index');
    }

    public function show(ShipmentCompany $shipmentCompany)
    {
        abort_if(Gate::denies('shipment_company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shipmentCompanies.show', compact('shipmentCompany'));
    }

    public function destroy(ShipmentCompany $shipmentCompany)
    {
        abort_if(Gate::denies('shipment_company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipmentCompany->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentCompanyRequest $request)
    {
        ShipmentCompany::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
