<?php
/**
 * Created by PhpStorm.
 * User: jose
 * Date: 2/05/18
 * Time: 19:43
 */

namespace App\Application\User\InsertUser;


use App\Infrastructure\Repository\User\UserRepository;

class InsertUser
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle()
    {

    }
}