<?php 



class Card implements PaymentMethod {
    public $paymentName = "Card";
    public $paymentId = 2;
    public $paymentPrice = 100;
            
    public function showInSelect() {
        echo "<option value='$this->paymentId'>$this->paymentName</option>";
    }
    public function showPaymentForm(){
        echo "<form action='index.php' method='post'>
            <input type='text' name='cardNumber' placeholder='Card number'>
            <input type='text' name='cardHolder' placeholder='Card holder'>
            <input type='text' name='cardCvv' placeholder='CVV'>
            <input type='text' name='cardExpire' placeholder='Expire date'>
            <input type='submit' name='submit' value='Pay'>
        </form>";
    }
    public function isPaymentSuccesfull() {
        if(isset($_POST['submit'])) {
            if(!empty($_POST['cardNumber']) && !empty($_POST['cardHolder']) && !empty($_POST['cardCvv']) && !empty($_POST['cardExpire'])) {
                echo "Payment succesfull";
            } else {
                echo "Payment unsuccesfull";
            }
        }
    }  

}