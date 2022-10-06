<?php 
class Transfer implements PaymentMethod {
    public $paymentName = "Transfer";
    public $paymentId = 4;
    public $paymentPrice = 100;
            
    public function showInSelect() {
        echo "<option value='$this->paymentId'>$this->paymentName</option>";
    }
    public function showPaymentForm(){
        echo "Perveskite pinigus i saskaita: LT123456789";
    }
    public function isPaymentSuccesfull() {
        return true;
    }  

}