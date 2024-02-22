<?php

namespace cinemamvcobjet\model\service;


use cinemamvcobjet\model\dao\UserDao;

class UserService {

  private $userDao;

    public function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function inscription($userData)
    {
        $user = $this->userDao->createObjectFromFields($userData);
        return $this->userDao->inscription($user);
    }
}