<?php

class Paysera implements PaymentMethod {
    public $paymentName = "Paysera";
    public $paymentId = 3;
    public $paymentPrice = 100;
            
    public function showInSelect() {
        echo "<option value='$this->paymentId'>$this->paymentName</option>";
    }
    public function showPaymentForm(){

        //i apmokejimo nuoroda
        header("Location: https://www.paysera.com");
        exit();
    }
    public function isPaymentSuccesfull() {
        return false; //kol negauname atsakymo is paysera
    }  

}