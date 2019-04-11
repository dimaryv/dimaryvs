<?php
/*
echo('Модель запущена <br>');

$mysqli = new mysqli('localhost','root','','tablesitedb');
if(mysqli_connect_errno()) {
  echo ('Error occured('.mysqli_connect_errno().'): '.mysqli_connect_error());
  exit();
}
echo 'Successfully connected to server! <br>';
$json_array = array();
if ($result = $mysqli->query('SELECT * FROM categories')) {
while ($row = $result->fetch_assoc()) {
  $json_array[] = $row;
}
  $result -> free();
}
$mysqli -> close();
$data = json_encode($json_array);

*/
function get_data() {

  $mysqli = new mysqli('localhost','root','','tablesitedb');
  if(mysqli_connect_errno()) {
    echo ('Error occured('.mysqli_connect_errno().'): '.mysqli_connect_error());
    exit();
  }
  $json_array = array();
  if ($result = $mysqli->query('SELECT * FROM categories')) {
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row;
        }
      $result -> free();
  }
  $mysqli -> close();

  $jar = json_encode($json_array);

  return $jar;

}

//Старая модель
/*  echo("Модель запущена");
  $link = mysqli_connect('localhost','root','','tablesitedb');

  if(mysqli_connect_errno()) {
      echo ('Error occured('.mysqli_connect_errno().'): '.mysqli_connect_error());
      exit();
  }
  else{
      printf("Succes!\n");
      if($result = $link -> query("SELECT val FROM categories")) {
          printf(" vernul %d strok ", $result -> num_rows);
      }
  }
  $sql = mysqli_query($link, 'INSERT INTO categories (name, surname, place) VALUES ("Mihail_Petrovich","Zubenko","Shumilovka_Gorodok")');
  $sql = mysqli_query($link, 'SELECT val, name, surname, place FROM categories');
  while ($result = mysqli_fetch_array($sql)) {
    echo ("<br>{$result['val']}: {$result['name']}, {$result['surname']},{$result['place']}<br>");
  }
  $sql = mysqli_query($link, 'SELECT * FROM categories');
  $result = mysqli_fetch_array($sql);
  $data = json_encode($result);
  echo ($data);
*/
?>
