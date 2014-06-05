<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'helloWorld' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/hello_world',
                    'defaults' => array(
                        'controller'    => 'HelloWorld',
                        'action'        => 'helloWorld',
                    ),  

                )
            ),
            'helloMyNameIs' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/hello/my/name/is/:name',
                    'defaults' => array(
                        'controller'    => 'HelloWorld',
                        'action'        => 'helloMyNameIs',
                    ),  

                )
            ),
            'hello' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/hello',
                    'defaults' => array(
                        'controller'    => 'HelloWorld',
                        'action'        => 'hello',
                    ),

                )
            ),
            'hello_json' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/hello/json',
                    'defaults' => array(
                        'controller'    => 'HelloWorld',
                        'action'        => 'helloJson',
                    ),

                )
            ),
            'door_switchDoors' => array(
                'type'=>'Literal',
                'options'=> array(
                    'route' => '/door/state',
                    'defaults'=>array(
                        'controller'=>'Door',
                        'action' => 'switchDoors'
                    )
                )
            ),
            'book' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/book[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller'    => 'BookRest',
                    ),

                )
            )
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'HelloWorld'                   => 'Application\Controller\HelloWorldController',
            'BookRest'                     => 'Application\Controller\BookRestController',
            'Door'                         => 'Application\Controller\DoorController'

        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.twig',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        //This is required for json rendering
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
