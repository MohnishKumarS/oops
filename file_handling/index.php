<?php

if (isset($_POST['submit-mode'])) {
    //   echo 'yes';
    $mode = $_POST['mode'];
    // echo $mode;

    if (is_dir("filetext")) {
        echo '<h2 class="text-primary">YES!! folder exist</h2>';
        $root_file = $_SERVER['DOCUMENT_ROOT'] . "/oops/file_handling/filetext/sample.txt";
        $copy_file = $_SERVER['DOCUMENT_ROOT'] . "/oops/file_handling/filetext/sample.txt";
        // echo $root_file;
        // print_r(pathinfo("oops/php/filetext/sample.txt"));
        //  mkdir("filetext/newf");
        // readfile("filetext/sample.txt");
        //  echo  basename('/oops/file_handling/filetext/sample.txt');
        switch ($mode) {
            case 'w':
                $content = "<h4>Im a developer IN web development</h4> ,I'm energetic person!!! ";
                $file = fopen($root_file, "w") or die("unable to open file");
                fwrite($file, $content);
                // echo $file;
                fclose($file);
                echo '<h5 class="text-success">File content is written</h5>';
                break;
            case 'r':
                if (is_readable($root_file)) {

                    echo '<h5 class="text-success">File content is Readable mode</h5>';
                    $file = fopen($root_file, "r");
                    echo $content = fread($file, filesize($root_file));
                    // echo filesize($root_file);   
                    fclose($file);
                } else {
                    echo '<h5 class="text-danger">File content is non readable</h5>';
                }
                break;
            case 'a':
                if (is_writable($root_file)) {
                    echo '<h5 class="text-success">File content is writable mode</h5>';
                    $content = "<br>\n\t <b> I am a full stack developer for past 3 months</b>";
                    $file = fopen($root_file, 'a');
                    fwrite($file, $content);
                    fclose($file);
                    echo '<h5 class="text-success">File is appended successfully 😎</h5>';
                }
                break;
            case 'x':
                if (is_file($root_file)) {
                    echo '<h5 class="text-danger">File already exists delete it or it will not create a new file</h5>';
                } else {
                    $content = "\t\n hello I created a new file for you <br> please write something";
                    $file = fopen($root_file,'x');
                    fwrite($file, $content);
                    fclose($file);
                    echo '<h5 class="text-success">New file is created 😊</h5>';
                }
                break;
            case 'dfil':
                if (is_file($root_file)) {
                    unlink($root_file);
                    echo '<h5 class="text-success">file is deleted</h5>';
                } else {
                    echo '<h5 class="text-danger">file is not exist 😊</h5>';
                }
                break;

            case 'rfol':
                if (is_file($root_file)) {
                    echo '<h5 class="text-danger">Delete all files from this folder ✔ </h5>';
                } else {
                    rmdir('filetext');
                    echo '<h5 class="text-success">Folder is deleted 👍</h5>';
                }
            default:
                # code...
                break;
        }
    } else {
        echo '<h2 class="text-danger">NO folder </h2>';
    }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>


    <div class="container">
        <div class="text-center py-2 bg-light shadow rounded mt-4">
            <h2>File Handling</h2>
        </div>
        <div>
            <form action="" method="post">
                <div class="row mt-5 d-flex justify-content-center ">
                    <div class="col-6 border p-5 shadow border-3 rounded">
                        <div>
                            <h3>File select option</h3>
                        </div>

                        <select class="form-select mt-3" name="mode" required>
                            <option selected>Select a file Mode</option>
                            <option value="r">Read</option>
                            <option value="w">Write</option>
                            <option value="a">Append</option>
                            <option value="x">New File</option>
                            <option value="dfil">Delete File</option>
                            <option value="rfol">Remove folder</option>
                        </select>

                        <div class="mt-4 text-center ">
                            <button type="submit" name="submit-mode" class="btn btn-outline-success btn-sm w-50 fs-5">Submit</button>
                        </div>
            </form>
        </div>

        <!-- ----------------regular expression ------------- -->

        <div>
            <?php

            if (isset($_POST['submit-reg'])) {
                // echo "yes";
                $username = $_REQUEST['username'];
                $mobile = $_REQUEST['mobile'];
                
                $namepattern = " /^[a-zA-Z]+$/ ";
                $numpattern = " /^[6-9]{1}[0-9]{9}+$/ ";
                // if(empty($username)){
                //     echo '<h5 class="text-danger">This field is required👍</h5>';
                // }else{
                //      if(!preg_match($namepattern,$username)){
                //          echo '<h5 class="text-danger">Invalid username</h5>';
                //      }else{
                //         echo '<h5 class="text-success">valid username</h5>';
                //      }
                // }
                if(empty($mobile)){
                    echo '<h5 class="text-danger">This field is required👍</h5>';
                }else{
                     if(!preg_match($numpattern,$username)){
                         echo '<h5 class="text-danger">Invalid mobile number</h5>';
                     }else{
                        echo '<h5 class="text-success">valid number</h5>';
                     }
                }
                

            }

            // echo getcwd();
            // echo chdir("filetext");
            // echo $a = getcwd();
            // echo $b=  opendir($a);
            // echo readdir($b);
            // rmdir("add");
        //   $o =  opendir("localhost/oops/file_handling/");
        //     echo readdir($o);
        //     closedir($o);
            // print_r($b);
            // echo $b;
         
            ?>
            <form action="" method="post">
                <div>
                    <input type="text" placeholder="username" name="username" class="form-control mt-3 w-25">
                    <input type="text" placeholder="mobile" name="mobile" class="form-control mt-3 w-25">
                    <button type="submit" name="submit-reg" class="btn btn-warning btn-sm w-25 mt-3">Submit</button>
                </div>
            </form>
        </div>


    </div>

</body>

</html>