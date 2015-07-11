<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Portal\Controller\Portal' => 'Portal\Controller\PortalController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'portal' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'portal' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/portal[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Portal\Controller\Portal',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
);