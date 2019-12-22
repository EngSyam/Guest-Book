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

    /**
     * get All messages
     * @param null $Extra
     * @return array
     * @throws Exception
     */
    public function getMessages($Extra = null){
        $query = $this->connection->query("SELECT * FROM `messages` $Extra");
        if(!$query)
            throw new Exception('Error Fetching Data From Database');
        $message = [];
        while($row = $query->fetch_assoc()){
            $message[]=$row;
        }
        return $message;
    }

    /**
     * get message by Id
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function getMessage($id){
        $message = $this->getMessages("WHERE `id` = $id");
        if(count($message)>0)
            return $message[0];
        return[];
    }

    /**
     * search messages using title and message
     * @param $keyword
     * @return array
     * @throws Exception
     */
    public function SearchMessages($keyword){
        $messages = $this->getMessages("WHERE `title` LIKE '%$keyword%' OR `message` LIKE '%$keyword%'");
        return $messages;
    }

    /**
     * git message by status
     * @param int $published
     * @return array
     * @throws Exception
     */
    public function getMessageByStatus($published = 1){
        $messages = $this->getMessages("WHERE `published` = $published");
        return $messages;
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