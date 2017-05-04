<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <meta http-equiv = "content-type" content = "text/html; charset=utf-8">
  <title>Картинки</title>
</head>
<body>
<h3>
  Картинки
</h3>
<form action="/PHP-practice/img/img.php" method="post" enctype="multipart/form-data">
  <input type="file" name="image" accept="image/jpeg,image/png,image/gif">
  <input type="submit" value="Отправить">
</form>
</body>
</html>