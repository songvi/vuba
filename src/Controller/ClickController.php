<?php

namespace Controller;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\QueryBuilder;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use VuBa\Entities\Click;
use VuBa\Serialize\ClickSerializer;
use VuBa\States\ClickFactory;

/**
 * Click controller
 *
 */
class ClickController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $clickController = $app['controllers_factory'];
        $clickController->get("/", array($this, 'index'));
        $clickController->get("/show/{id}", array($this, 'show'));
        //$clickController->match("/create", array($this, 'create'))->bind('acme_create');
        //$clickController->match("/update/{id}", array($this, 'update'))->bind('acme_update');
        //$clickController->get("/delete/{id}", array($this, 'delete'))->bind('acme_delete');
        return $clickController;
    }

    /**
     * List all entities
     *
     */
    public function index(Application $app, Request $request) {
        $em = $app['orm.em'];
        //$test = $em->getRepository('Entities\User');
        //var_dump($em);
        $table = $em->getRepository('VuBa\Entities\Click');

        $pageNumber = $request->query->get('p');
        $numberPerPage = $request->query->get('n');
        $arrAttributes = $request->query->get('a');

        $attributes = null;
        if(!empty($arrAttributes))
        {
            $attributes =  explode(',', $arrAttributes);
        }

        $pNumber = 1;
        if (!empty($pageNumber) &&
            is_numeric($pageNumber) &&
            $numberPerPage !== 0 )
            {
                $pNumber = $pageNumber;
            }

        $limit = 20;

        if (!empty($numberPerPage) &&
            is_numeric($numberPerPage) &&
            $numberPerPage > 0 )
            {
                $limit = $numberPerPage;
            }

        $offset = ($pNumber - 1) * $limit;
        //$total = $table->countClick();
        //$maxPageNumber = ceil($total / $limit);

        $criteria = Criteria::create()
            ->orderBy(array('created_at'=> Criteria::DESC))
            ->setFirstResult($offset)
            ->setMaxResults($limit);


        $entities = $table->matching($criteria);

        $ret = array();
        foreach($entities as $entitie)
        {
            $clickFactory = new ClickFactory($entitie);
            $clickState = $clickFactory->getClick();
            $clickToJson = new ClickSerializer($clickState);
            if(is_array($attributes) && count($attributes) > 0)
            {
                $ret[$clickState->getClick()->getId()]= $clickToJson->toArrayWithAttribute($attributes);
            }
            else{
                $ret[$clickState->getClick()->getId()]= $clickToJson->toArray();
            }
        }

//        var_dump($ret);
//echo $maxPageNumber  .'+ '. $total .' + '. $limit;

        $response = new \Symfony\Component\HttpFoundation\JsonResponse();
        $response->setContent(json_encode($ret));

        $response->setStatusCode(200);
        return $response;
    }

    /**
     * Show entity
     *
     */
    public function show(Application $app, $id, Request $request) {

        $em = $app['orm.em'];

        //$criteria = Criteria::create()
        //  ->where(Criteria::expr()->eq('id', $id));

        $entity = $em->getRepository('VuBa\Entities\Click')->find($id);

        if (!$entity) {
            $app->abort(404, 'No entity found for id '.$id);
        }


        $arrAttributes = $request->query->get('a');

        $attributes = null;
        if(!empty($arrAttributes))
        {
            $attributes =  explode(',', $arrAttributes);
        }


        $clickFactory = new ClickFactory($entity);
        $clickState = $clickFactory->getClick();
        $clickToJson = new ClickSerializer($clickState);
        if(count($attributes) > 0)
        {
            $ret = $clickToJson->toArrayWithAttribute($attributes);
        }
        else{
            $ret = $clickToJson->toArray();
        }

        $response = new \Symfony\Component\HttpFoundation\JsonResponse();
        $response->setContent(json_encode($ret));

        $response->setStatusCode(200);
        return $response;
    }
}