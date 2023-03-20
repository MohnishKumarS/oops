<?php

class NewsFeed
{
    function __construct()
    {
        $url = 'https://www.espn.com/espn/rss/nfl/news';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        // curl_setopt($ch,CURLOPT_HEADER,0);
        // curl_setopt($ch,CURLOPT_HTTPGET,0);

        $result = curl_exec($ch);
        curl_close($ch);

        //  var_dump($result);
        // ---------xml --------------------
        $xml = new SimpleXMLElement($result, LIBXML_NOCDATA);

        $ab = $xml->channel->item;
        // echo "<pre>";
        // print_r($ab);
        // $data = [];
        $i = 0;

        foreach ($ab as  $value) {
            // echo "<pre>";
            // print_r($value);
            $title = (string) $value->title;
            // echo $title;
            $description = (string) $value->description;
            $link = (string) $value->link;
            $pubDate = (string) $value->pubDate;
            $img = (string) $value->enclosure->attributes()['url'];


            $data[] = array(
                'title' => $title,
                'description' => $description,
                'link' => $link,
                'pubDate' => $pubDate,
                'imgurl' => $img,
            );

            // $data[$i]['title'] = $title;
            // $data[$i]['description'] = $description;
            // $data[$i]['link'] = $link;
            // $data[$i]['pubDate'] = $pubDate;
            // $data[$i]['imgurl'] = $img;

            // echo "<pre>";
            // print_r($data);
            $i++;
        }
        $en = json_encode($data, JSON_PRETTY_PRINT);
        // echo "<pre>";
        // print_r($en);
        // echo "</pre>";
        file_put_contents('feed.json', $en);
    }

    function fetchData()
    {

        $fetch = file_get_contents('feed.json');
        $data = json_decode($fetch, JSON_OBJECT_AS_ARRAY);
        return $data;
    }
}

$obj = new NewsFeed();

// -------------curl-----------------------
$search = 'pc video games';
$url = "https://www.amazon.in/s/k=$search";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curl);
// echo $result;
preg_match_all("!https://m.media-amazon.com/images/I/[^\s]*?81IXtVuvlmL._AC_UY218_.jpg!", $result, $matches);
// print_r($matches);
curl_close($curl);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">
        <div class="py-2 text-center bg-dark text-white rounded shadow">
            <h2><em>Daily News Feeds</em></h2>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            <?php
            $item = $obj->fetchData();
            // echo "<pre>";
            // print_r($item);
            foreach ($item as $key) {
                // $img = $key['enclosure']['@attributes']['url'];
                // echo '<pre>';
                // print_r($key);  
            ?>



                <div class="col">
                    <div class="card h-100 shadow rounded">
                        <img src="<?= $key['imgurl'] ?>" class="card-img-top" height="250" alt="Logo">
                        <div class="card-body">
                            <h5 class="card-title"><?= $key['title'] ?></h5>
                            <p class="card-text"><?= $key['description'] ?></p>


                        </div>
                        <div class="card-body">

                            <div class="text-center">
                                <a href="<?= $key['link'] ?>" class="btn btn-outline-success btn-sm fw-bold">See More</a>
                            </div>
                            <hr>
                            <p class="card-text text-secondary mt-3"><?= $key['pubDate'] ?></p>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

        </div>
    </div>

</body>

</html>