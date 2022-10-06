<?php

//paveldejimas - is tevines klases yra perduodamos savybes bei metodai vaikinems klasems


//polimorfizmas(tas pats tik kitaip) - kai klases TURI atlikti vienoda metoda, tik kiekviena is tu klasiu ji TURI atlikti kitaip


//interface(sąsaja) - klases sudarymo taisykles(sablono sablonas)
//sasajoje mes aprasome TIK metodus, metodai turi buti TUSTI, turi nurodyti kokie bus metodai, bet ne tai ka jie turi daryti


//Klase1 ir Klase2 turi atlikti vienodus metodus, tik kitaip
//sasajo juos apraso

//Klase1 pasiimk metodu aprasyma is sasajos
//Klase2 passimk metodu aprasyma is sasajos

// interface Sasaja {
//     public function metodas1();
//     public function metodas2();
//     public function metodas3();
// }

// class Klase1 implements Sasaja {

//     public function metodas1() {
//         echo 'Klase1 metodas1';
//     }

//     public function metodas2() {
//         echo 'Klase1 metodas2';
//     }

//     public function metodas3() {
//         echo 'Klase1 metodas3';
//     }

//     // public function metodas1();
//     // public function metodas2();
//     // public function metodas3();

// }

// class Klase2 implements Sasaja {
//     //  public function metodas1();
//     // public function metodas2();
//     // public function metodas3();
//     public function metodas1() {
//         echo 'Klase2 metodas1';
//     }
//     public function metodas2() {
//         echo 'Klase2 metodas2';
//     }
//     public function metodas3() {
//         echo 'Klase2 metodas3';
//     }
      
// }


// $klase1 = new Klase1();
// $klase1->metodas1();
// $klase1->metodas2();
// $klase1->metodas3();

// $klase2 = new Klase2();
// $klase2->metodas1();
// $klase2->metodas2();




// //Pingvinas - negali skristi, bet gali plaukti
// //Antis - gali skristi gali plaukti
// //Balandis - gali skristi negali plaukti

// interface Skristi{
//     public function skristi();
// }

// interface Plaukti{
//     public function plaukti();
// }

// //sasajos iterpineti nereikia
// class Paukstis {
//     public function info() {
//         echo 'Cyp cyp paukstis';
//     }
// }
// class Zuvedra extends Paukstis implements Skristi, Plaukti {
//     public function skristi() {
//         echo 'Zuvedra skrenda';
//     }
//     public function plaukti() {
//         echo 'Zuvedra plaukia';
//     }
// }

// class Pingvinas extends Paukstis implements Plaukti {
//     // public function info() {
//         // echo 'Cyp cyp paukstis';
//     // }

//     public function plaukti() {
//         echo "Pingvinas plaukia";
//     }
// }

// class Balandis extends Paukstis implements Skristi{
//     // public function info() {
//         // echo 'Cyp cyp paukstis';
//     // }

//     public function skristi() {
//         echo "Balandis skris";
//     }
// }
// //klasei prijungti kelias sasajas
// //nes jinai gali ir plaukti ir skristi
// class Antis extends Paukstis implements Skristi, Plaukti{
//     // public function info() {
//         // echo 'Cyp cyp paukstis';
//     // }
//     public function skristi() {
//         echo "Antis skris";
//     }

//     public function plaukti() {
//         echo "Antis plaukia";
//     }
// }

// echo "<br>";
// $pingvinas = new Pingvinas();
// $pingvinas->info();
// $pingvinas->plaukti();
// echo "<br>";
// $antis = new Antis();
// $antis->info();
// $antis->skristi();
// $antis->plaukti();
// echo "<br>";
// $balandis = new Balandis();
// $balandis->info();
// $balandis->skristi();
?>

<?php

    //extends

    //netyciniu metodu perasymu


    

    include("Payment-interface.php");
    include("modules/Cash-class.php");
    include("modules/Card-class.php");
    include("modules/Paysera-class.php");
    include("modules/Transfer-class.php");

    $cash = new Cash();
    $card = new Card();
    $paysera = new Paysera();
    $transfer = new Transfer();

    $payment_methods = [$cash, $card, $paysera,$transfer];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krepselis</title>
</head>
<body>
    <form method="post" action="index.php">
        <select name="paymentOptions">
            <?php foreach($payment_methods as $payment) {
                $payment->showInSelect();
             } ?>

        </select>
        
        <button type="submit" name="pay">Pay</button>
    </form>

    <?php 
    
    if(isset($_POST['pay'])) {
        $payment_methods[$_POST["paymentOptions"]-1]->showPaymentForm();
    }

    //Magento ir prestashop elektroniniu parduotuviu sistemose
    
    
    //atsinaujino apmokejimo tiekejo sistema(Paysera)
    //cookies - sausainuku saugykla persipildo, ir svetaine ir nepasileisti
    //susipjauna moduliai - modulines() - vienu metu du moduliai bando pasiekti ta pacia sistemos vieta
    //Wordrpess, Magento, Prestashop - > atsinaujino sistemos branduolys(automatiniai)

    //moduliai sistemos plytos - kiekviena turi vieta




    //atsinaujina programinio kodo technologija
    //PHP 7.4 - klaseje nenaudojama savybes tipo 
    // PHP 8.x - klaseje naudoti savybes tipa

    //PHP 5.6 -> 7.4 - didziausias galvos skausmas

    //javascript
    
    ?>         


/
</body>
</html>