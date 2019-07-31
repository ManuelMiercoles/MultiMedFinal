<?php
   $servername ="localhost";
   $username="root";
   $password = "";
   $db = mysqli_connect($servername, $username, $password);

   // Check connection
   if (!$db) {
       die("Connection failed: " . mysqli_connect_error());
   }
   mysqli_query($db,"DROP DATABASE [IF EXISTS] finalMultiMed;");
   mysqli_query($db,"CREATE DATABASE finalMultiMed;");
   mysqli_select_db($db,'finalMultiMed');
   ?>