<?php

$dir = 'uploads';
if(!file_exists($dir))
  mkdir($dir);

header('content-type: application/json');

function uploadFile(){
  if(!isset( $_FILES['file']) ||  !isset($_POST['id'])){
    http_response_code(400);
    echo json_encode([
      'message' => 'El campo file o id es obligatorio',
    ]);
    return;
  }

  $file = $_FILES['file'];
  
  $path = 'uploads/'.$file['name'];
  $isUpload = move_uploaded_file($file['tmp_name'], $path);
  echo json_encode([
    'id' => $_POST['id'],
    'file' => $file,
    'isUpload' => $isUpload,
  ]);
}


uploadFile();