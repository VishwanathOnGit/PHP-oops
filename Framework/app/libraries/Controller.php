<?php
/*
    Base Controller
    Loads Models and Views
*/
class Controller
{
    // Loads Model
    public function model($model)
    {
        // require model file
        require_once '../app/model/' . $model . '.php';

        // Instantiate the model
        return new $model;
    }

    // Loads View
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            // require View file
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
