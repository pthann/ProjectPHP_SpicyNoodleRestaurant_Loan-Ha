<?php
require_once("models/Model.php");

class ProfileModel extends Model {
    public function __construct() {
        parent::__construct("users");
        $this->table = "users";
    }

    public function readOneProfileUser($id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isExistProfileEmail($email) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("SELECT id FROM $this->table WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() != 0;
    }

    public function updateProfileUser($data, $id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET 
            email = :email,
            name = :name,
            avatar = :avatar,
            role = :role,
            block = :block,
            telephone = :telephone 
            WHERE id = :id");
    
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':avatar', $data['avatar']);
        $stmt->bindParam(':role', $data['role']);
        $stmt->bindParam(':block', $data['block']);
        $stmt->bindParam(':telephone', $data['telephone']);
        $stmt->bindParam(':id', $id);
        
        $result = $stmt->execute();
    
        if ($result) {
            echo "<script>
                alert('User updated successfully!');
                window.location.href='/admin/profile';
            </script>";
        } else {
            echo "<script>
                alert('Error updating user.');
                window.location.href='/admin/profile';
            </script>";
        }
    
        return $result;  
    }

    public function updatePasswordProfileUser($data, $id) {
        $connection = new Connection();
        $stmt = $connection->getConnection()->prepare("UPDATE $this->table SET 
            password = :password 
            WHERE id = :id");
    
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':id', $id);
    
        $result = $stmt->execute();
    
        if ($result) {
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'User updated password successfully!',
                });
            </script>";
        } else {
            echo "<script>
                alert('Error updating password.');
                window.location.href='/admin/profile';
            </script>";
        }
    
        return $result;
    }
    
}
?>