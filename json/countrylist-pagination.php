<?php 
    require '../assets/php/config.php';
   
    $db = new DB();
    $conn =  $db->connection();
    // ===========pagination ======================

       $perpage = 10;
      $totalc = $conn->query("SELECT COUNT(*) FROM states
      INNER JOIN cities ON states.id = cities.state_id 
      WHERE states.`name` = 'Tamil Nadu'");

     $counts = $totalc->fetch_column();
      $totalpage = ceil($counts/10);
      // echo $totalpage;

      $pagenow = isset($_GET['page']) ? $_GET['page'] : 1;

      // echo $pagenow;


    $x = ($pagenow - 1) * $perpage;
    $y = $perpage;


    $sql = "SELECT states.`name`,cities.city FROM states
    INNER JOIN cities ON states.id = cities.state_id 
    WHERE states.`name` = 'Tamil Nadu'
    LIMIT $x,$y";
    $res = $conn->query($sql);
    // $res->execute();
    // $get = $res->fetch_array();
    // print_r($get);

    // $create_json = [];
    // while($row = $res->fetch_assoc()){
    // //    echo "<pre>";
    // // print_r($row);
    // // echo "</pre>";

    //    $create_json[] = $row;
    // }
    
    // $json_encode = json_encode($create_json,JSON_PRETTY_PRINT);
    // file_put_contents('countrylist.json',$json_encode);


    // ============fetch into json file 
    // ====================================

    $get_json = file_get_contents('countrylist.json');
    $json_decode = json_decode($get_json,true);  

    // echo "<pre>"; 
    // print_r($json_decode);
    // echo "</pre>"; 
     ?>

  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.5.2/css/autoFill.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

</head>
<body>
    
<div class="container">
    <div class="text-center py-3 shadow bg-ligh">
        <h4>Country List</h4>
    </div>

    <table class="table table-striped  table-hover" id='table-id'>
  <thead>
    <tr style="line-height: 50px;">
      <th scope="col">ID</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
  
    </tr>
  </thead>
  <tbody>
  <?php 
  $s = 1; foreach($res as $row){  
    //    echo "<pre>";
    // print_r($row);
    // echo "</pre>";
    ?>
    <tr>
      <th scope="row" ><?=  $s++ ?></th>
      <td>India</td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['city'] ?></td>
    
    </tr>
    <?php   }  ?>

  </tbody>
</table>


<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php 

    if($pagenow > 1){
      echo ' <li class="page-item"><a class="page-link " href="countrylist-pagination.php?page='.$pagenow - 1 .'">Previous</a></li>';
      
    }else{
      echo ' <li class="page-item disabled"><a class="page-link " href="countrylist-pagination.php?page='.$pagenow - 1 .'">Previous</a></li>';
    }
    
 

?>
   
    
    <?php 
     for($i = 1 ; $i<= $totalpage ; $i++){
       $active = $pagenow == $i ? 'active' : " ";
      echo '<li class="page-item '.$active.' "><a class="page-link  " href="countrylist-pagination.php?page='.$i.'">'.$i.'</a></li>';
     }
    //  echo $i;
     if($i-1 > $pagenow && $totalpage > $pagenow){
      echo '<li class="page-item"><a class="page-link " href="countrylist-pagination.php?page='.$pagenow + 1 .'">Next</a></li>';
    }
  ?>
 
  </ul>
</nav>



</div>



<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.2/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<script>
   $(document).ready(function(){
       $('#table-id').DataTable();
   })
</script>
</body>
</html>