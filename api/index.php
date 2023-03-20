<?php

$get_json = file_get_contents('api.json');

$view_json = json_decode($get_json, true);
// echo '<pre>';
//  print_r($view_json);

$league_name = $view_json['response'][0]['league'];
$league_stand = $league_name['standings'][0];
//  echo '<pre>';
//  print_r($league_name);
//  foreach($league_stand as $row ){
// echo '<pre>';
// print_r($row);
//  }




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<style>
    .nav-tab-wrapper {
        background-color: rgb(211, 211, 211, .5);
        padding: 10px;
    }

    .nav-tab {
        font-style: italic;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: 14px;

    }

    .nav-tab-active {
        color: white;
        background-color: rgb(0, 0, 255, .9);
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 17px;
        font-weight: 700;

    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }
</style>

<body>

    <div class="container">
        <div class="title-card  bg-light p-1 shadow">
            <h6 class="pt-3 ps-3">FOOTBALL <i class="fa-sharp fa-solid fa-arrow-right"></i> <span> <img src="<?= $league_name['flag'] ?>" alt="" width="40"> <?= $league_name['country'] ?> </span></h6>
            <div class="league mt-4">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end">
                        <div>
                            <img src="<?= $league_name['logo'] ?>" alt="" width="70">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 d-flex justify-content-start">
                        <div class="">
                            <h3><?= $league_name['name'] ?><span><i class="fa-sharp fa-solid fa-star fs-6 ms-2 text-warning"></i></span></h3>
                            <p><?= $league_name['season'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="league-table mt-3">

        </div>


        <h2 class="nav-tab-wrapper">
            <a href="#tab-1" class="nav-tab nav-tab-active btn btn-light">OVERALL</a>
            <a href="#tab-2" class="nav-tab btn btn-light">HOME</a>
            <a href="#tab-3" class="nav-tab btn btn-light">AWAY</a>
        </h2>
        <hr />
        <section id="tab-1" class="tab-content mt-5  active">
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
                    foreach ($league_stand as $row) {
                        // echo '<pre>';
                        // print_r($row);


                    ?>
                        <tr>
                            <th scope="row"><?= $row['rank']  ?></th>
                            <td><img src="<?= $row['team']['logo'] ?>" width="35" alt="" class="me-2"> <?= $row['team']['name']  ?></td>
                            <td><?= $row['all']['played'] ?></td>
                            <td><?= $row['all']['win'] ?></td>
                            <td><?= $row['all']['draw'] ?></td>
                            <td><?= $row['all']['lose'] ?></td>
                            <td><?= $row['all']['goals']['for'] ?> </td>
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
        <section id="tab-2" class="tab-content mt-5 ">
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
                    foreach ($league_stand as $row) {
                        // echo '<pre>';
                        // print_r($row);


                    ?>
                        <tr>
                            <th scope="row"><?= $row['rank']  ?></th>
                            <td><img src="<?= $row['team']['logo'] ?>" width="35" alt="" class="me-2"> <?= $row['team']['name']  ?></td>
                            <td><?= $row['home']['played'] ?></td>
                            <td><?= $row['home']['win'] ?></td>
                            <td><?= $row['home']['draw'] ?></td>
                            <td><?= $row['home']['lose'] ?></td>
                            <td><?= $row['home']['goals']['for'] ?> </td>
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
        <section id="tab-3" class="tab-content mt-5 ">
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
                    foreach ($league_stand as $row) {
                        // echo '<pre>';
                        // print_r($row);


                    ?>
                        <tr>
                            <th scope="row"><?= $row['rank']  ?></th>
                            <td><img src="<?= $row['team']['logo'] ?>" width="35" alt="" class="me-2"> <?= $row['team']['name']  ?></td>
                            <td><?= $row['away']['played'] ?></td>
                            <td><?= $row['away']['win'] ?></td>
                            <td><?= $row['away']['draw'] ?></td>
                            <td><?= $row['away']['lose'] ?></td>
                            <td><?= $row['away']['goals']['for'] ?> </td>
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




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('.nav-tab').click(function(e) {
            //Toggle tab link
            $(this).addClass('nav-tab-active').siblings().removeClass('nav-tab-active');

            //Toggle target tab
            // console.log($(this).attr('href'));
            $($(this).attr('href')).addClass('active').siblings().removeClass('active');
        });
    </script>
</body>

</html>