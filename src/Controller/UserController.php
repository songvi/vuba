<?php

namespace Controller;

use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Sample controller
 *
 */
class UserController implements ControllerProviderInterface {
    
    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];
        $indexController->get("/", array($this, 'index'))->bind('user_index');
        $indexController->get("/show/{id}", array($this, 'show'));
        //$indexController->match("/create", array($this, 'create'))->bind('acme_create');
        //$indexController->match("/update/{id}", array($this, 'update'))->bind('acme_update');
        //$indexController->get("/delete/{id}", array($this, 'delete'))->bind('acme_delete');
        return $indexController;
    }
    
    /**
     * List all entities
     *
     */
    public function index(Application $app) {
        $em = $app['orm.em'];
        //$test = $em->getRepository('Entities\User');
        //var_dump($em);
        $entities = $em->getRepository('VuBa\Entities\User')->findAll();
        $jsonContent = $app['serializer']->serialize($entities, 'json');

        $response = new \Symfony\Component\HttpFoundation\JsonResponse();
        $response->setContent($jsonContent);

        $response->setStatusCode(200);
        return $response;
    }
    
    /**
     * Show entity
     *
     */
    public function show(Application $app, $id) {
        
        $em = $app['orm.em'];
        $entity = $em->getRepository('VuBa\Entities\User')->find($id);

        if (!$entity) {
            $app->abort(404, 'No entity found for id '.$id);
        }

        return new JsonResponse($entity);
    }

}