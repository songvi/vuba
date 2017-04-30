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


$app = new Application();

$app->register(new RoutingServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
//$app->register(new TwigServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
));

$app->register(new TranslationServiceProvider(), array(
    'translator.domains' => array(),
));

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


/*$app->register(new Moust\Silex\Provider\CacheServiceProvider(), array(
    'caches.options' => array(
//        'apcu' => array(
//            'driver' => 'apcu'
//        ),
        'filesystem' => array(
            'driver' => 'file',
            'cache_dir' => '../var/cache/tmp'
        ),
        'memory' => array(
            'driver' => 'array'
        )
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
$app['cache']->clear();*/


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



require __DIR__.'/routes.php';

return $app;
