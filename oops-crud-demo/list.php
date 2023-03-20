<?php
require 'assets/php/config.php';

class show extends DB{
    function selectall($conn){
        $sql = "SELECT * FROM employee_details";
        $res = $conn->query($sql);
        $arr = [];
        if($res->num_rows > 0){
            $arr= $res->fetch_all(MYSQLI_ASSOC);
            
        }
        return $arr;
    }
}

$all = new show();
$link = $all->connection();

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<body>




    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CRUD</a>
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
                            <a class="nav-link" href="#">Employee List</a>
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

    <main>
        <div class="container">
            <div class="text-center py-2 bg-warning fst-italic">
                <h3>Employee List</h3>
            </div>
            <div class="mt-5">
                <table class="table table-striped table-hover table-success">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Employee No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <?php
                    $row = $all->selectall($link);
                    
                    if(!empty($row)){
                        $count = 1;
                      foreach($row as $rows){
                        // echo '<pre>';
                        // print_r($rows);
                        // echo '</pre>';
                    
                  ?>
                    <tr>
                        <th scope="row"><?= $count++ ?></th>
                        <td><?= $rows['emp_id'] ?></td>
                        <td><?= $rows['username'] ?></td>
                        <td><?= $rows['gender'] ?></td>
                        <td><?= $rows['mobile'] ?></td>
                        <td>
                            
                            <a href="edit.php?id=<?= $rows['emp_id'] ?>" class="btn btn-primary px-3 btn-sm ">Edit</a>
                            <a href="oops.php?id=<?= $rows['emp_id'] ?>&submitdelete=delete" onclick="return confirm('Are you sure to delete')" class="btn btn-danger btn-sm ">Delete</a>
                        </td>
                    </tr>

                    <?php
                          }   
                       
                    ?>
                </table>

                <?php
                 }else{
                     echo "Records Not found";
                 }
                 ?>
            </div>
        </div>
    </main>


</body>

</html>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>