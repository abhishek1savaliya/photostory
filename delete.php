<?php
include "./db.php";
   $id = $_GET['id'];
   $delete = "DELETE FROM `udata` WHERE `id`='$id'";
   $result = mysqli_query($con,$delete);
   header("location: ./index.php");
?>