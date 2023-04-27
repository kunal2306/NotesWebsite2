<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php include "./db.php"; ?>
    <?php
    if (isset($_POST["submit"])) {
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        $sql = "INSERT INTO `notes`(`Title`, `Description`) VALUES ('$title','$desc')";
        $res = mysqli_query($con, $sql);
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>


        </div>
    </nav>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="desc"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Add Note</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1>My Notes</h1>
                <?php
                $sql = "SELECT * FROM `notes`";
                $res = mysqli_query($con, $sql);
                while ($fetch = mysqli_fetch_assoc($res)) {
                    echo '<div class="card my-3">
                    <div class="card-body">
                      <h5 class="card-title">' . $fetch["Title"] . '</h5>
                      <p class="card-text">' . $fetch["Description"] . '</p>
                      <a href="./delete.php?id=' . $fetch["S.No."] . '" class="btn btn-primary">Delete</a>
                    </div>
                  </div>';
                }

                ?>
            </div>
        </div>
    </div>


</body>

</html>