<?php

    class User {

       public $ID;
       public $name;

//        mit __constructor arbeiten:
        function __construct($setid, $setname) {
            $this->ID = $setid;
            $this->name = $setname;
            $this->printMe();
        }

       private function printMe() {
           echo $this->ID . " " . $this->name;
       }
    }


    class SuperUser extends User {
        function bezahlKram() {
            echo "This is some expensive shit";
        }
        function printMe()
        {
            echo $this->ID . " " . $this->name . "hat viel Geld bezahlt. ";
        }
    }


    class InfidelUser extends User{
        function billig() {
            echo "werbung";
        }
    }

//    objekte aufrufen:
//    $roger = new User;
//    $roger->ID = 1;
//    $roger->name = "roger";
//    $roger->printMe();
//
//    $batman = new User;
//    $batman->ID = 2;
//    $batman->name = "batman";
//    $batman->printMe();

//    objekte mit __constructor aufrufen:
    $roger = new SuperUser(1, "roger");
//    $roger->printMe();
//    $roger->bezahlKram();

    $batman = new InfidelUser(2, "batman");
//    $batman->printMe();
//    $batman->billig();


$user = [$roger, $batman];
for($i = 0; $i < 2; $i++) {
    $user[$i]->printMe();
}

?>





