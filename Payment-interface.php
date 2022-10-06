<?php 

interface PaymentMethod {
    public function showInSelect();
    public function showPaymentForm();
    public function isPaymentSuccesfull();    
}