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
   

    <div class="container">
        <div class="bg-warning py-2 text-center shadow border border-dark rounded-3 text-danger fw-bold">
            <h1><em>JSON in PHP</em></h1>
        </div>
    </div>

    <?php
     $age = array("moni"=>"35", "san"=>"37", "lee"=>"43");
     $arr[] = ['captain'=>"dhoni",'god'=>"sachin",'legend'=>'virat'];

    //  $send = json_encode($age);
     $new = json_encode($arr,JSON_FORCE_OBJECT|JSON_PRETTY_PRINT);

     file_put_contents('sample.json', $new);

    //  $get = file_get_contents('sample.json');
       
    //     $name = json_decode($get,true);

    // //     // echo $name->moni;
    // //     echo $name['lee'];
    //     echo '<pre>';
    //     print_r($name);
        



    //     // print_r(json_decode($get));
    //     $decode = json_decode($get);
        
        
        // foreach ($decode as $key ) {
        //     echo $key."<br>";
        // }


    ?>
</body>

</html>