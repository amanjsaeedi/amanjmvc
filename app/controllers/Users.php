<?php
class Users extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        //check for Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Proccess form

            //Sanitize POST Data
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
                $data['email_err'] = 'لطفا ایمیل را وارد کنید!';
            }
            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'لطفا نام خود را وارد کنید!';
            } else {
                // check name
                if ($this->userModel->findUserByName($data['name'])) {
                    $data['name_err'] = 'نام کاربری از قبل وجود دارد!!';
                }
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'لطفا رمز عبور خود را وارد کنید!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'رمز عبور باید حداقل 6 کاراکتر باشد!';
            }
            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'لطفا تکرار رمز عبور خود را وارد کنید!';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'لطفا تکرار رمز عبور خود را صحیح وارد کنید!';
            }

            // make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // validate

                // Hash the password
                //$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 15]);

                // Register User
                if ($this->userModel->register($data)) {
                    flash('register_success', 'ثبت نام شما با موفقیت انجام شد. اکنون وارد سیستم شوید.');
                    redirect('users/login');

                } else {
                    die('مشکلی پیش اومده!');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }


        } else {
            // Load form
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

            // Load view
            $this->view('users/register', $data);
        }


    }

    public function login()
    {
        //check for Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Proccess form

            //Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init Data
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];

            // Validate Email
            if (empty($data['username'])) {
                $data['username_err'] = 'لطفا نام کاربری را وارد کنید!';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'لطفا رمز عبور خود را وارد کنید!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'رمز عبور باید حداقل 6 کاراکتر باشد!';
            }

            // check for user/ username
            if ($this->userModel->findUserByName($data['username'])) {
                // user found
            } else {
                // user not found
                $data['username_err'] = 'کاربر موردنظر پیدا نشد!';
            }

            // make sure errors are empty
            if (empty($data['username_err']) && empty($data['password_err'])) {
                // validate
                // check and set loggedIN user
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    // create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'رمزعبور نادرست می باشد.';
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }

        } else {
            // Load form
            $data = [
                'username' => '',
                'password' => '',
                'name_err' => '',
                'password_err' => '',
            ];

            // Load view

            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->userid;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        redirect('posts/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('posts/index');
    }
}