<?php

$login = $_POST['user'];
$senha = MD5($_POST['pass']);
$connect = mysql_connect('server','login','password');
$db = mysql_select_db('db');
$query_select = "SELECT login FROM users WHERE user = '$user'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['user'];

  if($user == "" || $user == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('Please insert a value in the user field');window.location.href='
    form.html';</script>";

    }else{
      if($logarray == $user){

        echo"<script language='javascript' type='text/javascript'>
        alert('This user already exists');window.location.href='
        form.html';</script>";
        die();

      }else{
        $query = "INSERT INTO users (user,password) VALUES ('$user','$pass')";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('User registered!');window.location.
          href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Unable to register this user');window.location
          .href='form.html'</script>";
        }
      }
    }
?>
