<?php
  $link = mysqli_connect('localhost','root','','tablesitedb');

  if(mysqli_connect_errno()) {
      echo ('Error occured('.mysqli_connect_errno().'): '.mysqli_connect_error());
      exit();
  }
  else{
      printf("Succes!\n");
      $query = 'SELECT * FROM tablesitedb';
      if($result = $link -> query("SELECT val FROM categories")) {
          printf(" vernul %d strok ", $result -> num_rows);
      }
  }

  $sql = mysqli_query($link, 'SELECT val, name, surname, place FROM categories');
  while ($result = mysqli_fetch_array($sql)) {
    echo ("{$result['val']}: {$result['name']}, {$result['surname']},{$result['place']}");
  }
?>
