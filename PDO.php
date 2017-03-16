<?php
$dsn = '';
$user = '';
$password = '';
try {
  $dbh = new PDO($dsn, $user, $password); // передача в конструктор;
}
catch(PDOException $e) {
  echo 'Ошибка подключения: '. $e->getMessage();
}

// экранирование, защита от ошибок;
$id = 1;
$id = $dbh->quote($id);
// теперь $id будет с кавычками;

$sql = '';  // текст запроса;
$result = $dbh->query($sql);
$result->setFetchMode(PDO::FETCH_CLASS, 'Cat');
while($row = $result->fetch()) {
  // в обьект $row класса Cat будут записаны данные с БД;
  // названия обьектов в классе (переменных) должны называться также как и поля в таблице БД;
}

// или:
$result = $dbh->prepare($sql);  // запрос с подстановкой;
$result->bindParam(':к чему подставить', 'что подставить', PDO::PARAM_INT);
$result->execute();  // выполнение запроса;

// Трансакции;
// Изменений в БД не будет, пока не будет завершена трансакция;
try {
  $dbh->beginTransaction();
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // выполнение запроса;
  // выполнение запроса;  
  $dbh->comit();  // трансакция выполнена успешно;  
}
catch(PDOException $e) {
  echo 'Ошибка' . $e->getMessage();
  $dbh->rollBack();  // откат трансакции;
}