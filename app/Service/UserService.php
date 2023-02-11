<?php

namespace App\Service;
use App\Repository\UserRepository;

class UserService{
    public static function readUser(){
        $listUser = UserRepository::getAllUser();
    }
}