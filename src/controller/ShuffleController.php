<?php

class ShuffleController {

  function index(){

    $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
    $result = $mysqli->query('SELECT name FROM employees');
    $employees = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();

    $employees = array_column($employees, 'name');
    shuffle($employees);
    $numberOfRegistrations = count($employees);

    if($numberOfRegistrations % 2 === 0){
      $groups = array_chunk($employees, 2);
    } else {
      $extra = array_pop($employees);
      $groups = array_chunk($employees, 2);
      array_push($groups[0], $extra);
    }

    require '../views/index.php';
  }

  function create(){

    $mysqli = new mysqli('db', 'test_user', 'pass', 'test_database');
    $result = $mysqli->query('SELECT name FROM employees');
    $employees = $result->fetch_all(MYSQLI_ASSOC);
    $mysqli->close();

    $employees = array_column($employees, 'name');
    shuffle($employees);
    $numberOfRegistrations = count($employees);

    if($numberOfRegistrations % 2 === 0){
      $groups = array_chunk($employees, 2);
    } else {
      $extra = array_pop($employees);
      $groups = array_chunk($employees, 2);
      array_push($groups[0], $extra);
    }

    require '../views/index.php';
  }

}
