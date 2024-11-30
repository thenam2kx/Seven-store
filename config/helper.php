<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function formatCurrency($amount) {
  return number_format($amount, 0, '', '.') . '';
}

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


function sendEmail ($toEmail, $Subject, $content) {

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';                                          //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'thenam2kx@gmail.com';                     //SMTP username
    $mail->Password   = 'wkgm cnzk jrjm twav';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nammtph52069@gmail.com', 'Seven-store');
    $mail->addAddress($toEmail);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = $content;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Gửi email thành công';
} catch (Exception $e) {
    echo "Gửi email thất bại. Mailer Error: {$mail->ErrorInfo}";
}
}
