<?php

class Api
{
   public $leagueName;
   public $country;
   public $leagueLogo;
   public $league_match;
   public $opts;
 



    function __construct()
    {
        $get_json = file_get_contents('api.json');
        $view_json = json_decode($get_json, true);

        //  echo "<pre>";
        //  print_r($view_json);
         $this->league_match = $view_json['response'][0]['league'];
         $league_stand = $this->league_match['standings'][0];

         $this->league($this->league_match);
         
        
        
    }

    function league($lname){
        
        //    echo "<pre>";
        //  print_r($lname);

         $this->leagueName = $lname['name'];
         $this->country = $lname['country'];
         $this->leagueLogo = $lname['logo'];
    }

    function standing($opt){
        $league_all = $this->league_match;
        $league_opt = $league_all['standings'][0];
        $this->opts = $opt;
        
        //         echo "<pre>";
        //  print_r($league_opt);
        return $league_opt;
    }
}


$obj = new Api();
$option =  'all';

if(isset($_GET['opt'])){
    $option = $_GET['opt'];
    // echo $option;
}

if($option == 'all'){
    $all = 'btn-primary';
}else{
    $all = 'btn-light';
}
if($option == 'home'){
    $home = 'btn-primary';
}else{
    $home = 'btn-light';
}
if($option == 'away'){
    $away = 'btn-primary';
}else{
    $away = 'btn-light';
}
$new = $obj->standing($option);
$opts = $obj->opts;
// echo $opts;

// echo "<pre>";
// print_r($new);
// echo "</pre>";
// foreach($new as $row){
//     echo "<pre>";
// print_r($row);
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

   <div class="container-fluid">
       <div class="align-baseline py-3 bg-light text-center shadow">
           <div class="align-baseline"><img src="<?= $obj->leagueLogo ?>" alt="" width="50"> <span class="h2 text-dark ms-2"><?= $obj->leagueName ?></span><span class="glyphicon glyphicon-refresh"></span></div>
       </div>

        <div class="container">
            <div class="py-3 ">
                <a class="btn <?= $all ?> btn-sm"  data-opt='overall' href="oopsapi.php?opt=all">Overall</a>
                <a class="btn <?= $home ?> btn-sm" data-opt='home' href="oopsapi.php?opt=home">Home</a>
                <a class="btn <?= $away ?>  btn-sm" data-opt='away' href="oopsapi.php?opt=away">Away</a>
            </div>
        <section  class="tab-content mt-1">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="lh-lg">
                        <th style="width:5%  " scope="col">#</th>
                        <th style="width:20% " scope="col">TEAM</th>
                        <th style="width:5% " scope="col">MP</th>
                        <th style="width:5% " scope="col">W</th>
                        <th style="width:5% " scope="col">D</th>
                        <th style="width:5% " scope="col">L</th>
                        <th style="width:5%  " scope="col">G</th>
                        <th style="width:5%  " scope="col">PTS</th>
                        <th style="width:15% " scope="col">FORM</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($new as $row) {
                        // echo '<pre>';
                        // print_r($row);


                    ?>
                        <tr>
                            <th scope="row"><?= $row['rank']  ?></th>
                            <td><img src="<?= $row['team']['logo'] ?>" width="35" alt="" class="me-2"> <?= $row['team']['name']  ?></td>
                            <td><?= $row[$opts]['played'] ?></td>
                            <td><?= $row[$opts]['win'] ?></td>
                            <td><?= $row[$opts]['draw'] ?></td>
                            <td><?= $row[$opts]['lose'] ?></td>
                            <td><?= $row[$opts]['goals']['for'] ?> </td>
                            <td><?= $row['points'] ?></td>
                            <td><?php
                                $list = $row['form'];
                                $split = str_split($list);
                                foreach ($split as $last) {
                                    if ($last == 'W') {
                                        echo '<button class="btn btn-success me-1 btn-sm ">' . $last . '</button>';
                                    } elseif ($last == 'L') {
                                        echo '<button class="btn btn-danger me-1 btn-sm px-2">' . $last . '</button>';
                                    } else {
                                        echo '<button class="btn btn-warning me-1 btn-sm">' . $last . '</button>';
                                    }
                                };
                                ?></td>
                        </tr>


                    <?php  } ?>
                </tbody>
            </table>

        </section>

        </div>






</body>
</html>

  

