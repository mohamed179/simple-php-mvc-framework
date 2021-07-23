<?php

class Controller
{
    public function model($model)
    {
        // Require the model
        require_once '../app/models/' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    public function view($view, $data = [])
    {
        // Check if the view file exists
        if (file_exists('../app/views/' . $view . '.php')) {
            // Require and load the view file
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist!');
        }
    }
}