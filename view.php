<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
</head>
<body>
<?php
include "./Navbar.php";
include "./db.php";
$id = $_GET['id'];
$sql = "select * FROM `udata` WHERE id='$id'";
$result = mysqli_query($con,$sql);

if (!$result) {
    die(mysqli_error($con)); 
}

$row = mysqli_fetch_assoc($result);

$title = $row['title']; 
$description = $row['description'];
$url = $row['url'];
?>

<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto mt-5">
      <h1 class="display-4 text-center mb-5"><?php echo $title?></h1>
      <img src="<?php echo $url?>" class="img-fluid my-3 rounded" alt="Scenery Photo">
      <p class="lead"><?php echo $description?></p>
      <button  class="btn text-white mb-3"  style="background-color: #143c58;"><a href="index.php" class="text-white  text-decoration-none  ">Back</a></button>
    </div>
   
  </div>

</div>


<?php include "./footer.php"; ?>


</body>
</html>

