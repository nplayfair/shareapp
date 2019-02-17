<?php
class UserModel extends Model {
    public function register() {
        // Sanitise post array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = password_hash($post['password'], PASSWORD_DEFAULT);
        
        // Check for submission
        if ($post['submit']) {
            // Insert into DB
            $this->query('INSERT INTO users (name, email, password) VALUES 
                        (:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $this->execute();

            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: '.ROOT_URL.'users/login');
            }
        }
        return;
    }
}