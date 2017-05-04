<?php
if(is_uploaded_file($_FILES['image']['tmp_name'])) {
  echo 'Пришла картинка.';
  $file_name = $_FILES['image']['tmp_name'];
  // Информация о картинке;
  $a = getimagesize($file_name);
  // Информация о картинке из строки;
  $img = __DIR__ . '/paint.jpg';
  $data = file_get_contents($img);
  $a = getimagesizefromstring($data);
  var_dump($a);
} else {
  echo 'Ничего нет!';
  exit;
}