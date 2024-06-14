<?php

class Posts extends controller
{
    private $postModel;
    private $userModel;
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }
    public function index()
    {
        // Get Posts
        $posts = $this->postModel->getPosts();
        $data = ['posts' => $posts];


        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize the Post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'desc' => trim($_POST['description']),
                'userid' => $_SESSION['user_id'],
                'title_err' => '',
                'desc_err' => ''
            ];
            // validate post title
            if (empty($data['title'])) {
                $data['title_err'] = 'لطفا عنوانی برای پست جدید خود انتخاب کنید.';
            }
            // validate post description
            if (empty($data['desc'])) {
                $data['desc_err'] = 'لطفا توضیحات پست جدید خود را بنویسید.';
            }

            // make sure no error
            if (empty($data['title_err']) && empty($data['desc_err'])) {
                // validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'پست جدید اضافه شد');
                    redirect('posts/add');

                } else {
                    die('ظاهرا مشکلی پیش آمده');
                }
            } else {
                // load view with errors
                $this->view('posts/add', $data);

            }

        } else {
            $data = [
                'title' => '',
                'desc' => ''
            ];

            $this->view('posts/add', $data);
        }
    }
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize the Post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => trim($_POST['title']),
                'desc' => trim($_POST['description']),
                'postid' => $id,
                'title_err' => '',
                'desc_err' => ''
            ];

            // validate post title
            if (empty($data['title'])) {
                $data['title_err'] = 'لطفا عنوانی برای پست جدید خود انتخاب کنید.';
            }
            // validate post description
            if (empty($data['desc'])) {
                $data['desc_err'] = 'لطفا توضیحات پست جدید خود را بنویسید.';
            }

            // make sure no error
            if (empty($data['title_err']) && empty($data['desc_err'])) {
                // validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'پست مورد نظر بروزرسانی شد');
                    redirect('posts');

                } else {
                    die('ظاهرا مشکلی پیش آمده');
                }
            } else {
                // load view with errors
                $this->view('posts/edit', $data);

            }

        } else {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->userid);
            $data = [
                'id' => $id,
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/edit', $data);
        }


    }

    public function single($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->userid);

        $data = [
            'post' => $post,
            'user' => $user
        ];
        $this->view('posts/single', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'پست موردنظر حذف شد.');
                redirect('posts');
            } else {
                die('ظاهرا مشکلی پیش اومده');
            }
        } else {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->userid);
            $data = [
                'id' => $id,
                'post' => $post,
                'user' => $user
            ];
            $this->view('posts/delete', $data);
        }
    }
}