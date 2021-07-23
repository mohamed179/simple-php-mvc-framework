<?php

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        // Look for the controller to be used from the url
        if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->currentController = ucfirst($url[0]);
            unset($url[0]);
        }

        // Require the controller and instantiate it
        require_once '../app/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;


        // Check for the controller method to be called
        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Call a callback with params
        call_user_func_array(
            [$this->currentController, $this->currentMethod],
            $this->params
        );
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');

            // Alows you to filter varaibles as string/number
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Breaking it into an array
            $url = explode('/', $url);
            return $url;
        } else {
            return [];
        }
    }
}
