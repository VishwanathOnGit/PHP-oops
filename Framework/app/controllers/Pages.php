<?php

class Pages extends Controller
{
    public function __construct()
    {
        // echo 'Pages Loaded';
    }

    public function index()
    {
        $data = [
            "title" => "Welcome to OOPS PHP"
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
