<?php

class DatabaseModel{
  protected $mysqli;

  public function __construct($mysqli){
    $this->mysqli = $mysqli;
  }

  public function fetchAll($sql){
    $result = $this->mysqli->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  protected function executeSql($sql, $params=[]){
    $stmt = $this->mysqli->prepare($sql);

    if($params){
      if(is_array($params) && count($params) >= 2 && is_string($params[0])){
        $types = array_shift($params);
        $stmt->bind_param($types, ...$params);
      }
    }
    $stmt->execute();
    $stmt->close();
  }
}
