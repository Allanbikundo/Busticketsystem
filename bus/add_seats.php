<?php

//replace this with switch cases please 

$a = 1;
$column = 1;
do {
  if ($a <= 2) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','1_$column')");
    $a++;
    $column++;
      if ($column > 2) {
        $column = 1;
      }
  }
  elseif ($a <= 6) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','2_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  elseif ($a <= 10) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','3_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  elseif ($a <= 14) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','4_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  elseif ($a <= 18) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','5_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  elseif ($a <= 22) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','6_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  elseif ($a <= 26) {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','7_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  else {
    $SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','8_$column')");
    $a++;
    $column++;
    if ($column > 4) {
      $column = 1;
    }
  }
  //$column = 1;
  //$a++;
  //$SQL = $MySQLiconn->query("INSERT INTO seat(no_plate,seatnumber) VALUES('$no_plate','$a')");
} while ($a <= $no_of_seats);
}
