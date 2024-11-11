<?php

class AuthController {
  public function __construct() {}

  public function signIn() {
    try {
        require_once "./views/auth/signin.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }

  public function signUp() {
    try {
        require_once "./views/auth/signup.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }

  public function fogotPassword() {
    try {
        require_once "./views/auth/fogotPassword.php";
      } catch (\Throwable $th) {
        throw $th;
      }
  }
}
