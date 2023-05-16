<?php
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

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    $sql = "UPDATE `udata` SET title='$title', description='$description', url='$url' WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location:index.php');
    } else {
        die(mysqli_error($con)); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client managment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <form method="post">
    <div class="mb-3">
        <label class="form-label"><b>Enter new title</b></label>
        <input type="text" class="form-control"  name="title" autocomplete="off" value="<?php echo $title;?>">
    </div>
    <div class="mb-3">
        <label class="form-label"><b>Enter new description</b></label>
        <input type="text" class="form-control"  name="description" autocomplete="off" value="<?php echo $description;?>">
    </div>
    <div class="mb-3">
        <label class="form-label"><b>Enter URL</b></label>
        <input type="text" class="form-control"  name="url" autocomplete="off" value="<?php echo $url;?>">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>



    
</div>
</body>
</html>
