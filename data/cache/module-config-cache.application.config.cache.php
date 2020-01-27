<?php
return array (
  'service_manager' => 
  array (
    'abstract_factories' => 
    array (
      0 => 'Zend\\Session\\Service\\ContainerAbstractServiceFactory',
      1 => 'Zend\\Cache\\Service\\StorageCacheAbstractServiceFactory',
    ),
    'aliases' => 
    array (
      'Zend\\Session\\SessionManager' => 'Zend\\Session\\ManagerInterface',
      'HttpRouter' => 'Zend\\Router\\Http\\TreeRouteStack',
      'router' => 'Zend\\Router\\RouteStackInterface',
      'Router' => 'Zend\\Router\\RouteStackInterface',
      'RoutePluginManager' => 'Zend\\Router\\RoutePluginManager',
      'ValidatorManager' => 'Zend\\Validator\\ValidatorPluginManager',
    ),
    'factories' => 
    array (
      'Zend\\Session\\Config\\ConfigInterface' => 'Zend\\Session\\Service\\SessionConfigFactory',
      'Zend\\Session\\ManagerInterface' => 'Zend\\Session\\Service\\SessionManagerFactory',
      'Zend\\Session\\Storage\\StorageInterface' => 'Zend\\Session\\Service\\StorageFactory',
      'Zend\\Cache\\PatternPluginManager' => 'Zend\\Cache\\Service\\PatternPluginManagerFactory',
      'Zend\\Cache\\Storage\\AdapterPluginManager' => 'Zend\\Cache\\Service\\StorageAdapterPluginManagerFactory',
      'Zend\\Cache\\Storage\\PluginManager' => 'Zend\\Cache\\Service\\StoragePluginManagerFactory',
      'Zend\\Router\\Http\\TreeRouteStack' => 'Zend\\Router\\Http\\HttpRouterFactory',
      'Zend\\Router\\RoutePluginManager' => 'Zend\\Router\\RoutePluginManagerFactory',
      'Zend\\Router\\RouteStackInterface' => 'Zend\\Router\\RouterFactory',
      'Zend\\Validator\\ValidatorPluginManager' => 'Zend\\Validator\\ValidatorPluginManagerFactory',
    ),
  ),
  'route_manager' => 
  array (
  ),
  'router' => 
  array (
    'routes' => 
    array (
      'pokemon' => 
      array (
        'type' => 'Zend\\Router\\Http\\Segment',
        'options' => 
        array (
          'route' => '/pokemon[/:action[/:id]]',
          'constraints' => 
          array (
            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
            'id' => '[0-9]+',
          ),
          'defaults' => 
          array (
            'controller' => 'Application\\Controller\\PokedexController',
            'action' => 'index',
          ),
        ),
      ),
    ),
  ),
  'view_manager' => 
  array (
    'template_path_stack' => 
    array (
      'zenddevelopertools' => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/vendor/zendframework/zend-developer-tools/config/../view',
      0 => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/module/Application/config/../view',
    ),
    'display_not_found_reason' => true,
    'display_exceptions' => true,
    'doctype' => 'HTML5',
    'not_found_template' => 'error/404',
    'exception_template' => 'error/index',
    'template_map' => 
    array (
      'layout/layout' => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/module/Application/config/../view/layout/layout.phtml',
      'application/pokedex/index' => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/module/Application/config/../view/application/index/index.phtml',
      'application/pokedex/detail' => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/module/Application/config/../view/application/index/detail.phtml',
      'error/404' => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/module/Application/config/../view/error/404.phtml',
      'error/index' => '/Users/eldera/Documents/Projets/Pokedex/skeleton-application/module/Application/config/../view/error/index.phtml',
    ),
  ),
);