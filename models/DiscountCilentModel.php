<?php
// require_once './config/connect.php';
class DiscountCilentModel
{
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAllDiscount() {
    $sql = "SELECT  *, khuyen_mais.id AS id FROM `khuyen_mais`";
    return $this->db->query($sql, );
  }

}
