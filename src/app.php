<?php

use Silex\Application;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Saxulum\Validator\Provider\SaxulumValidatorProvider;
use Symfony\Component\Validator\Validator;
use Symfony\Component\HttpFoundation\Request;


$app = new Application();

$app->register(new RoutingServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));

require_once __DIR__.'/VuBa/Services/ResponseService.php';

$app->register(new Vuba\Services\ResponseService());

$app->register(new TranslationServiceProvider(), array(
    'translator.domains' => array(),
));

//$app['autoloader']->registerNamespace('Symfony', __DIR__.'/../vendor/Symfony/src');

$app['translator.loader'] = new Symfony\Component\Translation\Loader\ArrayLoader();
$arrayEN = include __DIR__.'/VuBa/Resources/i18n/en.php';
$arrayFR = include __DIR__.'/VuBa/Resources/i18n/fr.php';
$arrayVI = include __DIR__.'/VuBa/Resources/i18n/vi.php';
$arrayES = include __DIR__.'/VuBa/Resources/i18n/es.php';
$arrayDE = include __DIR__.'/VuBa/Resources/i18n/de.php';
$arrayJP = include __DIR__.'/VuBa/Resources/i18n/jp.php';

$app['translator']->addResource('array', $arrayEN, 'en');
$app['translator']->addResource('array', $arrayFR, 'fr');
$app['translator']->addResource('array', $arrayVI, 'vi');
$app['translator']->addResource('array', $arrayES, 'es');
$app['translator']->addResource('array', $arrayDE, 'de');
$app['translator']->addResource('array', $arrayJP, 'jp');
$app['locales.all'] = include __DIR__.'/VuBa/Resources/i18n/locales.php';
$app['locales.supported'] = ['vi', 'en', 'fr'];



$app->register(new SessionServiceProvider(), array(
  'session.storage.options' => array('cookie_lifetime' => 10800)
));

$app->register(new DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'        => 'pdo_mysql',
        'host'          => 'localhost',
        'dbname'        => 'silex3',
        'user'          => 'silex',
        'password'      => 'silex',
    ),
));


$app->register(new Moust\Silex\Provider\CacheServiceProvider(), array(
    'caches.options' => array(
        'apcu' => array(
            'driver' => 'apcu'
        )
    /*,
        'filesystem' => array(
            'driver' => 'file',
            'cache_dir' => '../var/cache/tmp'
        ),
        'memory' => array(
            'driver' => 'array'
        )*/
    )
));
// stores a variable
$app['cache']->store('foo', 'bar');
// stores a variable with a 1 minute lifetime
$app['cache']->store('foo', 'bar', 60);
// fetch variable
//echo $app['cache']->fetch('foo');
// delete variable
$app['cache']->delete('foo');
// clear all cached variables
$app['cache']->clear();


$app->register(new Silex\Provider\SerializerServiceProvider());


$app->register(new DoctrineOrmServiceProvider, array(
    'orm.proxies_dir' =>  '../var/cache/orm.proxies',
    'orm.proxies_namespace'     => 'DoctrineProxy',
    'orm.em.options' => array(
        'mappings' => array(
            // Using actual filesystem paths
            array(
                'type' => 'annotation',
                'use_simple_annotation_reader' => false,
                'namespace' => 'VuBa\Entities',
                'path' => __DIR__.'/VuBa/Entities/',
            )
        ),
    )
));


$app->register(new ValidatorServiceProvider());
$app->register(new SaxulumValidatorProvider());



\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/NotNull.php');
\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/NotBlank.php');
\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/Uuid.php');
\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/Length.php');
\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/DateTime.php');
\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/Range.php');
\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__.'/../vendor/symfony/validator/Symfony/Component/Validator/Constraints/Currency.php');



$app['vuba.context'] = null;

/*$app['callback'] =  $app->protect(function(Application $app, Request $request){
    $token = $request->headers->get('X-AUTH-TOKEN');

    //var_dump($token);
    if (empty($token) || false === strpos($token, ':')) {
        $response = new \Symfony\Component\HttpFoundation\JsonResponse();
        $response->setContent('{"Error":"Access Forbidden"}');
        $response->setStatusCode(403);
        // commented for dev
        //return $response;
    }

    //list($username, $secret) = explode(':', $token, 2);
    if(empty($token)) $token = 1;
    //$request->query->add(array("user_public_id" => $token));

    $app['vuba.context'] = $token;
    var_dump($app['vuba.context']);
});*/



$app->before(function(Request $request) use ($app) {
    // default language
    $locale = 'en';
    // quick and dirty ... try to detect the favorised language - to be improved!
    if (!is_null($request->server->get('HTTP_ACCEPT_LANGUAGE'))) {
        $langs = array();
        // break up string into pieces (languages and q factors)
        preg_match_all('/([a-z]{1,8}(-[a-z]{1,8})?)\s*(;\s*q\s*=\s*(1|0\.[0-9]+))?/i',
            $request->server->get('HTTP_ACCEPT_LANGUAGE'), $lang_parse);
        if (count($lang_parse[1]) > 0) {
            foreach ($lang_parse[1] as $lang) {
                if (false === (strpos($lang, '-'))) {
                    // only the country sign like 'de'
                    $locale = strtolower($lang);
                } else {
                    // perhaps something like 'de-DE'
                    $locale = strtolower(substr($lang, 0, strpos($lang, '-')));
                }
                break;
            }
        }


        if(!in_array($locale, $app['locales.supported']))
        {
            $locale = 'en';
        }
        $app['translator']->setLocale($locale);
        //$app['monolog']->addDebug('Set locale to '.$locale);
    }
});


require __DIR__.'/routes.php';


return $app;
