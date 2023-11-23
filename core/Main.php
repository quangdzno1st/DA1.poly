<?php

class Main
{
    public $url;
    public string $controllerName = 'HomeController';
    public string $methodName = 'index';
    public string $controllerPath = 'app/Controllers/';
    public $controller;

    public function __construct()
    {
        $this->getUrl();
        $this->loadController();
        $this->callMethod();
    }

    public function getUrl()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : '';
        if ($this->url != null) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }

    }

    public function loadController()
    {
        if (isset($this->url[0]) && file_exists($this->url[0])) {
            $this->controllerName = ucfirst($this->url[0]);
            $fileName = $this->controllerPath . $this->controllerName . '.php';
            if (file_exists($fileName)) {
                require_once $fileName;
                if (class_exists($this->controllerName)) {
                    $this->controller = new $this->controllerName();
                } else {
                    header('Location: ' . BASE_URL . $this->controllerName . 'notFound');
                }
            } else {
                header('Location: ' . BASE_URL . $this->controllerName . 'notFound');
            }
        } else {
            require_once $this->controllerPath . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
        }
    }

    public function callMethod()
    {
        $fileName = $this->controllerPath . ucfirst($this->url[0]) . '.php';
        if (file_exists($fileName)) {
            $this->controllerName = $this->url[0];
            require_once $fileName;
            $this->controller = new $this->controllerName();
        } else {
            require_once $this->controllerPath . $this->controllerName . '.php';
            $this->controller = new $this->controllerName();
            header('Location: ' . BASE_URL . $this->controllerName);
        }

        if (isset($this->url[2])) {
            $this->methodName = $this->url[1];
            if (isset($this->url[3])) {
                $this->controller->{$this->methodName}($this->url[2], $this->url[3]);
            }
            if (method_exists($this->controllerName, $this->methodName)) {

                $this->controller->{$this->methodName}($this->url[2]);

            } else {
                header('Location: ' . BASE_URL . $this->controllerName . '/notFound');
            }

        } else {
            if (isset($this->url[1])) {
                $this->methodName = $this->url[1];
                if (method_exists($this->controllerName, $this->methodName)) {
                    $this->controller->{$this->methodName}();
                } else {
                    $this->methodName = 'index';
                    header('Location: ' . BASE_URL . $this->controllerName . '/' . $this->methodName);
                }
            } else {
                header('Location: ' . BASE_URL . $this->controllerName . '/' . $this->methodName);
            }
        }

    }
}

?>