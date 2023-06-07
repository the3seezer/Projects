<?php
//STRINGS
//$time = 8000;
//$comment = "I AM WORKING";
//echo strlen($comment); ** is a power operator
//echo str_replace('I AM','WE ARE',$comment); echo '<p><hr></p>';
//echo strtolower($comment); echo '<p></p>';
//define('ME',"I AM WORKING");//declaring and assigning a constant
//echo "$comment with \"bachu\""; echo '<p><br></p>'; //double quotes allows outputting variables in them
//echo 'and looking at the "phone"';



//INDEXED ARRAYS;it can have any data type;
//$onePerson = ['bachu','ally','chamani'];
//$anotherPerson = array('abuDujana','theBitRiddler');
//$anotherPerson[] = 'theThreeSeezier';
//array_push($onePerson,'ibrahim');
//print_r($onePerson); echo '<p>';
//print_r($anotherPerson);
//echo count($anotherPerson);
//$other = array_merge($onePerson,$anotherPerson);
//print_r($other);

//ASSOCIATIVE ARRAYS (key & value pairs);
//$firstStudent = ['first' => 'Bachu','middle' => 'ally','last' => 'chamani'];
//print_r($firstStudent);echo '<p>';
//$secondStudent = array('first2' => 'adiru' ,'middle2'=>'mahir','last3' => 'ulamaa');
//$secondStudent['nickName'] = 'swahibu';
//$firstStudent['first'] = 'BACHUBA';
//print_r($firstStudent);
//$allStudents = array_merge($firstStudent, $secondStudent);
//print_r($allStudents);
 
//MULTIDIMENTIONAL ARRAY
//$student = [
 //   ['first' => 'bachu','last' => 'ally','age' => 29],
 //   ['first' => 'abuduAdiru','last' => 'mahir','age' => 18],
 //   ['first' => 'muoman','last' => 'soja','age' => 19]
//];
//echo $student[1]['age'];
//$student[] = ['first' => 'mfaume','last' => 'ume','age' => 15];
//print_r($student);
//$popped = array_pop($student);
//print_r($popped);
//print_r($student);


//LOOP
//$floors = ['mezanine','ground','stories'];
//for($i = 0;$i < count($floors);$i++){
  //echo $block[$i] . '<br />';
//}echo '<br/>';
//foreach($floors as $floor){
 // echo $floor . '<br/>';
//}
$students = [
  ['name' => 'bachu', 'home' => 'karagwe','age' => 29],
  ['name' => 'adiru', 'home' => 'muleba', 'age' => 18],
  ['name' => 'muoman','home' => 'bukoba', 'age' => 21],
  ['name' => 'sajad', 'home' => 'mwanza', 'age' => 5],
  ['name' => 'zonga', 'home' => 'pongwe', 'age' => 31],
  ['name' => 'abubakar','home' =>'Tanga', 'age' => 38]
];

//foreach($students as $student){
  // echo $student['name'] . ' - ' . $student['age'] . ' - ' . $student['home'] . '<br/>';
//}
//$i = 0;
//while($i < count($students)){
 // echo $students[$i]['name'] . '<br/>';
 // $i++;
//}echo '<br>';


//BOOLEAN
//echo 5 < 10; echo '<br>';
//echo 'bachu' < 'muoman';
//echo 'bachu' > 'Bachu';

//strict & loose comparison
//echo 5 == '5';
//echo 5 === '5';
//echo '5' === '5';
//echo true == '1';
//echo false == '';
//function sayYoo($name = 'Bachu'){
 //  echo "Hi $name my name is Ally";
//}
//sayYoo('muoman');


//FUNCTIONS
function what($name = "Bachu",$place = "omurushaka"){
    echo "$name lives in $place";
}
 //what('Mfaume','Dar es Salaam');
function productDetails($product){
  return "{$product['name']} cost around {$product['price']} dollars" . '<br>';
}
 $product = productDetails(['name' => 'Apples','price' => '3']);
 //echo $product;

 //CLASSES AND OBJECTS
 //PART ONE
// class User{
//   public $name;
 //  public $email;

   //a function that runs whenever the class is instanciated
  // public function __construct(){
  //   $this->name = 'Bachu Ally';
  //   $this->email = 'bachually30@gmail.com';
  // }
  ///
 // public function __construct($name,$email){
 //   $this->name = $name;
 //   $this->email = $email;
 // }
   //public function login(){
   //  echo 'The user is logged in';
   //}
   ///
//   public function login(){
 //    echo $this->name . ' is logged in';
 //  }
// }
 //$userOne = new User();//instanciating a class;making objects
 //$userOne->login();
 //echo $userOne->name;
 //echo $userOne->email;
// $userTwo = new User('Bachu Ally','bachually30@gmail.com');
// echo $userTwo->email;
//$userTwo->name = 'Adiru Boy';//we can easily update the "public" property values outside the class
//echo $userTwo->login();

//PART TWO
class User {
  private $name;
  private $email;
  
  public function __construct($name,$email){
    $this->name = $name;
    $this->email = $email;
  }
  public function login(){
    echo $this->name . ' is logged in';
  }
  public function getName(){
    return $this->name;
  }
  public function setName($name){
    if(is_string($name) && strlen($name) > 1){
     // return "$this->name has been changed to $name";
     return "the name has been changed to $name";
    }else{
      return 'not a valid name';
    }
  }
}
$userThree = new User('Bachu Ally','bachually30@gmail.com');
//echo $userThree->name;//private property wont output
//$userThree->login();works like a getName function;a public function
//echo $userThree->getName();
//echo $userThree->setName('M');else will execute;not a valid name
//echo $userThree->setName(50);else will execute
echo $userThree->setName('Muomani');
echo $userThree->getName();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
    <h1><?php // echo ME .' NOW' . ' until '; echo $time;  ?> ALONE</h1>
    <h1><?php // echo $comment; ?></h1> -->


  <!--   LOOPS WITH AN HTML SCRIPT
  <h1>STUDENTS</h1>
  <table>
   <tr><th>NAME</th><th>HOME</th><th>AGE</th></tr>
   <?php// foreach($students as $student){ ?>
   <tr><td><?php// echo $student['name']; ?></td><td><?php// echo $student['home']; ?></td><td><?php// echo $student['age']; ?></td></tr>
   <?php//  } ?>
  </table> -->
  <!--
<div>
  <ul>
    <?php// foreach($students as $student){ ?>
          <?php// if($student['age'] > 10 && $student['age'] < 20){ ?>
          <li><?php// echo $student['name'] . ' - ' . $student['age'] . '<br />'; ?></li>
          <?php// } ?>
    <?php// } ?>
  </ul>
</div>
          -->
    <!--  
          <div>
  <ul>
    <?php// foreach($students as $student){ ?>
          <?php// if($student['age'] > 10 && $student['age'] < 20){ 
              //  continue;
         // } ?>
          <li><?php// echo $student['name'] . ' - ' . $student['age'] . '<br />'; ?></li>
    <?php// } ?>
  </ul>
</div>
        -->

<div>
    <form action="register.php" method="post">
        <label for="">fullname</label><br>
        <input type="text" name="fullname" style="background-color: blue; color: white;"><br>

        <label for="">email</label><br>
        <input type="text" name="email" class="color"><br>

        <label for="gender">gender</label><br>
        <select name="gender" id="gender">
            <option value="male">male</option>
            <option value="female">female</option>
        </select><br>

        <label for="passwod">passwod</label><br>
        <input type="password" name="password" class="color"><br><br>
        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>