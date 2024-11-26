<?php

class DashboardController
{
  public $DashboardModel;
  public function __construct() {
    $this->DashboardModel = new DashboardModel();
  }
  public function index()
  {
    $getTopSellers = $this->DashboardModel->getTopSellers();
    $getProductByCategory = $this->DashboardModel->getProductByCategory();
    $data = array_column($getProductByCategory, 'so_luong');
    $dataLabel = array_column($getProductByCategory, 'ten_danh_muc');

    $getTotalEarningOnYear = $this->DashboardModel->getTotalEarningOnYear();
    $allMonthsEarningOnYear = array_column($getTotalEarningOnYear, 'thang');
    $dataTotalEarningOnYear = array_column($getTotalEarningOnYear, 'tong_thanh_toan');


    $getTotalProfitOnYear = $this->DashboardModel->getTotalProfitOnYear();
    $dataTotalProfitOnYear = array_column($getTotalProfitOnYear, 'loi_nhuan');

    $getOrderRecent = $this->DashboardModel->getOrderRecent();

    // ===
    $getTotalEarning = $this->DashboardModel->getTotalEarning();
    $getTotalEarningWithCurrentMonth = $this->DashboardModel->getTotalEarningWithCurrentMonth();
    $getTotalEarningWithOldMonth = $this->DashboardModel->getTotalEarningWithOldMonth();
    $resultEarning = isset($getTotalEarningWithCurrentMonth['tong_thanh_toan']) && isset($getTotalEarningWithOldMonth['tong_thanh_toan'])
      ?
        ((($getTotalEarningWithCurrentMonth['tong_thanh_toan'] - $getTotalEarningWithOldMonth['tong_thanh_toan']) * 100 )
        /
        $getTotalEarningWithOldMonth['tong_thanh_toan'])
      :
        0;
    $boolearnResultEarning = $resultEarning >= 0 ? 1 : -1;

    // ===
    $getTotalOrders = $this->DashboardModel->getTotalOrders();
    $getTotalOrdersWithCurrentMonth = $this->DashboardModel->getTotalOrdersWithCurrentMonth();
    $getTotalOrdersWithOldMonth = $this->DashboardModel->getTotalOrdersWithOldMonth();
    $resultOrders = $getTotalOrdersWithCurrentMonth['tong_don_hang'] ?
      ((($getTotalOrdersWithCurrentMonth['tong_don_hang'] - $getTotalOrdersWithOldMonth['tong_don_hang']) * 100 )
        /
        ($getTotalOrdersWithOldMonth['tong_don_hang'] === 0 ? 1 : $getTotalOrdersWithOldMonth['tong_don_hang']))
        :
        0;
    $boolearnResultOrders = $resultOrders >= 0 ? 1 : -1;

    // ===
    $getTotalProfit = $this->DashboardModel->getTotalProfit();
    $getTotalProfitWithCurrentMonth = $this->DashboardModel->getTotalProfitWithCurrentMonth();
    $getTotalProfitWithOldMonth = $this->DashboardModel->getTotalProfitWithOldMonth();
    $resultProfit = $getTotalProfitWithCurrentMonth['loi_nhuan'] ? ((($getTotalProfitWithCurrentMonth['loi_nhuan'] - $getTotalProfitWithOldMonth['loi_nhuan']) * 100 ) / ($getTotalProfitWithOldMonth['loi_nhuan'] == 0 ? 1 : $getTotalProfitWithOldMonth['loi_nhuan'])) : 0;
    $boolearnResultProfit = $resultProfit >= 0 ? 1 : -1;

    // ===
    $getTotalUsers = $this->DashboardModel->getTotalUsers();

    require_once "./views/dashboard.php";
  }
}
