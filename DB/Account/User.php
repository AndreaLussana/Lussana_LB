<?php
class user{
  private $id;
  private $mail;
  private $psw;
  //private $hashm;
  private $hashp;

  function __construct($m, $p){
    $this->id = $this->identifier();
    $this->mail=$m;
    $this->psw=$p;
    //$this->hashm = password_hash($this->mail, PASSWORD_BCRYPT);
    $this->hashp = password_hash($this->psw, PASSWORD_BCRYPT);
  }
  function PswHash(){
    if(password_verify($this->psw, $this->hashp)){ //Verifica che la password corrisponda all'hash
      return true;
    }
    return false;
  }
  function CheckNotExist(){
    require 'db.php';
    $ma = $this->mail;
    $query="select * from users where username='$ma'";
    $sockets = db::getInstance()->get_result($query);
    if($sockets!=null){
      return false;
    }
    return true;
    /*if(is_countable($Acc)){
      for($i=0;$i<count($Acc);$i++){
        if(password_verify($this->mail, $Acc[$i]->mail)){
            return false;
          }
      }
    }
    return true;*/
  }
  function SaveUser(){
    $ma = $this->mail;
    //echo "Inserisco la mail: " . $ma;
    $ps = $this->hashp;
    //echo "Inserisco la password: " . $ps;
    $query="INSERT INTO users(username, password) VALUES('".$ma."','".$ps."')";
    $wisherID = db::getInstance()->dbquery($query);
    return $wisherID;
  }
  function login($Acc){
    for($i=0;$i<count($Acc);$i++){
    	if(password_verify($this->mail, $Acc[$i]->mail)){
        	if(password_verify($this->psw, $Acc[$i]->password)){
            $ret[] = $Acc[$i]->id;
            return $ret;
          }
      }
    }
    return false;
  }
  function identifier(){
    return uniqid("", true);;
  }
  function getID(){
    return $this->id;
  }
}
?>
