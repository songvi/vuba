<?php

namespace VuBa\Services;

class ResponseService
{
    public $response;

    const HTTP_OK           = 200;
    const HTTP_CREATED      = 201;
    const HTTP_NO_CONTENT   = 204;

    public function __construct($content, $code = 200, $format = 'json')
    {
        $this->response = new Response($content);
        $this->response->setStatusCode($code);
    }
}