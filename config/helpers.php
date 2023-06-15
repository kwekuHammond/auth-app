<?php

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

function jsonSuccessResponse($data = [], int $statusCode = 200): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
{
    return response([
        'success' => true,
        'data' => $data
    ], $statusCode);
}

function jsonErrorResponse(string $message = 'something went wrong, please try again later', int $statusCode = 500): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
{
    return response([
        'success' => false,
        'message' => $message,
    ], $statusCode);
}

function paginatedJsonSuccessResponse($data = [], int $statusCode = 200): Application|ResponseFactory|Response
{
    $responseData = $data->response()->getData();
    return response([
        'success' => true,
        'data' => $data,
        'links' => $responseData->links,
        'meta' => $responseData->meta
    ], $statusCode);
}
