<?php
  class Database{
      public $host = "localhost";
      public $user = 'root';
      public $pass = '';
      public $db = 'crud';
       
        function connect(){
            $sql = new mysqli($this->host,$this->user,$this->pass,$this->db);
            if(!$sql){
                return "connected successfully";
            }
            return $sql;
        }
        
        function fetch($conn){
            // $conn = $this->connect();

            $query = $conn->query("SELECT * FROM employee_details");
            
            return $query;
        }
  }
 
   $obj = new Database();
   $link =   $obj->connect();

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
<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">emp_ID</th>
      <th scope="col">emp_name</th>
      <th scope="col">gender</th>
      <th scope="col">mobile</th>
      
    </tr>
  </thead>
   <?php
//    echo $obj->user;
    $resu = $obj->fetch($link);
     if($resu->num_rows > 0){
         while($row = $resu->fetch_assoc()){
            //  echo "<pre>";
            //  print_r($row);
             ?>
    
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?= $row['emp_id'] ?></td>
      <td><?= $row['username'] ?></td>
      <td><?= $row['gender'] ?></td>
      <td><?= $row['mobile'] ?></td>
    </tr>
    <?php    }
  
   ?>
  </tbody>
</table>
<?php
   }
   ?>
</div>
</body>
</html>