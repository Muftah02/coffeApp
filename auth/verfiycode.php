<?php
include '../connect.php';
 $email = filterRequest("email");
 $verfiy = filterRequest("verfiycode");
 $stmt = $con->prepare("SElECT * FROM users WHERE user_email = '$email' AND user_verfiycode = '$verfiy'");
 $stmt->execute();
 $count = $stmt->rowCount();
 if ($count >0){
  $data = array("user_approve" => "1");
  updateData("users", $data , "user_email = '$email'");
 }else {
 printFailure("veryfiycode not correct");
 }
 