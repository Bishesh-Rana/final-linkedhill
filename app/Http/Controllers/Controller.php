<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($data, $message = 'data fetched successfully')
    {

        return response()->json([
            'status' => true,
            'code' => HttpResponse::HTTP_OK,
            'data' => $data,
            'message' => $message
        ], HttpResponse::HTTP_OK);
    }
    public function successPaginateResponse($data)
    {
        return response()->json([
            'status' => true,
            'code' => HttpResponse::HTTP_OK,
            'data' => $data,
            'current_page' => $data->currentpage(),
            'total' => $data->total(),
            'perPage' => $data->perPage(),
            'lastPage' => $data->lastPage(),
            'message' => 'data fetched successfully'
        ], HttpResponse::HTTP_OK);
    }

    public function errorResponse($data)
    {
        return response()->json([
            'status' => false,
            'code' => HttpResponse::HTTP_INTERNAL_SERVER_ERROR,
            'data' => $data,
            'message' => 'server error'
        ], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function notFoundResponse()
    {
        return response()->json([
            'status' => false,
            'code' => HttpResponse::HTTP_NOT_FOUND,
            'data' => ['no data found'],
            'message' => 'Not found'
        ], HttpResponse::HTTP_NOT_FOUND);
    }
    public function validationError($data)
    {
        return response()->json([
            'status' => false,
            'code' => HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
            'data' => null,
            'message' => array_values(collect($data->errors())->flatten()->toArray())
        ], HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function returnResponse($data, $paginate = false)
    {
        if (!$data || !$data->count()) {
            return $this->notFoundResponse();
        }

        if ($paginate) {
            return $this->successPaginateResponse($data);
        }

        return $this->successResponse($data);
    }
}
