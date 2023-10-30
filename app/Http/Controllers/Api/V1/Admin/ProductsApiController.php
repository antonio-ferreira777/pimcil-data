<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::advancedFilter());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ProductResource($product),
            'meta' => [],
        ]);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
