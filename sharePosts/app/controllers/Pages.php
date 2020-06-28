<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "Welcome to Share Posts"
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            "title" => "About OOPS PHP"
        ];
        $this->view('pages/about', $data);
    }
}
