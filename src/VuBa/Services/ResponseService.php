<?php

namespace VuBa\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

class ResponseService implements  ServiceProviderInterface
{
    public $response;

    const HTTP_OK           = 200;
    const HTTP_CREATED      = 201;
    const HTTP_NO_CONTENT   = 204;


    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $container)
    {
        $container['vuba.resp.http.ok'] = $container->protect(function ($content) use ($container)
        {
            $response = new Response($content);
            $response->setStatusCode(self::HTTP_OK);
            return $response;
        });
    }
}