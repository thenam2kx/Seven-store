<?php
// require_once './config/connect.php';
class ContactModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function getAll()
    {
       try {
        $sql = "SELECT * FROM lien_hes ORDER BY id asc";
        return $this->db->query($sql);
       } catch (Exception $th) {
           echo $th->getMessage();
       }
    }


    public function delete($id)
    {
        try {
            $sql = "DELETE FROM lien_hes WHERE id=?";
            return $this->db->execute($sql, $id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
