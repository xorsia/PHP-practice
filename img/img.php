<?php
if(is_uploaded_file($_FILES['image']['tmp_name'])) {
  echo 'Пришла картинка.';
  $file_name = $_FILES['image']['tmp_name'];
  $a = getimagesize($file_name);

  echo $a[3];
} else {
  echo 'Ничего нет!';
  exit;
}