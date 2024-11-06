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
        $sql = "SELECT * FROM lien_hes ORDER BY lien_he_id asc";
        return $this->db->query($sql);
       } catch (Exception $th) {
           echo $th->getMessage();
       }
    }


    public function delete($lien_he_id)
    {
        try {
            $sql = "DELETE FROM lien_hes WHERE lien_he_id=?";
            return $this->db->execute($sql, $lien_he_id);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
