<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sales\CreateSaleRequest;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Sales\Actions\CreateSaleAction;
use Src\Sales\Actions\GetListSaleAction;
use Src\Sales\Actions\RemoveSaleAction;
use Symfony\Component\HttpFoundation\Response;

class SaleController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function create(CreateSaleAction $action, CreateSaleRequest $request): JsonResponse
    {
        return new JsonResponse(data: $action($request->toDto()), status: Response::HTTP_OK);
    }

    public function remove(Sale $sale, RemoveSaleAction $action): JsonResponse
    {
        return new JsonResponse(data: $action($sale), status: Response::HTTP_OK);
    }

    public function getList(GetListSaleAction $action): JsonResponse
    {
        return new JsonResponse(data: $action(), status: Response::HTTP_OK);
    }
}
