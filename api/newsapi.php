<?php

// ----------------country key ------------------------------
$APIkey = '82adf4704d26831daf8813feb77cf419b2ebd27a919f531d55481dc52f0dc79c';

$curl_options = array(
  CURLOPT_URL => "https://apiv2.allsportsapi.com/football/?met=Countries&APIkey=$APIkey",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CONNECTTIMEOUT => 5
);

$curl = curl_init();
curl_setopt_array($curl, $curl_options);
$result = curl_exec($curl);

$result_country = json_decode($result, true);
// echo "<pre>";
// print_r($result);






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


<script>

</script>

<body>
  <div class="container">
    <div class="bg-light shadow py-3 text-center text-primary ">
      <h3>News Api</h3>
    </div>




    <div class="mt-3">
      <div class="row">
        <div class="col">

          <label for="" class="form-label">Select a country:</label>
          <select class="form-select" aria-label="Default select example" name='country' id='country'>

            <option selected>Choose a country menu</option>
            <?php
            foreach ($result_country['result'] as $row) {
              // echo "<pre>";
              // print_r($row);
              if ($selected == $row['country_key']) {
                echo ' <option value="' . $row['country_key'] . '" selected>' . $row['country_name'] . '</option>';
              } else {
                echo ' <option value="' . $row['country_key'] . '">' . $row['country_name'] . '</option>';
              }
            }
            ?>



          </select>


        </div>
        <div class="col">
          <label for="" class="form-label">Select a League name:</label>
          <select class="form-select" aria-label="Default select example" id="league_name">
            <option selected>Choose a country name first</option>

          </select>


        </div>
      </div>
    </div>







    <table class="table table-hover mt-3" id='table'>
      <thead>
        <tr class="lh-lg text-primary">
          <th style="width:5%  " scope="col">#</th>
          <th style="width:10% " scope="col">TEAM</th>
          <th style="width:5% " scope="col">MP</th>
          <th style="width:5% " scope="col">W</th>
          <th style="width:5% " scope="col">D</th>
          <th style="width:5% " scope="col">L</th>
          <th style="width:5%  " scope="col">G</th>
          <th style="width:5%  " scope="col">PTS</th>

        </tr>
      </thead>
      <tbody id='table-data'>

      </tbody>
    </table>
    <div id="empty-table">

    </div>






  </div>




  <script>
    $(function() {
      $('#country').on('change', function() {
        //  console.log($(this).val());
        var countryId = $(this).val();

        $.ajax({
          url: "fetch.php",
          type: 'post',
          data: {
            countryId: countryId
          },
          dataType: "text",
          success: function(data) {
            // console.log(data);
            $('#league_name').html(data)
          }

        })
      })
      // ------------league name -----------------
      $('#league_name').on('change', function() {
        //  console.log($(this).val());
        var league_id = $(this).val();

        $.ajax({
          url: "fetch.php",
          type: 'post',
          data: {
            league_id: league_id
          },
          dataType: "json",


          success: function(data) {
            // console.log(data[0].standing_place);
            $('#table-data').empty();
            var arr = data;
            if (arr == '') {
              // console.log('empty');
              $('#empty-table').html('<div class="alert alert-danger fw-bold mt-5 fs-5 text-center" role="alert"> No Records found</div>');

            } else {
              $('#empty-table').html('');
              arr.forEach(function(item) {
                //  console.log(item);
                var html = '<tr>';
                html += '<td>' + item.standing_place + '</td>';
                html += '<td>' + item.standing_team + '</td>';
                html += '<td>' + item.standing_P + '</td>';
                html += '<td>' + item.standing_W + '</td>';
                html += '<td>' + item.standing_D + '</td>';
                html += '<td>' + item.standing_L + '</td>';
                html += '<td>' + item.standing_GD + '</td>';
                html += '<td>' + item.standing_PTS + '</td> </tr>';

                $('#table-data').append(html);

              })
            }

          }

        })
      })
    })
  </script>

</body>

</html>