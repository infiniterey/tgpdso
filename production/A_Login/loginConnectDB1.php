<?php


  mysql_connect("localhost", "root", "");
  mysql_select_db("websiteworkdb");

  if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM login WHERE username='".$username."'AND password='".$password."' limit 1";

    $result=mysql_query($sql);

    if(mysql_num_rows($result==1))
    {
      echo "You successfully logged in";
      exit();
    }
    else
    {
        echo "You have entered incorrect password";
        exit();
    }

  }

 ?>
