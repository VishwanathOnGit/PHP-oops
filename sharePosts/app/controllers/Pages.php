<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "Welcome to Share Posts",
            "description" => "Simple social network built on the PHPMVC Framework"
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            "title" => "About OOPS PHP",
            "description" => "App to share posts with other users"
        ];
        $this->view('pages/about', $data);
    }
}
