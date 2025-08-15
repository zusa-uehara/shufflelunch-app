<?php

class EmployeeController extends Controller{
  function index(){

    $employees = $this->databaseManager->get('Employee')->fetchAllName();

    return $this->render([
      'title' => '社員登録',
      'employees' => $employees,
      'errors' => [],
    ]);

  }
  function create(){

    if(!$this->request->isPost()){
      throw new HttpNotFoundException();
    }

    $errors = [];
    $employee = $this->databaseManager->get('Employee');
    $employees = $employee->fetchAllName();

    if(!strlen($_POST['name'])){
      $errors['name'] = '社員名を入力してください';
    } elseif(strlen($_POST['name']) > 100){
      $errors['name'] = '社員名は１００文字以内で入力してください。';
    }

    if(!count($errors)){
      $employee -> insert($_POST['name']);
    }

    return $this->render([
      'title' => '社員登録',
      'employees' => $employees,
      'errors' => $errors,
    ] , 'index');

  }
}
