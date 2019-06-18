<html>
<head>
    </head>
    <body>
      <script>
        function deleter() {
          location.href='delete.php?name='+ document.getElementById("term").value
        }

        function modifier() {
          document.getElementById("msg").innerHTML ="Actualizado satisfactoriamente"
        }
      </script>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="card bg-info">
        <div class="card-body">
  <form action="" method="post">
  Search: <input type="text" id="term" name="term" />
  <button type="submit" class="btn btn-primary">Search</button>
  </form>
<?php

include("config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $term = mysqli_real_escape_string($db , $_POST['term']);
    $sql = "SELECT * FROM datos WHERE name LIKE '%".$term."%'";
    $r_query = mysqli_query($db, $sql) or die(mysql_error());
    printf("Numero de coincidencias ".mysqli_num_rows($r_query));
    printf("<table class=table>");
    while($row = mysqli_fetch_assoc($r_query)) {
     printf("<tr>");
     foreach($row as $cname => $cvalue) {
       printf("<td><input type=text value=".$cvalue."></input></td>");
     }

     printf("</tr>");
   }
   mysqli_free_result($r_query);
}
?>
</table>
<p id="msg"></p>
<button type="submit" id="modify" class="btn btn-primary" onclick="modifier()">Modify</button>
<button type="submit" id="delete" class="btn btn-primary" onclick="deleter()">Delete</button>


</html>