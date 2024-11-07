<?php
// require_once './config/connect.php';
class ProductModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Connect();
  }

  public function getAll($limit = 10, $page = 1, $keySearch = "")
  {
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM san_phams ";
    if ($keySearch !== '') {
      $sql.= " and name LIKE '%".$keySearch."%'";
    }
    $sql.= "ORDER BY id DESC LIMIT $offset, $limit";
    return $this->db->query($sql);
  }
  public function getTotalPage()
  {
    $sql = "SELECT COUNT(*) AS total FROM `san_phams`";
    $result = $this->db->query($sql);
    return $result[0]['total'];
  }

  public function getOne($id)
  {
    $sql = "SELECT * FROM `san_phams` WHERE id=?";
    return $this->db->queryOne($sql, $id);
  }

  public function create($danh_muc_id, $ten_san_pham, $mo_ta_ngan, $mo_ta_chi_tiet, $gia_nhap, $gia_ban, $gia_khuyen_mai, $ngay_nhap, $so_luong, $anh_dai_dien, $trang_thai)
  {
    $sql = "INSERT INTO `san_phams` (danh_muc_id, ten_san_pham, mo_ta_ngan, mo_ta_chi_tiet, gia_nhap, gia_ban, gia_khuyen_mai, ngay_nhap, so_luong, anh_dai_dien, trang_thai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return $this->db->execute($sql, $danh_muc_id, $ten_san_pham, $mo_ta_ngan, $mo_ta_chi_tiet, $gia_nhap, $gia_ban, $gia_khuyen_mai, $ngay_nhap, $so_luong, $anh_dai_dien, $trang_thai);
  }

  public function edit($danh_muc_id, $ten_san_pham, $mo_ta_ngan, $mo_ta_chi_tiet, $gia_nhap, $gia_ban, $gia_khuyen_mai, $so_luong, $anh_dai_dien, $trang_thai, $id) {
    $sql = "";
    if ($anh_dai_dien !== '') {
      $sql = "UPDATE `san_phams` SET
        `danh_muc_id`=?, `ten_san_pham`=?, `mo_ta_ngan`=?, `mo_ta_chi_tiet`=?, `gia_nhap`=?, `gia_ban`=?, `gia_khuyen_mai`=?, `so_luong`=?, `anh_dai_dien`=?, `trang_thai`=?, `cap_nhat`=CURRENT_TIMESTAMP
      WHERE id=?";
      return $this->db->execute(
        $sql,
        $danh_muc_id, $ten_san_pham, $mo_ta_ngan, $mo_ta_chi_tiet, $gia_nhap, $gia_ban, $gia_khuyen_mai, $so_luong, $anh_dai_dien, $trang_thai, $id
      );
    } else {
      $sql = "UPDATE `san_phams` SET
        `danh_muc_id`=?, `ten_san_pham`=?, `mo_ta_ngan`=?, `mo_ta_chi_tiet`=?, `gia_nhap`=?, `gia_ban`=?, `gia_khuyen_mai`=?, `so_luong`=?, `trang_thai`=?, `cap_nhat`=CURRENT_TIMESTAMP
      WHERE id=?";
      return $this->db->execute(
        $sql,
        $danh_muc_id, $ten_san_pham, $mo_ta_ngan, $mo_ta_chi_tiet, $gia_nhap, $gia_ban, $gia_khuyen_mai, $so_luong, $trang_thai, $id
      );
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM `san_phams` WHERE id=?";
    return $this->db->execute($sql, $id);
  }
}
