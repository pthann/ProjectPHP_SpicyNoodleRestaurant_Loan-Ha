<?php 
class ValidationHelper {
    function validatePhoneNumber($telephone) {
        
        $telephone = filter_var($telephone, FILTER_SANITIZE_NUMBER_INT);
        
        if (strlen($telephone) === 11) {
            return true;
        } else {
            return false;
        }
    }

    function validateEmail($email) {
        $email = trim($email);
    
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePassword($password) {
        
        if (strlen($password) < 8) {
            return false;
        }
    
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
     
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }
    
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            return false;
        } 
    
        return true;
    }
 
}
?>