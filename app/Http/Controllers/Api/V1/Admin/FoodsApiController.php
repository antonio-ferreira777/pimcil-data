<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Http\Resources\Admin\FoodResource;
use App\Models\Food;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FoodsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('food_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FoodResource(Food::advancedFilter());
    }

    public function store(StoreFoodRequest $request)
    {
        $food = Food::create($request->validated());

        return (new FoodResource($food))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('food_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Food $food)
    {
        abort_if(Gate::denies('food_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FoodResource($food);
    }

    public function update(UpdateFoodRequest $request, Food $food)
    {
        $food->update($request->validated());

        return (new FoodResource($food))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Food $food)
    {
        abort_if(Gate::denies('food_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new FoodResource($food),
            'meta' => [],
        ]);
    }

    public function destroy(Food $food)
    {
        abort_if(Gate::denies('food_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $food->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
