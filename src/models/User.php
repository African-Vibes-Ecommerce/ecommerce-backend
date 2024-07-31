<?php

namespace ZmDesign\AfricanVibesEcommerceBackend\Models;

use ZmDesign\AfricanVibesEcommerceBackend\Config\Dbh;


class User extends Dbh
{
    public function createUser($firstName, $lastName, $username, $email, $password)
    {
        $sql = "INSERT INTO users (first_name, last_name, username, email, password) VALUES (:firstName, :lastName, :username, :email, :password)";
        $params = [
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':username' => $username,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        return $this->execute($sql, $params);
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = [':email' => $email];
        return $this->fetch($sql, $params);
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $params = [':username' => $username];
        return $this->fetch($sql, $params);
    }
}