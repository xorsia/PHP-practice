<?php
  $ps = explode('\\', __FILE__);
  echo 'Вспомогательный путь файла '
      . $ps[count($ps)-1]
      . "<br>";
