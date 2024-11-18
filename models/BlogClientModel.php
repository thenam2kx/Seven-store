<?php
class BlogClientModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getBlog() {
    $sql = "SELECT * FROM `tin_tucs` ORDER BY id DESC";
    return $this->db->query($sql);
  }
  
  public function getBlogById($id) {
    $sql = "SELECT * FROM `tin_tucs` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }
  
}
