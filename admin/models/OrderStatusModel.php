<?php
// require_once './config/connect.php';
class OrderStatusModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function getAll()
    {
       try {
        $sql = "SELECT * FROM trang_thai_don_hangs ORDER BY id asc";
        return $this->db->query($sql);
       } catch (Exception $th) {
           echo $th->getMessage();
       }
    }
    public function getOne($id)
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs WHERE id=?";
            return $this->db->queryOne($sql, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function add($don_hangs_id, $trang_thai)
    {
      $sql = "INSERT INTO `trang_thai_don_hangs` (don_hangs_id, trang_thai) VALUES (?, ?)";
      return $this->db->execute($sql, $don_hangs_id, $trang_thai);
    }



    public function edit($trang_thai, $id)
    {
        try {
            $sql = "UPDATE trang_thai_don_hangs SET trang_thai=? WHERE id=?";
            return $this->db->execute($sql, $trang_thai, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM trang_thai_don_hangs WHERE id=?";
            return $this->db->execute($sql, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
