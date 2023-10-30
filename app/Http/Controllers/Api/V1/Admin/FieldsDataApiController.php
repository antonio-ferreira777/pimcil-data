<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldsDataRequest;
use App\Http\Requests\UpdateFieldsDataRequest;
use App\Http\Resources\Admin\FieldsDataResource;
use App\Models\Field;
use App\Models\FieldsData;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FieldsDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fields_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldsDataResource(FieldsData::with(['product', 'field'])->advancedFilter());
    }

    public function store(StoreFieldsDataRequest $request)
    {
        $fieldsData = FieldsData::create($request->validated());

        return (new FieldsDataResource($fieldsData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('fields_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'product' => Product::get(['id', 'ean']),
                'field'   => Field::get(['id', 'name']),
            ],
        ]);
    }

    public function show(FieldsData $fieldsData)
    {
        abort_if(Gate::denies('fields_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FieldsDataResource($fieldsData->load(['product', 'field']));
    }

    public function update(UpdateFieldsDataRequest $request, FieldsData $fieldsData)
    {
        $fieldsData->update($request->validated());

        return (new FieldsDataResource($fieldsData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(FieldsData $fieldsData)
    {
        abort_if(Gate::denies('fields_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new FieldsDataResource($fieldsData->load(['product', 'field'])),
            'meta' => [
                'product' => Product::get(['id', 'ean']),
                'field'   => Field::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(FieldsData $fieldsData)
    {
        abort_if(Gate::denies('fields_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fieldsData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
