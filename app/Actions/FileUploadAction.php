<?php

namespace App\Actions;

use App\Http\Requests\FileUploadRequest;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

class FileUploadAction
{
    public function handle(FileUploadRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        try{

        }catch(Exception $exception){
            report($exception);
        }
        return jsonErrorResponse();
    }
}
