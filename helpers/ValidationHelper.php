<?php 
class ValidationHelper {
    function validatePhoneNumber($phoneNumber) {
        
        $phoneNumber = filter_var($phoneNumber, FILTER_SANITIZE_NUMBER_INT);
        // Check if the number is exactly 11 digits
        if (strlen($phoneNumber) === 11) {
            // Additional validation if needed
            return true;
        } else {
            return false;
        }
    }

    function validateEmail($email) {
        // Remove leading and trailing whitespaces
        $email = trim($email);
    
        // Validate email using filter_var
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    function validatePassword($password) {
        // Check if password length is at least 8 characters
        if (strlen($password) < 8) {
            return false;
        }
    
        // Check if password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
    
        // Check if password contains at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
    
        // Check if password contains at least one digit
       
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }
    
        // Check if password contains at least one special character
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            return false;
        }http://localhost:3000/login
    
        // If all checks pass, the password is valid
        return true;
    }
 
}
?>