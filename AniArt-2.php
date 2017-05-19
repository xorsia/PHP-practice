<?php
/*
  Алгоритм для подсчета количества вариантов размещения 8 пешек на шахматной доске X - Y;
 */
ini_set('max_execution_time', 900);
// Начальный размер доски;
$x = 8;
$y = 8;
// x * y = номер уникальной позиции одной из пешек;
$z = $x * $y;
// Доска не может быть меньше чем x*y=8;
if ($z < 8) {
  echo 'Слишком маленький размер шахматной доски';
  exit;
}
// $n - к-во вариантов;
$n = 0;
for ($i1 = 1; $i1 <=$z; $i1++) {
  for ($i2 = $i1; $i2 <= $z; $i2++) {
    if ($i2 == $i1) {
      continue;
    } else {
      for ($i3 = $i2; $i3 <= $z; $i3++) {
        if ($i3 == $i1 || $i3 == $i2) {
          continue;
        } else {
          for ($i4 = $i3; $i4 <= $z; $i4++) {
            if ($i4 == $i3 || $i4 == $i2 || $i4 == $i1) {
              continue;
            } else {
              for ($i5 = $i4; $i5 <= $z; $i5++) {
                if ($i5 == $i4 || $i5 == $i3 || $i5 == $i2 || $i5 == $i1) {
                  continue;
                } else {
                  for ($i6 = $i5; $i6 <= $z; $i6++) {
                    if ($i6 == $i5 || $i6 == $i4 || $i6 == $i3 || $i6 == $i2 || $i6 == $i1) {
                      continue;
                    } else {
                      for ($i7 = $i6; $i7 <= $z; $i7++) {
                        if ($i7 == $i6 || $i7 == $i5 || $i7 == $i4 || $i7 == $i3 || $i7 == $i2 || $i7 == $i1) {
                          continue;
                        } else {
                          for ($i8 = $i7; $i8 <= $z; $i8++) {
                            if ($i8 == $i7 || $i8 == $i6 || $i8 == $i5 || $i8 == $i4 || $i8 == $i3 || $i8 == $i2 || $i8 == $i1) {
                              continue;
                            } else {
                              $n++;
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
echo $n;
