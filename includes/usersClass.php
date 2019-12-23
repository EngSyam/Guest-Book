<?php
/**
 * Created by PhpStorm.
 * User: Eng Syam
 * Date: 14/01/2018
 * Time: 08:32 ص
 */

class usersClass
{
    private $connection;
    public function __construct()
    {
        $this->connection = new mysqli(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$this->connection)
            throw new Exception ('Error connecting database ,'.$this->connection->error);
    }
    public function login($username,$password)
    {
        $query=$this->connection->query("SELECT * FROM `users`WHERE `username`='$username' AND `password`='$password'");
        if(!$query)
            throw new Exception ('Error Fetching data from database'.$this->connection->error);
        $user=[];
        if($query->num_rows>0)
        {
            $user = $query->fetch_assoc();
            if(session_status()==PHP_SESSION_NONE)
                {
                    session_start();
                }
            $_SESSION['user']=$user;
        }
        return $user;

    }
    public static function logout()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        session_destroy();
    }
    public static function Check()
    {
        if(session_status()==PHP_SESSION_NONE)
        {
            session_start();
        }
        if(isset($_SESSION['user']))
            return true;
        return false;
    }
} 