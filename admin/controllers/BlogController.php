<?php

class BlogController
{
  public function index() {
    require_once "./views/blog/listBlog.php";
  }

  public function add() {
    require_once "./views/blog/addBlog.php";
  }

  public function edit() {
    require_once "./views/blog/editBlog.php";
  }
}
