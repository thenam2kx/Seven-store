<?php
// require_once './config/connect.php';
class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Connect();
    }
    public function checkSignin($ho_ten, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM nguoi_dungs WHERE ho_ten = '$ho_ten' AND mat_khau = '$mat_khau'";
            return $this->db->query($sql);
            $user= $this->db->fetch();
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['vai_tro']==1) {
                    if ($user['trang_thai']==1) {
                        return true;
                    }else{
                        return "Tài khoản đang bị khóa";
                    }
                }else{
                    return "Tài khoản không có quyền truy cập";
                }    
            }else{
                return "Bạn nhập sai thông tin tài khoản";
            }
        } catch (Exception $th) {
            echo $th->getMessage();
            return false;
        }
    }
}
