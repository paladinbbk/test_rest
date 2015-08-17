<?php
use Routing\Router;
use Routing\MatchedRoute;
use Routing\RouterTrait;

try {
    $router = new Router(RouterTrait::GET_HTTP_HOST());

    //Main
    $router->add('homepage', '/', 'Controller_Main:action_index');
    $router->add('error404', '/404', 'Controller_Main:action_error404');
    $router->add('staticPage', '/(slug:str).html', 'Controller_Main:action_staticPage');
       
    //CRUD
    $router->add('dashboard', '/dashboard', 'Controller_Crud:action_index');
    $router->add('adminList', '/admin/list/(entity:str)', 'Controller_Crud:action_list');
    $router->add('adminRemove', '/admin/remove/(entity:str)/(id:num)', 'Controller_Crud:action_remove');
    $router->add('adminForm', '/admin/form/(entity:str)/(id:num)', 'Controller_Crud:action_form');
    $router->add('adminSave', '/admin/save/(entity:str)/(id:num)', 'Controller_Crud:action_save', 'POST');

    //REST
    $router->add('prodJson', '/json/product/(id:num)', 'Controller_Rest:action_index');

    $route = $router->match(RouterTrait::GET_METHOD(), RouterTrait::GET_PATH_INFO());

    if (null == $route){
        $route = new MatchedRoute('Controller_Main:action_error404');
    }

    list($class, $action) = explode(':', $route->getController(), 2);

    call_user_func_array(array(new $class($router), $action), $route->getParameters());

} catch (Exception $e) {

    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

    echo $e->getMessage();
    echo $e->getTraceAsString();
    exit;
}
