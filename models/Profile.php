<?php
class Profile {
    private $id;
    private $email;
    private $lastName;
    private $firstName;
    private $gender;
    private $avatar;
    private $role;
    private $telephone;
    private $point;

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId() {
        return $this->id;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getRole() {
        return $this->role;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getPoint() {
        return $this->point;
    }

    public function id($id) {
        $this->id = $id;
        return $this;
    }

    public function email($email) {
        $this->email = $email;
        return $this;
    }

    public function gender($gender) {
        $this->gender = $gender;
        return $this;
    }

    public function lastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function firstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function avatar($avatar) {
        $this->avatar = $avatar;
        return $this;
    }

    public function role($role) {
        $this->role = $role;
        return $this;
    }

    public function point($point) {
        $this->point = $point;
        return $this;
    }

    public function telephone($telephone) {
        $this->telephone = $telephone;
        return $this;
    }

    public static function builder() {
        return new self();
    }
}
