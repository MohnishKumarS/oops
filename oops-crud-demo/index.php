<?php
require '../assets/php/config.php';

class create extends DB{
  public $a;
    function insert(){
       extract($_REQUEST);
      // echo $gender;
      // echo $conn;
      $sql = "INSERT into employee_details values (null,$emp_id,'$username','$gender','$mobile')";
      $res = $conn->query($sql);
      //  echo $res->error();
      if($res){
       return 'Employee has been added successfully';
        // echo $a;
      }else{
        return 'something went wrong';
      }

    }
}

$act = new create();
// $act->connection();
 if(isset($_POST['emp_submit'])){
  // echo "clicked";
 $link = $act->connection();
 $_REQUEST['conn'] = $link;
  $msg = $act->insert();
  // echo $msg;
  
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand fs-4 fw-bold text-danger" href="#">CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0 fw-bold">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">Employee List</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
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
      <div class="text-center bg-light py-2 border border-dark shadow">
        <h2>Create Employee List</h2>
      </div>
        <div>
<?php
if(isset($msg)){
  echo '<div class="alert alert-warning alert-dismissible fade show text-center fs-5" role="alert">
  <strong>Hello User!</strong> '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <img src="../assets/image/a1.png" class='img-fluid' alt="">
                    </div>
                </div>
                <div class="col-lg-6 ">
                  <div class="bg-light px-5 py-4 border mt-3 rounded-3 shadow" >
                    <form action="" method="post" autocomplete="off">
                    <div class="mt-3">
                      <label for="Employee ID" class="form-label">Employee ID :</label>
                      <input type="text" name="emp_id" class="form-control" required>
                    </div>
                    <div class="mt-3">
                      <label for="Employee ID" class="form-label">Name :</label>
                      <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mt-3">
                      <label for="Employee ID" class="form-label">Gender :</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value='male' id="flexRadioDefault1"  required>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value='female' id="flexRadioDefault1" required>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Female
                        </label>
                      </div>
                    </div>
                    <div class="mt-3">
                      <label for="Employee ID" class="form-label">Mobile :</label>
                      <input type="text" name="mobile" class="form-control" required>
                    </div>
                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-outline-success btn-sm w-50" name="emp_submit">Submit</button>
                    </div>
                    
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</main>



    
</body>
</html>