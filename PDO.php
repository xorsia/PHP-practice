<?php
$dsn = 'mysql:dbname=test2;host=localhost;charset=utf8';
$user = 'root';
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
/*
// Простой запрос;
$sql = 'SELECT * FROM tabl1';
$sth = $dbh->query($sql);
$m = [];
while($row = $sth->fetch()) {
  $m[] = $row;
}
var_dump($m[0]['Название товара']);
*/
/*
// Вставка новой строки в таблицу базы данных;
$sql = "INSERT INTO tabl1 (Name, About, Price) VALUES ('Ноутбук','Средней категории','900')";
$stm = $dbh->prepare($sql);
// Результат выполенния будет записан в $a;
$a = $stm->execute();
echo "<br>" . $a;
*/
/*
// Изменение строки;
$sql = "UPDATE tabl1 SET Name='Лэптоп', About='Мини-ноутбук', Price='200' WHERE id='8'";
$stm = $dbh->prepare($sql);
// Результат выполенния будет записан в $a;
$a = $stm->execute();
echo $a;
*/
/*
// Удаление строки;
$sql = 'DELETE FROM tabl1 WHERE id=:id';
$stm = $dbh->prepare($sql);
$b = 9;
$stm->bindValue(':id', $b, PDO::PARAM_INT);
// Результат выполенния будет записан в $a;
$stm->execute();
*/
/*
// Трансакции;
// Изменений в БД не будет, пока не будет завершена трансакция;
try {
  $dbh->beginTransaction();
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Запрос с последовательной подстановкой;
  $sql = 'SELECT * FROM tabl1 WHERE Name=:t1 AND Price=:t2';
  $sth = $dbh->prepare($sql);
  $a = 'Монитор';
  $b = 500;
//$sth->bindValue(1, $a, PDO::PARAM_STR);
  $sth->bindValue(':t1', $a, PDO::PARAM_STR);
  $sth->bindValue(':t2', $b, PDO::PARAM_INT);
  $sth->execute();
  while ($row = $sth->fetch(PDO::FETCH_NUM)) {
    var_dump($row);
  }

  $dbh->commit();  // трансакция выполнена успешно;

  echo "<br>" . $sth->rowcount() . "<br>";
}
catch(PDOException $e) {
  echo 'Ошибка' . $e->getMessage();
  $dbh->rollBack();  // откат трансакции;
}
*/