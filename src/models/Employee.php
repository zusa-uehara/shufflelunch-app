<?php

class Employee extends DatabaseModel{

  public function fetchAllName(){
      return $this->fetchAll('SELECT id, name FROM employees');
  }

  public function insert($name){
    $this->executeSql('INSERT INTO employees (name) VALUES (?)',['s' , $name]);
  }

  public function alter($oldName, $newName) {
    $this->executeSql('UPDATE employees SET name = ? WHERE name = ?', ['ss', $newName, $oldName]);
  }
}
