<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Area;
use App\Models\Shipment;
use App\Models\ShipmentCompany;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = Shipment::with(['area', 'shipment_company'])->get();

        return view('admin.shipments.index', compact('shipments'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipment_companies = ShipmentCompany::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shipments.create', compact('areas', 'shipment_companies'));
    }

    public function store(StoreShipmentRequest $request)
    {
        $shipment = Shipment::create($request->all());

        return redirect()->route('admin.shipments.index');
    }

    public function edit(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipment_companies = ShipmentCompany::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipment->load('area', 'shipment_company');

        return view('admin.shipments.edit', compact('areas', 'shipment_companies', 'shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->all());

        return redirect()->route('admin.shipments.index');
    }

    public function show(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->load('area', 'shipment_company');

        return view('admin.shipments.show', compact('shipment'));
    }

    public function destroy(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentRequest $request)
    {
        Shipment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
