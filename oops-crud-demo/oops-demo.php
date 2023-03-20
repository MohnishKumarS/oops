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

    <div class="text-center bg-secondary py-2 text-white fst-italic">
        <h1>Oops in PHP</h1>
    </div>

   <div class="container mt-5">
   <?php
      class fruit{
          public $name;

          function getName(){
              return $this->name = 'jack';
          }
      }

      $jack = new fruit();
      echo "fruit name is " .$jack->getName() . "</br>";

      class animal{
          public $name;

          function setName(){
              $this->name;
          }
          function getName(){
              echo 'animal name is '.$this->name . "<br>";
          }

    
        }

        $lee = new animal();
        $lee->name='camel';
        $lee->getName();
        echo var_dump($lee instanceof animal)."<br>";


        // ---------------constructor-----------

        class friend{
            public $job;

            function __construct($name){ 
                echo "i'm a ".$this->job=$name . "<br>";
            }
            function __destruct(){
                echo "Im exist here <br>";
            }

        }

        $obj = new friend('Developer');
        $obj2 = new friend('Designer');


        // ------------------inheritance and overriding----------------

       class cricket{
            public $team;
            public $color;
            public $name;
            public $cham;

            function __construct($name,$color){
                $this->team=$name;
                $this->color=$color;
            }
            function getName (){
                echo "Team name is {$this->team} and color is {$this->color} ";
            }
        }

         class icc extends cricket{

            function __construct($name,$color,$cham){
                parent::__construct($name,$color);
                $this->cham=$cham;

            }
            function getName (){
              echo parent::getName(). "{$this->team} won a {$this->cham} <br>";
              echo $this->cham." in 2023 <br>";
            }
            
            //  function setName($name){
            //      echo "<h5>winner of this world cup is ".$this->name = $name ."</h5><br>";
            //  }
         }

         $obj = new icc("India",'blue','world cup');
         $obj->getName();
        //  $obj->setName('India');
        //  echo $obj->name;

        //  ---------------------------constant -----------

        class planet{
            const a = 'Earth';
            function set(){
                echo self::a ."<br>";
            }
        }

        $obj = new planet();
        $obj->set();
        // echo planet::a ;

        // -----------------------------abstraction==================

      abstract  class actor{
           abstract function name($n);
          
        }
        

        class hero1 extends actor{
            function name($n,$m='mass'){
                echo "actor1 name is {$n} {$m} <br>";
            }
            function look(){
                    echo "handsome <br>";
                }
        }
        class hero2 extends actor{
            function name($n){
                echo "actor2 name is {$n} <br>";
            }
        }

        $obj1 = new hero1();
        $obj1->name('vijay');
        $obj1->look();
        $obj2 = new hero2();
        $obj2->name('thala');

        // ---------------------interface----------------

        interface wish{
            public function msg1();
            public function msg2($m);
            public function msg3();
        }
        interface wish2 extends wish{
            public function msg4();
           
        }

        class ParentClass implements wish,wish2{
            function msg1()
            {
                echo "<h2>Wish a </h2>";
            }
            function msg2($m){
                echo "<h2>".$m."</h2>";
            }
            function msg3()
            {
                return "<h1>Pongal</h1>";
            }
            function msg4()
            {
                echo "<h2>All my friends</h2>";
            }
        }

        class child implements wish{
            function msg1()
            {
                echo "<h2>Wish a </h2>";
            }
            function msg2($m){
                echo "<h2>".$m."</h2>";
            }
            function msg3()
            {
                return "<h1>Diwali</h1>";
            }
        }

        $pongal = new parentClass();
        $pongal->msg1();
        $pongal->msg2("Happy");
       echo  $pongal->msg3();
       $pongal->msg4();
       $diwali = new child();
       $diwali->msg1();
       $diwali->msg2("Happy");
      echo  $diwali->msg3();


        // -------------------Traits------------------

        trait message
        {
            function msg(){
                echo "<h4>HAppy New Year </h4> <br>";
                
            }
        }
        trait message2{
            function msg2(){
                echo "<h4>Merry chrismas </h4> <br>";
            }
        }

        class usermsg{
                use message;        
        }
        class usermsg2{
            use message,message2;
        }

        $w = new usermsg();
        $w->msg();
        $q = new usermsg2();
        $q->msg2();
        $q->msg();

        // ------------------------static method-------------------

       class car{
            static $name = 'Bens';
            static function getName(){
                return 'BMW';
            }
        }
        class brand extends car{
            function __construct(){
                echo "Costiest car is ".parent::getName() ."<br>"; 
            }
           function setname(){
                echo "Fastest car is ".car::$name;
            }
        }
        
        $b = new brand();
        $b->setname();
    //    echo  car::$name;
    

    // --------------------------magic methods--------------------\

     class magic{
         public function __call($fun, $arg)
         {
             echo "<h5>function is ".$fun . "<br></h5>";
             echo "<h5>Arguments is <br></h5>";
             print_r($arg);
         }

         public static function __callStatic($fun, $arg)
         {
            echo "<h5>calstatic function is ".$fun . "<br></h5>";
            echo "<h5>calstatic Arguments is  <br></h5>";
            print_r($arg);
            echo "<br>";
         }

        //  ------------get and set------------------

         public function __get($var){
             echo $var. '<br>';
         }

         public function __set($var,$val){
           echo  $var = $val."<br>";
         }
        //  -------------isset -- unset -------------

        function __isset($name)
        {
            echo "hi i have isset <br>";
        }
        // ---------------tostring and invoke --------------

        function __toString()
        {
            return "<h5>string is function</h5><br>";
        }
        function __invoke()
        {
            echo "<h5>function name is invoke call automatically</h5><br>";
        }
     }

     $exp = new Magic();
     $exp->Thala('valimai','vedalam','viswasam','mangatha');
     magic::vijay('theri','puli','bigil','beast');
     $exp->Mankatha; 
     $exp->mo='Dheena';
     echo isset($exp->nam);
    //  ---__tostring
     echo $exp;
    // ---__invoke--
    $exp();
    ?>
   </div>

</body>
</html>

