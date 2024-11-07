<?php

if (!function_exists('debug')) {
  function debug($data)
  {
    echo '<pre>';
    print_r($data);
    die;
  }
}

function formatVND($amount) {
  // Kiểm tra nếu số tiền là hợp lệ
  if (!is_numeric($amount)) {
      return 'Invalid amount';
  }

  // Nếu phần thập phân là 0, chỉ hiển thị số nguyên
  if (intval($amount) == $amount) {
      return number_format($amount, 0, ',', '.') . ' ₫';
  } else {
      return number_format($amount, 2, ',', '.') . ' ₫';
  }
}


function uploadImage($file, $targetDir = "uploads/", $maxSize = 2 * 1024 * 1024)
{
  // Allowed file types
  $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

  // Check if file was uploaded without errors
  if ($file['error'] === UPLOAD_ERR_OK) {
    $fileName = basename($file["name"]);
    $fileSize = $file["size"];
    $fileTmpName = $file["tmp_name"];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Validate file type
    if (!in_array(strtolower($fileType), $allowedTypes)) {
      echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
      return false;
    }

    // Validate file size
    if ($fileSize > $maxSize) {
      echo "Error: File size exceeds the maximum limit of " . ($maxSize / 1024 / 1024) . " MB.";
      return false;
    }

    // Create target directory if it doesn't exist
    if (!is_dir($targetDir)) {
      mkdir($targetDir, 0777, true);
    }

    // Generate a unique name for the file and move it to the target directory
    $newFileName = uniqid() . "." . $fileType;
    $targetFilePath = $targetDir . $newFileName;

    if (move_uploaded_file($fileTmpName, $targetFilePath)) {
      // echo "File uploaded successfully to " . $targetFilePath;
      return $targetFilePath;
    } else {
      echo "Error: There was a problem uploading your file.";
      return false;
    }
  } else {
    echo "Error: " . $file['error'];
    return false;
  }
}
