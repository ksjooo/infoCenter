<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Products\Actions\CreateProductAction;
use Src\Products\Actions\GetListProductAction;
use Src\Products\Actions\RemoveProductAction;
use Src\Products\Actions\UpdateProductAction;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function create(CreateProductAction $action, CreateProductRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($request->toDto()), status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(Product $product, UpdateProductAction $action, UpdateProductRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($product, $request->toDto()), status: Response::HTTP_OK);
    }

    public function remove(Product $product, RemoveProductAction $action): JsonResponse
    {
        return new JsonResponse(data: $action($product), status: Response::HTTP_OK);
    }

    public function getList(GetListProductAction $action): JsonResponse
    {
        return new JsonResponse(data: $action(), status: Response::HTTP_OK);
    }
}
