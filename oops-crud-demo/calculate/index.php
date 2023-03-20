<?php
$ans = '';
if(isset($_POST['submit'])){
    
    $num1 = $_POST['first'];
    $num2 = $_POST['second'];
    $cal = $_POST['select'];

    $obj = new Calc($num1,$num2,$cal);
   $ans =  $obj->CalcMethod();
}
class Calc
{
    public $num1;
    public $num2;
    public $cal;

    public function __construct($num1, $num2, $cal)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->cal = $cal;
    }

    public function CalcMethod()
    {
        switch ($this->cal) {
            case 'add':
                $result = $this->num1 + $this->num2;
                break;
            case 'sub':
                $result = $this->num1 - $this->num2;
                break;
            case 'mul':
                $result = $this->num1 * $this->num2;
                break;

            default:
                $result = "Error";
                break;
        }
        return $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOPS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container vh-100">
        <div>
            <div class="bg-light text-center py-2 border border-dark rounded shadow">
                <h2>Simple Calculate</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <img src="calculator-bro.png" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center  align-items-center border bg-light shadow">
                <div class="border p-5 rounded shadow">
                    <form action="" method="post" class="p-5 shadow rounded-circle border border-light">
                        <h5 class="px-5">Enter a numbers below</h5>
                        <div class="mt-3"><input type="text" class="form-control" name="first" placeholder="Number 1"></div>
                        <div class="mt-3"><input type="text" class="form-control" name="second" placeholder="Number 2"></div><select class="form-select w-50 mt-3" aria-label="Default select example" name="select">
                            <option value="add">Add</option>
                            <option value="sub">Sub</option>
                            <option value="mul">Multiple</option>
                        </select>
                       
                        <div class="mt-3">
                            <h5>Answer is : <span class="text-danger fs-2"><?= $ans ?></span></h5>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-outline-success w-50 mt-4 fs-5 btn-sm">Calculate</button></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>