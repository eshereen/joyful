<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCounteryRequest;
use App\Http\Requests\StoreCounteryRequest;
use App\Http\Requests\UpdateCounteryRequest;
use App\Models\Countery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CounteryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('countery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $counteries = Countery::all();

        return view('admin.counteries.index', compact('counteries'));
    }

    public function create()
    {
        abort_if(Gate::denies('countery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.counteries.create');
    }

    public function store(StoreCounteryRequest $request)
    {
        $countery = Countery::create($request->all());

        return redirect()->route('admin.counteries.index');
    }

    public function edit(Countery $countery)
    {
        abort_if(Gate::denies('countery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.counteries.edit', compact('countery'));
    }

    public function update(UpdateCounteryRequest $request, Countery $countery)
    {
        $countery->update($request->all());

        return redirect()->route('admin.counteries.index');
    }

    public function show(Countery $countery)
    {
        abort_if(Gate::denies('countery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.counteries.show', compact('countery'));
    }

    public function destroy(Countery $countery)
    {
        abort_if(Gate::denies('countery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countery->delete();

        return back();
    }

    public function massDestroy(MassDestroyCounteryRequest $request)
    {
        Countery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
