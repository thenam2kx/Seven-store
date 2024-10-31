<?php
require_once './config/connect.php';
class BlogDao {
  private $db;

  public function __construct() {
    $this->db = new Connect();
  }

  public function getAll() {
    $sql = "SELECT * FROM `tin_tucs` WHERE 1";
    return $this->db->query($sql);
  }

  public function getOne($tin_tuc_id) {
    $sql = "SELECT * FROM `tin_tucs` WHERE tin_tuc_id=?";
    return $this->db->queryOne($sql, $tin_tuc_id);
  }

  public function create($tieu_de, $noi_dung, $anh_avt, $trang_thai = 1) {
    $sql = "INSERT INTO tin_tucs (tieu_de, noi_dung, anh_avt, trang_thai) VALUES (?, ?, ?, ?)";
    return $this->db->execute($sql, $tieu_de, $noi_dung, $anh_avt, $trang_thai);
  }

  public function edit($tieu_de, $noi_dung, $anh_avt, $tin_tuc_id, $trang_thai = 1) {
    $sql = "UPDATE tin_tucs SET tieu_de=?, noi_dung=?, anh_avt=?, trang_thai=? WHERE tin_tuc_id=?";
    return $this->db->execute($sql, $tieu_de, $noi_dung, $anh_avt, $trang_thai, $tin_tuc_id);
  }

  public function delete($tin_tuc_id) {
    $sql = "DELETE FROM `tin_tucs` WHERE tin_tuc_id=?";
    return $this->db->execute($sql, $tin_tuc_id);
  }
}

// try {
//   $tinTucDAO = new BlogDao();
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
