<?php
class Pages extends Controller
{
    private $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'title' => 'Amanj Index',
            'posts' => $posts
        ];

        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = ['title' => 'درباره ما', 'description' => 'نمونه پروژه پی اچ پی با استفاده از فریم ورک ام وی سی'];
        $this->view('pages/about', $data);
    }
}