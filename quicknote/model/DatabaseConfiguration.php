<?php
/**
 * Created by IntelliJ IDEA.
 * User: daniel
 * Date: 16.10.17
 * Time: 12:19
 */

namespace quicknote\model;


class DatabaseConfiguration
{
    /**
     * @var string
     */
    private $database;

    /**
     * @var
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $adapter;

    /**
     * @var int
     */
    private $port;

    /**
     * DatabaseConfiguration constructor.
     *
     * @param $database
     * @param $user
     * @param $password
     * @param $adapter
     * @param $port
     */
    public function __construct(string $database, $user, string $password, string $adapter = "mysql", int $port = 3306)
    {
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
        $this->adapter = $adapter;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getAdapter(): string
    {
        return $this->adapter;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

}