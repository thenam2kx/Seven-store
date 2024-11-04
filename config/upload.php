<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Kiểm tra xem tệp đã được tải lên chưa
  if (isset($_FILES['upload']) && $_FILES['upload']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['upload']['tmp_name'];
    $fileName = $_FILES['upload']['name'];
    $fileSize = $_FILES['upload']['size'];
    $fileType = $_FILES['upload']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Chỉ cho phép tải lên các loại hình ảnh
    $allowedfileExtensions = ['jpg', 'gif', 'png', 'jpeg', 'bmp', 'tiff'];
    if (in_array($fileExtension, $allowedfileExtensions)) {
      // Đường dẫn đến thư mục lưu trữ hình ảnh
      $uploadFileDir = 'uploads/';
      $dest_path = $uploadFileDir . $fileName;

      // Di chuyển tệp tải lên vào thư mục lưu trữ
      if (move_uploaded_file($fileTmpPath, $dest_path)) {
        // Trả về URL của hình ảnh đã tải lên
        echo json_encode(['url' => $dest_path]);
      } else {
        echo json_encode(['error' => 'Có lỗi khi di chuyển tệp tải lên.']);
      }
    } else {
      echo json_encode(['error' => 'Chỉ cho phép tải lên các loại hình ảnh.']);
    }
  } else {
    echo json_encode(['error' => 'Không có tệp nào được tải lên.']);
  }
}
