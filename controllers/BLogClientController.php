<?php

class BlogClientController
{
  public $BlogClientModel;
  public function __construct() {
    $this->BlogClientModel = new BlogClientModel();
  }
  public function viewBlog() {
    $viewBlog = $this->BlogClientModel->getBlog();
    require_once 'views/Blog/Blogs.php';
  }
  public function blogPost() {
    $id = $_GET['id'];
    $blogPost = $this->BlogClientModel->getBlogById($id);
    require_once 'views/Blog/BlogPost.php';
  }

}
