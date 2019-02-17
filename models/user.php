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

    public function login() {
        // Sanitise post array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //$password = password_hash($post['password'], PASSWORD_DEFAULT);
        
        // Check for submission
        if ($post['submit']) {
            // Compare login
            $this->query('SELECT * from users WHERE email = :email');
            $this->bind(':email', $post['email']);

            $this->execute();

            // Check password
            $row = $this->single();
            // Ensure row is returned before continuing
            if (!isset($row)) {
                die('Database Error');
            }
            if (password_verify($post['password'], $row['password'])) {
                // Logged in
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"    => $row['id'],
                    "name"  => $row['name'],
                    "email" => $row['email']
                );
                header('Location: '.ROOT_URL.'shares');
            } else {
                // Incorrect
                echo 'Incorrect login';
            }
        }
        return;
    }
}