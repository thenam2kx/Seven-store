<?php
// require_once './config/connect.php';
class BannerModel {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll() {
    $sql = "SELECT * FROM `banners` ORDER BY bannerId DESC";
    return $this->db->query($sql);
  }

  public function getOne($bannerId) {
    $sql = "SELECT * FROM `banners` WHERE bannerId=?";
    return $this->db->queryOne($sql, $bannerId);
  }

  public function create($duong_dan, $trang_thai = 1) {
    $sql = "INSERT INTO banners (duong_dan, trang_thai) VALUES (?, ?)";
    return $this->db->execute($sql, $duong_dan, $trang_thai);
  }

  public function edit($bannerId, $duong_dan, $trang_thai = 1) {
    $sql = "";
    if ($duong_dan !== '') {
      $sql = "UPDATE banners SET duong_dan=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE bannerId=?";
      return $this->db->execute($sql, $duong_dan, $trang_thai, $bannerId);
    } else {
      $sql = "UPDATE banners SET duong_dan=?, trang_thai=?, cap_nhat=CURRENT_TIMESTAMP WHERE tin_tuc_id=?";
      return $this->db->execute($sql, $duong_dan, $trang_thai, $bannerId);
    }
  }

  public function delete($bannerId) {
    $sql = "DELETE FROM `banners` WHERE bannerId=?";
    return $this->db->execute($sql, $bannerId);
  }
}

// try {
//   $tinTucDAO = new BlogModel();
//   $tinTucDAO->getAll();
//   var_dump($tinTucDAO->getAll());
//   echo "Bài viết đã lấy thành công!";
// } catch (\Throwable $th) {
//   throw $th;
// }

// try {
//     $tinTucDAO = new BlogDao();
//     $tinTucDAO->getOne(2);
//     var_dump($tinTucDAO->getOne(2));
//     echo "Bài viết đã lấy thành công!";
//   } catch (\Throwable $th) {
//     throw $th;
//   }

//try {
//  $tinTucDAO = new BlogDao();
//  $tinTucDAO->create("Tiêu đề mới", "Nội dung mới", "link_anh.jpg");
//  echo "Bài viết đã được thêm thành công!";
//} catch (\Throwable $th) {
//  throw $th;
//}

// try {
//   $tinTucDAO = new BlogDao();
//   $tinTucDAO->edit("Tiêu đề mới 2", "Nội dung mới 4", "link_anh_2.jpg", 1);
//   echo "Bài viết đã cập nhật thành công!";
// } catch (\Throwable $th) {
//   throw $th;
// }

// try {
//   $tinTucDAO = new BlogDao();
//   $tinTucDAO->delete(1);
//   echo "Bài viết đã xóa thành công!";
// } catch (\Throwable $th) {
//   throw $th;
// }
