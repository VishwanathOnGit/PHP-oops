<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Process the form

            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init Data
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter email";
            } else {
                // Check email exists
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = "Email is already taken";
                }
            }

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = "Please enter name";
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter password";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be atleast 6 characters";
            }

            // Validate confirm_password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please enter name";
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Passwords do not match";
            }
            // Make sure error are empty
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // die("SUCCESS");
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong!');
                }
            } else {
                $this->view('users/register', $data);
            }
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

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Process the form
            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init Data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter email";
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter password";
            }

            // check for user.email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User Found
            } else {
                $data['email_err'] = "No User found";
            }

            // Make sure error are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // die("SUCCESS");
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create Session
                    // die("SUCCESS");
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = "Password Incorrect";
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            // Init Data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        redirect('posts');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }
}
