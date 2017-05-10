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
  // Вывод изображения в браузер или в файл;
  // Создание картинки с определенного типа;
  $image = imagecreatefromjpeg($img);
  // Вывод картинки в файл;
  //header('Content-Type: ' . image_type_to_mime_type(IMAGETYPE_WBMP));
  //image2wbmp($image); // вывод потока
  //imagedestroy($image);
} else {
  echo 'Ничего нет!';
  exit;
}