<?php

namespace quicknote\model;


class User
{
    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var int
     */
    private $privilege;

    /**
     * User constructor.
     *
     * @param string $lastName
     * @param string $firstName
     * @param string $userName
     * @param string $password
     * @param int    $privilege
     */
    public function __construct($lastName, $firstName, $userName, $password, $privilege)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->userName = $userName;
        $this->password = $password;
        $this->privilege = $privilege;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getPrivilege(): int
    {
        return $this->privilege;
    }

}