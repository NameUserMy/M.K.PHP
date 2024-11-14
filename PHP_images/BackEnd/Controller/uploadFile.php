<?php
require_once '../Modules/upload.php';
require_once '../Modules/addFileInDb.php';

$db = new AddFileDB();
$uploadFile = new UploadImg();
if (isset($_FILES['uploadFile']['name'])) {
  $uploadFile->SetDir('../images/');
  $uploadFile->SetFileName($_FILES['uploadFile']['name']);
  $uploadFile->SaveFile();

  $db->SetSize($_FILES['uploadFile']['size']);
  $db->SetName($_FILES['uploadFile']['name']);
  $db->SetpathFile($uploadFile->GetSrc());
  $db->AddData();
}

echo json_encode($_FILES['uploadFile']['error'], JSON_UNESCAPED_UNICODE);
