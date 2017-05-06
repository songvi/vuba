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
    const HTTP_BAD_REQUEST  = 400;
    const HTTP_UNAUTHORIZED= 401;
    const HTTP_FORBIDDEN    = 403;
    const HTTP_METHOD_NOT_ALLOWED   = 405;
    const HTTP_NOT_ACCEPTABLE       = 406;
    const HTTP_GONE                 = 410;
    const HTTP_INTERNAL_ERROR       = 500;
    const HTTP_NOT_IMPLEMENTED      = 501;
    const HTTP_SERVICE_UNAVAILABLE  = 503;

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
        //$basicResponse = new Response();
        //$basicResponse->setCharset('');
        //$basicResponse->set

        $container['vuba.http.resp.ok'] = $container->protect(function ($content) use ($container)
        {
            $response = new Response($content);
            $response->setStatusCode(self::HTTP_OK);
            return $response;
        });

        $container['vuba.http.resp.write_ok'] = $container->protect(function ($content) use ($container)
        {
            $response = new Response($content);
            $response->setStatusCode(self::HTTP_CREATED);
            return $response;
        });

        $container['vuba.http.resp.no_content'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(self::HTTP_NO_CONTENT);
            return $response;
        });

        $container['vuba.http.resp.bad_request'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(self::HTTP_BAD_REQUEST);
            return $response;
        }
        );

        $container['vuba.http.resp.unauthorized'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(self::HTTP_UNAUTHORIZED);
            return $response;
        }
        );

        $container['vuba.http.resp.forbidden'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(self::HTTP_FORBIDDEN);
            return $response;
        }
        );
    }
}