<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProducerRequest;
use App\Http\Requests\UpdateProducerRequest;
use App\Http\Resources\Admin\ProducerResource;
use App\Models\Brand;
use App\Models\Producer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProducersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('producer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProducerResource(Producer::with(['brands'])->advancedFilter());
    }

    public function store(StoreProducerRequest $request)
    {
        $producer = Producer::create($request->validated());
        $producer->brands()->sync($request->input('brands.*.id', []));

        return (new ProducerResource($producer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('producer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'brands' => Brand::get(['id', 'name']),
            ],
        ]);
    }

    public function show(Producer $producer)
    {
        abort_if(Gate::denies('producer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProducerResource($producer->load(['brands']));
    }

    public function update(UpdateProducerRequest $request, Producer $producer)
    {
        $producer->update($request->validated());
        $producer->brands()->sync($request->input('brands.*.id', []));

        return (new ProducerResource($producer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Producer $producer)
    {
        abort_if(Gate::denies('producer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ProducerResource($producer->load(['brands'])),
            'meta' => [
                'brands' => Brand::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(Producer $producer)
    {
        abort_if(Gate::denies('producer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
