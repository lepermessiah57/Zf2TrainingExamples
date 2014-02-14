<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '/calculator[/:action]',
                    'defaults' => array(
                        'controller' => 'StringCalculator',
                        'action'     => 'index',
                    ),
                ),
            ),
        )
    ),
    'controllers' => [
        'invokables' => [
            'StringCalculator' => 'Calculator\Controller\StringCalculatorController'
        ]
    ],
    'view_manager' => [
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ],
    'console' => array(
        'router' => array(
            'routes' => array(
                'consoleCalculator' => array(
                    'options' => [
                        'route' => 'calculate <operation>',
                        'defaults'=>[
                            'controller' => 'StringCalculator',
                            'action' => 'consoleCalculate'
                        ]
                    ]
                )
            ),
        ),
    ),
);