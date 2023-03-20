<?php
$APIkey = '82adf4704d26831daf8813feb77cf419b2ebd27a919f531d55481dc52f0dc79c';
$output = '';
if(isset($_POST['countryId'])){
    // echo $_POST['countryId'];
      // ===========================league id =======================
            // $APIkey1='82adf4704d26831daf8813feb77cf419b2ebd27a919f531d55481dc52f0dc79c';
         
              $countryId = $_POST['countryId'];

              $curl_options = array(
                CURLOPT_URL => "https://apiv2.allsportsapi.com/football/?met=Leagues&APIkey=$APIkey&countryId=$countryId",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CONNECTTIMEOUT => 5
              );

              $curl = curl_init();
              curl_setopt_array($curl, $curl_options);
              $result = curl_exec($curl);

              $result = json_decode($result, true);
              // echo "<pre>";
              // print_r($result);
              $output = '<option selected>Choose a League name</option>';
              foreach ($result['result'] as $row) {
                $output .='<option value="' . $row['league_key'] . '">' . $row['league_name'] . '</option>';
              }

              echo $output;
 }

//  =========================league id to  standing=======================

if(isset($_POST['league_id'])){
  $league_Id = $_POST['league_id'];
  // echo $league_Id;
  // =======================standing fixture========================
// $leagueId = '<p id="get_league">207</p>';
// // echo $leagueId;
// //  var_dump($leagueId);
//  $domdoc = new DOMDocument();
// $domdoc->loadHTML($leagueId);
   
// $pTagValue = $domdoc->getElementById('get_league')->nodeValue;
  
// echo $pTagValue;
// var_dump($pTagValue);
// $table = '';

$curl_options = array(
  CURLOPT_URL => "https://apiv2.allsportsapi.com/football/?met=Standings&APIkey=$APIkey&leagueId=$league_Id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HEADER => false,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_CONNECTTIMEOUT => 5
);

$curl = curl_init();
curl_setopt_array($curl, $curl_options);
$results = curl_exec($curl);

$results_standing =  json_decode($results, true);
//  echo "<pre>";
//     print_r($results_standing);

$res_final = $results_standing['result']['total'];
//  var_dump($result);
// echo "<pre>";
// print_r($results_standing); 
$arr = array();
foreach($res_final as $row){
   
    $arr[] = $row;
    // echo "<pre>";
    // print_r($arr);

}

echo json_encode($arr);

 

    

}


