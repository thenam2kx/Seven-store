<?php
class ContactModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function add($email, $so_dien_thoai, $noi_dung , $trang_thai = 1)
    {
       try {
        $sql = "INSERT INTO lien_hes (email,so_dien_thoai,noi_dung ,trang_thai) VALUES (?, ?, ?, ?)";

        return $this->db->execute($sql, $email, $so_dien_thoai, $noi_dung , $trang_thai);
        var_dump($so_dien_thoai);die();
       } catch (Exception $th) {
           echo $th->getMessage();
       }
    }


}
