<?php

// require_once './config/env.php'; // Config env

// function connectDB() {
//   // Kết nối CSDL
//   $host = DB_HOST;
//   $port = DB_PORT;
//   $dbname = DB_NAME;

//   try {
//     $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

//     // cài đặt chế độ báo lỗi là xử lý ngoại lệ
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // cài đặt chế độ trả dữ liệu
//     $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//     return $conn;
//   } catch (PDOException $e) {
//     echo ("Connection failed: " . $e->getMessage());
//   }
// }


function checkLoginAdmin(){
  if(!isset($_SESSION['username'])){
    header("Location: " . BASE_URL_ADMIN . '?act=signin');
    exit();
  }
}


class Connect {
  private $host = DB_HOST;
  private $dbname = DB_NAME;
  private $username = DB_USERNAME;
  private $password = DB_PASSWORD;
  private $conn;

  public function __construct() {
    try {
      $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function execute($sql, ...$params) {
    try {
      $stmt = $this->conn->prepare($sql);
      return $stmt->execute($params);
    } catch (PDOException $e) {
      throw $e;
    }
  }

  public function query($sql, ...$params) {
    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw $e;
    }
  }

  public function queryOne($sql, ...$params) {
    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      throw $e;
    }
  }

  public function __destruct() {
    $this->conn = null;
  }
}
