<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\FiltersOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Orders\Actions\CreateOrderAction;
use Src\Orders\Actions\GetListOrderAction;
use Src\Orders\Actions\GetOrderAction;
use Src\Orders\Actions\RemoveOrderAction;
use Src\Orders\Actions\UpdateOrderAction;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function create(CreateOrderAction $action, CreateOrderRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($request->toDto()), status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function update(Order $order, UpdateOrderAction $action, UpdateOrderRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($order, $request->toDto()), status: Response::HTTP_OK);
    }

    public function remove(Order $order, RemoveOrderAction $action): JsonResponse
    {
        return new JsonResponse(data: $action($order), status: Response::HTTP_OK);
    }

    /**
     * @throws UnknownProperties
     */
    public function getList(GetListOrderAction $action, FiltersOrderRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($request->toDto()), status: Response::HTTP_OK);
    }

    public function getFromId(Order $order, GetOrderAction $action): JsonResponse
    {
        return new JsonResponse(data: $action($order), status: Response::HTTP_OK);
    }
}
