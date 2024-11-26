<?php
// require_once './config/connect.php';
class FavoriteProductModel
{
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAllFavorite($id) {
    $sql = "SELECT  *, san_pham_yeu_thichs.id AS id, san_phams.id as spid
      FROM `san_pham_yeu_thichs` INNER JOIN `nguoi_dungs` ON san_pham_yeu_thichs.nguoi_dung_id = nguoi_dungs.id
      INNER JOIN `san_phams` ON san_pham_yeu_thichs.san_pham_id = san_phams.id
      WHERE nguoi_dung_id = ?";
    return $this->db->query($sql, $id);
  }

  public function getAllFavoriteFn2($id) {
    $sql = "select spyt.id as spytid, sp.id as spid from san_pham_yeu_thichs spyt
      join san_phams sp on spyt.san_pham_id = sp.id
      where spyt.nguoi_dung_id = ?";
    return $this->db->query($sql, $id);
  }

  public function create($san_pham_id, $nguoi_dung_id)
  {
    $sql = "INSERT INTO `san_pham_yeu_thichs` (san_pham_id, nguoi_dung_id) VALUES (?, ?)";
    return $this->db->execute($sql, $san_pham_id, $nguoi_dung_id);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM `san_pham_yeu_thichs` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
