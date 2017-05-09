<?php

namespace VuBa\Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Response;

class ResponseService implements  ServiceProviderInterface
{
    public $response;

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
            $response->setStatusCode(Response::HTTP_OK);
            return $response;
        });

        $container['vuba.http.resp.write_ok'] = $container->protect(function ($content) use ($container)
        {
            $response = new Response($content);
            $response->setStatusCode(Response::HTTP_CREATED);
            return $response;
        });

        $container['vuba.http.resp.no_content'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(Response::HTTP_NO_CONTENT);
            return $response;
        });

        $container['vuba.http.resp.bad_request'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(Response::HTTP_BAD_REQUEST);
            return $response;
        }
        );

        $container['vuba.http.resp.unauthorized'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(Response::HTTP_UNAUTHORIZED);
            return $response;
        }
        );

        $container['vuba.http.resp.forbidden'] = $container->protect(function () use ($container)
        {
            $response = new Response();
            $response->setStatusCode(Response::HTTP_FORBIDDEN);
            return $response;
        }
        );
    }
}