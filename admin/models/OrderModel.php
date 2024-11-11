<?php
// require_once './config/connect.php';
class OrderModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function getAll()
    {
       try {
        $sql = "SELECT * FROM don_hangs ORDER BY id asc";
        return $this->db->query($sql);
       } catch (Exception $th) {
           echo $th->getMessage();
       }
    }
    public function getOne($id)
    {
        try {
            $sql = "SELECT * FROM don_hangs WHERE id=?";
            return $this->db->queryOne($sql, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function edit($trang_thai, $id)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai=? WHERE id=?";
            return $this->db->execute($sql, $trang_thai, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM don_hangs WHERE id=?";
            return $this->db->execute($sql, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
