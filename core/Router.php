<?php

namespace app\core;

use app\core\exception\NotFoundException;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            //$this->response->setStatusCode(404); 4:57:09 - удаляет
            throw new NotFoundException();
            //return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }
        if (is_array($callback)) {
            /**
             * @var \app\core\Controller $controller
             */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller; // в массив вместо имени класса добавляется объект
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request, $this->response); //вернуться сюда для разбора аргументов request response
    }
    //03/05/2022 - наверное эти аргументы для методов контроллеров
    /*
ПОСЛE 4:57:04 ПЕРЕМЕЩЕНО ВO view.php
     protected function layoutContent()
     {
         $layout = Application::$app->layout;
         if (Application::$app->controller ?? false) {
             $layout = Application::$app->controller->layout; //тут меняется лэйаут
         }
 
         ob_start();
         include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
     }
 
     protected function renderOnlyView($view, $params = [])
     {
        return Application::$view->renderView($view, $params);
     }
*/
    
}
