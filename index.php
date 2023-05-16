<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Photo Story App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
  <style>
    body {
      font-family: 'SF Pro Display', sans-serif;
    }

    .title {
      border: 2px solid black;
    }
  </style>

</head>

<body>

  <?php include "./Navbar.php" ?>
  <?php include "./db.php" ?>
  <?php
  if (isset($_POST["submit"])) {
    if (!isset($_POST['hidden'])) {
         $title = $_POST["title"];
         $desc = $_POST["description"];
         $url = $_POST['url'];

      $sql = "INSERT INTO udata (`title`,`description`,`url`)VALUES ('$title', '$desc','$url')";
      $res = mysqli_query($con, $sql);
    }
  }


  ?>

  <div class="container my-4">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <form method='post'>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" placeholder="Enter the title of the photo here" class="form-control" name="title" id="title" min="3" required>
          </div>

          <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="description" placeholder="Enter the photo description here" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="url" class="form-label">Url</label>
            <input type="text" placeholder="Enter the photo of url here" class="form-control" name="url" id="url" min="7" required>
          </div>
          <button type="submit" name="submit" class="btn text-white" style="background-color: #143c58;">Add a story</button>
        </form>
      </div>
    </div>
  </div>

<div class="row">
<?php
        $sql = "SELECT * FROM `udata`";
        $result = mysqli_query($con, $sql);
        $noNotes = true;
        $max_length = 150; 
        while ($fetch = mysqli_fetch_assoc($result)) {
          $shortened_string = (strlen($fetch['description']) > $max_length) ? substr($fetch['description'], 0, $max_length) . "..." : $fetch['description'];
          $noNotes = false;
          echo '
          <div class="col-md-4">
          <div class="card m-3">
          <img class="card-img-top" src="' . $fetch['url'] . '" alt="Card image cap" width="200" height="300">
          <div class="card-body">
          
            <h5 class="card-title " style="color: #143c58;font-weight: bold;">' . $fetch['title'] . '</h5> 
            <p class="card-text">' . $shortened_string . '</p>
            <button class="btn" style="background-color: #dd7973;"><a href="view.php?id='.$fetch['id'].'" class="text-light text-decoration-none">View</a></button>
            <button class="btn " style="background-color: #a881af;"><a href="edit.php?id='.$fetch['id'].'" class="text-light text-decoration-none">Update</a></button>
            <a href="./delete.php?id=' . $fetch['id'] . '"  class="btn btn-danger">Delete</a>
          </div>
          </div>
        </div>
            ';
        }
        if ($noNotes == true) {
          echo "No Notes Available";
        }
        ?>
        </div>

      </div>
    </div>
  </div>

  <?php include "./footer.php" ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>


</body>

</html>