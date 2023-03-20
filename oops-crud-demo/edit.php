<?php
require 'oops.php';
extract($_REQUEST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">OOPS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list.php">Employee List</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <?php
    // echo $id;
      $rows = $last->getuserID($link,$id);

      if(!empty($rows)){
        // print_r($rows);
      }
    ?>

    <main>
        <div class="container vh-75">
            <div class="text-center py-2 bg-warning"><h2>Edit Employee List</h2></div>
            <div class="row h-100 d-flex justify-content-center">
                <div class="col-lg-7 ">
                    <div class="">
                        <div class="bg-light px-5 py-4 border mt-3" >
                          <form action="oops.php" method="post" autocomplete="off">
                          <div class="mt-3">
                            <input type="hidden" name="user_id" value="<?= $rows['id'] ?>">
                            <label for="Employee ID" class="form-label">Employee ID :</label>
                            <input type="text" name="emp_id" class="form-control" value="<?= $rows['emp_id'] ?>">
                          </div>
                          <div class="mt-3">
                            <label for="Employee ID" class="form-label">Name :</label>
                            <input type="text" name="username" class="form-control" value="<?= $rows['username'] ?>">
                          </div>
                          <div class="mt-3">
                            <label for="Employee ID" class="form-label">Gender :</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" value='male'  id="flexRadioDefault1"
                              <?php if($rows['gender'] == 'male'){ echo 'checked'; } ?> >
                              <label class="form-check-label" for="flexRadioDefault1">
                                Male
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="gender" value='female' id="flexRadioDefault1"
                              <?php if($rows['gender'] == 'female'){ echo 'checked'; } ?>>
                              <label class="form-check-label" for="flexRadioDefault1">
                                Female
                              </label>
                            </div>
                          </div>
                          <div class="mt-3">
                            <label for="Employee ID" class="form-label">Mobile :</label>
                            <input type="text" name="mobile" class="form-control" value="<?= $rows['mobile'] ?>">
                          </div>
                          <div class="text-center mt-4">
                            <button type="submit" class="btn btn-outline-success btn-sm w-50" name="emp_update">Update</button>
                          </div>
                          
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>