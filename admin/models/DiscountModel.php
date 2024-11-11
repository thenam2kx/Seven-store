<?php
// require_once './config/connect.php';
class DiscountModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Connect();
  }

  public function getAll($limit = 10, $page = 1, $keySearch = "")
  {
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM `khuyen_mais` ";
    if ($keySearch !== '') {
      $sql.= " and name LIKE '%".$keySearch."%'";
    }
    $sql.= "ORDER BY id DESC LIMIT $offset, $limit";
    return $this->db->query($sql);
  }
  public function getTotalPage()
  {
    $sql = "SELECT COUNT(*) AS total FROM `khuyen_mais`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
  }

  public function getOne($id)
  {
    $sql = "SELECT * FROM `khuyen_mais` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($ma_km, $ngay_bat_dau, $ngay_ket_thuc, $phan_tram, $trang_thai)
  {
    $sql = "INSERT INTO `khuyen_mais`(ma_km, ngay_bat_dau, ngay_ket_thuc, phan_tram, trang_thai) VALUES (?, ?, ?, ?, ?)";
    return $this->db->execute($sql, $ma_km, $ngay_bat_dau, $ngay_ket_thuc, $phan_tram, $trang_thai);
  }


  public function edit($ma_km, $ngay_bat_dau, $ngay_ket_thuc, $phan_tram, $trang_thai, $id) {
    $sql = "UPDATE`khuyen_mais` SET ma_km=?,ngay_bat_dau=?,ngay_ket_thuc=?,phan_tram=?,trang_thai=?
      WHERE id=?";
      return $this->db->execute(
        $sql,
        $ma_km, $ngay_bat_dau, $ngay_ket_thuc, $phan_tram, $trang_thai, $id
      );
  }

  public function delete($id)
  {
    $sql = "DELETE FROM `khuyen_mais` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
