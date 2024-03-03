<?php
class App
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $URL = $this->getURL();

        $controllerFile = "../private/controllers/" . ucfirst($URL[0]) . ".php";
        if (file_exists($controllerFile)) {
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            echo "<center><h1>Controller not found</h1></center>";
            die;
        }

        require $controllerFile;
        $this->controller = new $this->controller();

        if (isset($URL[1]) && method_exists($this->controller, ucfirst($URL[1]))) {
            $this->method = ucfirst($URL[1]);
            unset($URL[1]);
        }

        $this->params = array_values($URL);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
        return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL);
    }
}
?>