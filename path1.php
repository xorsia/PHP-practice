<?php
  $a1 = './';
  $a2 = 'C:/';
  $b = realpath($a2 . DIRECTORY_SEPARATOR);
  echo $b;