<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalArray extends Controller
{
    public static $users = [
        [
            'id' => 1,
            'name' => 'M. Alnilam Lambda',
            'username' => 'alnilam',
            'password' => 'alnilam123',
            'email' => 'alnilam@wanderlust.com',
            'phone' => '+6281234567890',
            'role' => 'ptw'
        ],
        [
            'id' => 2,
            'name' => 'Azura Novalight',
            'username' => 'azura',
            'password' => 'admin123',
            'email' => 'azura@wanderlust.com',
            'phone' => '+6282234567891',
            'role' => 'admin'
        ],
        [
            'id' => 3,
            'name' => 'Sena Aurelius',
            'username' => 'sena',
            'password' => 'tourist123',
            'email' => 'sena@example.com',
            'phone' => '+6283234567892',
            'role' => 'tourist'
        ],
        [
            'id' => 4,
            'name' => 'Lira Crescent',
            'username' => 'lira',
            'password' => 'wanderlust',
            'email' => 'lira@example.com',
            'phone' => '+6284234567893',
            'role' => 'tourist'
        ],
    ];

    public static function getAllUsers()
    {
        return self::$users;
    }

    public static function getUserById($id)
    {
        foreach (self::$users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return null;
    }

    public static function getUserByUsername($username)
    {
        foreach (self::$users as $user) {
            if ($user['username'] == $username) {
                return $user;
            }
        }
        return null;
    }

    public static function checkLogin($username, $password)
    {
        foreach (self::$users as $user) {
            if ($user['username'] == $username && $user['password'] == $password) {
                return $user;
            }
        }
        return null;
    }
}
