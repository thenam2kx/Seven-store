<?php
// require_once './config/connect.php';
class DashboardModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Connect();
  }

  public function getTotalUsers()
  {
    $sql= "select count(id) as tong_nguoi_dung from nguoi_dungs where 1";
    return $this->db->queryOne($sql);
  }

  // ===
  public function getTotalEarning()
  {
    $sql= "select sum(dh.thanh_toan) as tong_thanh_toan from  don_hangs dh where dh.trang_thai_don_hang_id = 9";
    return $this->db->queryOne($sql);
  }

  public function getTotalEarningOnYear()
  {
    $sql= "select month(dh.ngay_tao) AS thang, year(dh.ngay_tao) AS nam, sum(dh.thanh_toan) as tong_thanh_toan
      from don_hangs dh
      where dh.trang_thai_don_hang_id = 9 and year(dh.ngay_tao) = year(current_date())
      group by year(dh.ngay_tao), month(dh.ngay_tao)
      order by nam, thang;";
    return $this->db->query($sql);
  }

  public function getTotalEarningWithCurrentMonth()
  {
    $sql= "select month(dh.ngay_tao) AS thang, year(dh.ngay_tao) AS nam, sum(dh.thanh_toan) as tong_thanh_toan
        from don_hangs dh
        where dh.trang_thai_don_hang_id = 9 and month (dh.ngay_tao) = month (current_date())
        group by year(dh.ngay_tao), month(dh.ngay_tao)
        order by nam, thang;";
    return $this->db->queryOne($sql);
  }

  public function getTotalEarningWithOldMonth()
  {
    $sql= "select month(dh.ngay_tao) AS thang, year(dh.ngay_tao) AS nam, sum(dh.thanh_toan) as tong_thanh_toan
      from don_hangs dh
      where dh.trang_thai_don_hang_id = 9 and month (dh.ngay_tao) = month (current_date() - interval 1 month)
      group by year(dh.ngay_tao), month(dh.ngay_tao)
      order by nam, thang;";
    return $this->db->queryOne($sql);
  }

  // ===

  public function getTotalOrders()
  {
    $sql= "select count(id) as tong_don_hang from don_hangs dh where dh.trang_thai_don_hang_id = 9";
    return $this->db->queryOne($sql);
  }

  public function getTotalOrdersWithCurrentMonth()
  {
    $sql= "select count(id) AS tong_don_hang
      from don_hangs dh
      where dh.trang_thai_don_hang_id = 9 and month(dh.ngay_tao) = month(current_date());";
    return $this->db->queryOne($sql);
  }

  public function getTotalOrdersWithOldMonth()
  {
    $sql= "select count(id) AS tong_don_hang
      from don_hangs dh
      where dh.trang_thai_don_hang_id = 9 and month(dh.ngay_tao) = month(current_date() - interval 1 month);";
    return $this->db->queryOne($sql);
  }


  // ===
  public function getTotalProfit()
  {
    $sql= "select sum(dhct.gia_tien - sp.gia_nhap) as loi_nhuan
        from don_hang_cts dhct
        inner join san_phams sp on dhct.san_pham_id = sp.id
        inner join don_hangs dh on dhct.don_hang_id = dh.id
        where dh.trang_thai_don_hang_id = 9";
    return $this->db->queryOne($sql);
  }

  public function getTotalProfitOnYear()
  {
    $sql= "select year(dh.ngay_tao) as nam, month(dh.ngay_tao) as thang, sum(dhct.gia_tien - sp.gia_nhap) as loi_nhuan
      from don_hang_cts dhct
      inner join san_phams sp on dhct.san_pham_id = sp.id
      inner join don_hangs dh on dhct.don_hang_id = dh.id
      where dh.trang_thai_don_hang_id = 9
      group by nam, thang
      order by nam desc, thang desc;";
    return $this->db->query($sql);
  }

  public function getTotalProfitWithCurrentMonth()
  {
    $sql= "select sum(dhct.gia_tien - sp.gia_nhap) as loi_nhuan
        from don_hang_cts dhct
        inner join san_phams sp on dhct.san_pham_id = sp.id
        inner join don_hangs dh on dhct.don_hang_id = dh.id
        where dh.trang_thai_don_hang_id = 9 and month(dh.ngay_tao) = month(current_date())";
    return $this->db->queryOne($sql);
  }

  public function getTotalProfitWithOldMonth()
  {
    $sql= "select sum(dhct.gia_tien - sp.gia_nhap) as loi_nhuan
      from don_hang_cts dhct
      inner join san_phams sp on dhct.san_pham_id = sp.id
      inner join don_hangs dh on dhct.don_hang_id = dh.id
      where dh.trang_thai_don_hang_id = 9 and month(dh.ngay_tao) = month(current_date() - interval 1 month)";
    return $this->db->queryOne($sql);
  }

  public function getTopSellers()
  {
    $sql= "select sp.id as san_pham_id, sp.ten_san_pham, sp.gia_khuyen_mai, sp.anh_dai_dien , sp.gia_ban, (sp.gia_ban - sp.gia_khuyen_mai) as muc_giam_gia, dm.ten_danh_muc
        from san_phams as sp
        join danh_mucs dm on dm.id = sp.danh_muc_id
        where sp.gia_ban > sp.gia_khuyen_mai
        order by muc_giam_gia desc
        limit 5";
    return $this->db->query($sql);
  }

  public function getProductByCategory()
  {
    $sql= "select dm.id as danh_muc_id, dm.ten_danh_muc as ten_danh_muc, count(sp.id) as so_luong from san_phams as sp
        inner join danh_mucs as dm on sp.danh_muc_id = dm.id
        group by dm.id, dm.ten_danh_muc ";
    return $this->db->query($sql);
  }

  public function getOrderRecent()
  {
    $sql= "select dh.id as don_hang_id, trang_thai_don_hang_id, dh.tong_tien, nd.ho_ten, nd.email, ttdh.trang_thai
        from don_hangs dh
        join nguoi_dungs nd on nd.id = dh.nguoi_dung_id
        join trang_thai_don_hangs ttdh on ttdh.id = dh.trang_thai_don_hang_id
        where dh.trang_thai_don_hang_id = 9
        order by dh.ngay_tao
        desc limit 5";
    return $this->db->query($sql);
  }

}
