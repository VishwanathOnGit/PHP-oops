<?php 
class Users extends Controller
{
    public function __construct()
    {
        
    }

    public function register() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            // Process the form
        } else {
            // Init Data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('users/register', $data);
        }
    }
   
    public function login() {

    }
}

?>