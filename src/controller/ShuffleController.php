<?php

class ShuffleController extends Controller {

  function index(){

    return $this->render([
      'groups' => [],
    ]);

  }

  function create(){

    if(!$this->request->isPost()){
      throw new HttpNotFoundException();
    }

    $groups = [];

    $employees = $this->databaseManager->get('Employee')->fetchAllName();
    shuffle($employees);
    $numberOfRegistrations = count($employees);

    if($numberOfRegistrations % 2 === 0){
      $groups = array_chunk($employees, 2);
    } else {
      $extra = array_pop($employees);
      $groups = array_chunk($employees, 2);
      array_push($groups[0], $extra);
    }
    return $this->render([
      'groups' => $groups,
    ], 'index');
  }

}
