<?php

namespace app\core;

use app\core\Session;

class Application
{
    public string $layout = 'main';
    public string $userClass;
    public static $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public Controller $controller;
    public Session $session;
    public View $view;
    public ?DbModel $user;


    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']); //п©п╟я─п╟п╪п╣я┌я─я▀ пЄп╩я▐ п©пЎпЄп╨п╩я▌я┤п╣пҐп╦я▐ п╠п╟пЇя▀ пЄп╟пҐпҐя▀я┘
        $this->view = new View;
        $primaryValue=$this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey=>$primaryValue]);
        }else{
            $this->user = null;
        }
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_errors', ['exception' => $e]);
        }
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue); 
        return true;
    }

    public function logout ()
    {
        $this->user=null;
        $this->session->remove('user');
    }

    static public function isGuest()
    {
        return !self::$app->user;
    }
}
