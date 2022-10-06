<?php 


class Cash implements PaymentMethod {
    public $paymentName = "Cash";
    public $paymentId = 1;
    public $paymentPrice = 100;
            
    public function showInSelect() {
        echo "<option value='$this->paymentId'>$this->paymentName</option>";
    }
    public function showPaymentForm(){
        echo "Apmokėkite atsiimdami prekes";
    }
    public function isPaymentSuccesfull() {
        return true;
    }  

}