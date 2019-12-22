<?php
/**
 * Created by PhpStorm.
 * User: Syamٍ
 * Date: 12/22/2019
 * Time: 06:13 ص
 */

class messagesClass {
    private $connection;

    /**
     * connect to db, test if connection occured or no and store in variable
     * @throws Exception
     */
    public function __construct(){
        $this->connection = new mysqli(SERVER,DBUSER,DBPASS,DBNAME);
        if(!$this->connection)
            throw new Exception('Error Connection Database ,'.$this->connection->error);
    }

    /**
     * add new message and test if query occured or no
     * @param message $m
     * @return bool
     * @throws Exception
     */
    public function addMessage(message $m){
        $title     = $m->getTitle();
        $message   = $m->getMessage();
        $name      = $m->getName();
        $email     = $m->getEmail();
        $phone     = $m->getPhone();
        $date      = $m->getDate();
        $published = $m->getPublished();
        $qurey = $this->connection->query("INSERT INTO `messages`(`title`, `message`, `name`, `email`, `phone`, `published`, `date`) VALUES ('$title','$message','$name','$email','$phone',$published,NOW())");
        if(!$qurey || $this->connection->affected_rows == 0)
            throw new Exception('Error Inserting In Database'.$this->connection->error);

        return true;
    }
    public function getMessages(){

    }
    public function getMessage($id){

    }
    public function SearchMessages(){

    }
    public function getMessageByStatus(){

    }

    /**
     * update Message
     * @param message $m
     * @throws Exception
     */
    public function UpdateMessage(message $m){
        $id        = $m->getId();
        $title     = $m->getTitle();
        $message   = $m->getMessage();
        $published = $m->getPublished();
        $qurey = $this->connection->query("UPDATE `messages` SET `title`='$title',`message`='$message',`published`=$published,`date`=NOW() WHERE `id`= $id");
        if(!$qurey || $this->connection->affected_rows == 0)
            throw new Exception('Error Updating In Database'.$this->connection->error);

    }

    /**
     * Delete message from db
     * @param $id
     * @throws Exception
     */
    public function deleteMessage($id){
        $qurey = $this->connection->query("DELETE FROM `messages` WHERE `id`= $id");
        if(!$qurey || $this->connection->affected_rows == 0)
            throw new Exception('Error Deleting From Database'.$this->connection->error);
    }

} 