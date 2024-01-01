<?php

namespace App\Http\Services;

use Cloudinary\Api\ApiResponse;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Exception;

class CloudinaryService
{
    private $config;

    public function __construct()
    {
        $this->config = Configuration::instance();
        $this->config->cloud->cloudName = 'my_cloud_name';
        $this->config->cloud->apiKey = 'my_key';
        $this->config->cloud->apiSecret = 'my_secret';
        $this->config->url->secure = true;
    }

    public function upload(string $base64DataUri): ?ApiResponse
    {
        try {
            return (new UploadApi())->upload($base64DataUri);
        } catch (Exception $exception) {
            report($exception);
        }
        return null;
    }
}
