<?php

namespace App\Http\Controllers;

use App\Actions\FileUploadAction;
use App\Http\Requests\FileUploadRequest;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function __invoke(FileUploadRequest $request, FileUploadAction $action)
    {
        return $action->handle($request);
    }
}
