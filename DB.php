<?php

header("Content-Type: text/html;charset=UTF-8");
class DB
{
    private $connection;
    private $db_host;
    private $db_username;
    private $db_password;
    private $db_name;
    public function __construct($db_host, $db_username, $db_password, $db_name)
    {
        $this->db_host = $db_host;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
        
    }
    
    public function makeConnection()
    {
        $this->connection = mysqli_connect($this->db_host, $this->db_username,$this->db_password, $this->db_name);
        $this->connection->set_charset("utf8");
    }
    
    public function createUser($username, $password, $firstname, $lastname, $pid, $phone_number, $birth_date, $gender)
    {
        $password = md5($password);
        $query = "INSERT INTO users(username,password,firstname,lastname,pid,phone_number,birth_date,gender)
                                VALUES('$username', '$password', '$firstname', '$lastname'
                                                , '$pid', '$phone_number', STR_TO_DATE('$birth_date', '%d/%m/%Y'), $gender)";
                                                
        echo "<script>alert('$query');</script>";
        return mysqli_query($this->connection, $query);# or die(mysqli_error($this->connection));
    }
    
    public function createCoach($username, $password, $firstname, $lastname, $pid, $phone_number
                                , $birth_date, $gender, $specialty, $experience, $cost, $binary)
    {
        $password = md5($password);
        $query = "INSERT INTO coaches(username,password,firstname,lastname,pid,phone_number,birth_date,gender, specialty, experience, cost, photo) 
                                VALUES('$username', '$password', '$firstname', '$lastname'
                                                , '$pid', '$phone_number', STR_TO_DATE('$birth_date', '%d/%m/%Y')
                                                , $gender, '$specialty', $experience, $cost, '$binary')";
        echo "<script>alert('$query');</script>";
        return mysqli_query($this->connection, $query);# or die(mysqli_error($this->connection));
    }
    
    public function getCoaches()
    {
        $query = "SELECT * FROM coaches";
        $result = mysqli_query($this->connection, $query);
        $coaches = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($coaches, $row);
        }
        
        return $coaches;
    }
    
    public function loginUser($username, $password)
    {
        $password = md5($password);
        $query = "SELECT uid FROM users WHERE username='$username' and password='$password'";
        $result = mysqli_query($this->connection, $query);
        if($res = mysqli_fetch_assoc($result)['uid'])
            return $res;
        else
            return false;
    }
    
    public function loginCoach($username, $password)
    {
        $password = md5($password);
        $query = "SELECT cid FROM coaches WHERE username='$username' and password='$password'";
        $result = mysqli_query($this->connection, $query);
        if($res = mysqli_fetch_assoc($result)['cid'])
            return $res;
        else
            return false;
    }
    
    public function userExists($tel_id)
    {
        $query = 'select * from users where tel_id=' . $tel_id . ';';
        $result = mysqli_query($this->connection, $query);
        if(mysqli_fetch_assoc($result) == false)
            return false;
        return true;
    }
    
    public function userExists2($user_id)
    {
        $query = 'select * from users where id=' . $user_id . ';';
        $result = mysqli_query($this->connection, $query);
        if(mysqli_fetch_assoc($result) == false)
            return false;
        return true;
    }
    
    public function getUserInfo($uid)
    {
        $query = "SELECT * FROM users WHERE uid=$uid";
        $result = mysqli_query($this->connection, $query);
        if($result == false)
            return false;
        return mysqli_fetch_assoc($result);
    }
    
    public function buyAdvice($user_id, $coach_id)
    {
        $query = "INSERT INTO advices(uid, cid, state) VALUES($user_id, $coach_id, 'WaitForAdvice');";
        $result = mysqli_query($this->connection, $query) or die($this->connection);
        return $result;
    }
    
    public function sendAdvice($coach_id, $user_id, $advice)
    {
        $query = "UPDATE advices SET advice='$advice', state='Sent' WHERE cid=$coach_id and uid=$user_id";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    
    public function getPendingAdvices($coach_id)
    {
        $query = "SELECT uid FROM advices WHERE cid=$coach_id";
        $result = mysqli_query($this->connection, $query);
        $advices = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $advices[] = $row;
        }
        
        return $advices;
    }
    
    public function getUserAdvices($user_id)
    {
        $query = "SELECT cid, state, advice FROM advices WHERE uid=$user_id";
        $result = mysqli_query($this->connection, $query);
        $advices = array();
        
        while($row = mysqli_fetch_assoc($result))
        {
            $advices[] = $row;
        }
    }
    
    public function getCoachInfo($cid)
    {
        $query = "SELECT * FROM coaches WHERE cid=$cid";
        $result = mysqli_query($this->connection, $query);
        if($result == false)
            return false;
        return mysqli_fetch_assoc($result);
    }
    
    public function getCoachAdvices($cid)
    {
        $query = "SELECT uid, state, advice FROM advices WHERE cid=$cid";
        $result = mysqli_query($this->connection, $query);
        
        $advices = array();
        while($row = mysqli_fetch_assoc($result))
        {
            array_push($advices, $row);
        }
        return $advices;
    }
    
    public function ge($user_id)
    {
        $query = 'select source from users where id='.$user_id.';';
        $result = mysqli_query($this->connection, $query);
        if($result == false)
            return false;
        return mysqli_fetch_assoc($result)['source'];
    }
    
    public function setSource($user_id, $source)
    {
        $query = "Update users set source='" . $source . "' where id=" . $user_id . ';';
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    
    public function getTarget($user_id)
    {
        $query = 'select target from users where id='.$user_id.';';
        $result = mysqli_query($this->connection, $query);
        if($result == false)
            return false;
        return mysqli_fetch_assoc($result)['target'];
    }
    
    public function setTarget($user_id, $target)
    {
       $query = "Update users set target='" . $target . "' where id=" . $user_id . ';';
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
}
?>