<?php

class EditController extends Controller{

  public function index() {
    $employees = $this->databaseManager->get('Employee')->fetchAllName();

    return $this->render([
      'title' => '社員名変更',
      'employees' => $employees,
      'errors' => [],
    ]);
  }

  public function create() {

    $employee = $this->databaseManager->get('Employee');
    $employees = $employee->fetchAllName();

    if (!$this->request->isPost()) {
    throw new HttpNotFoundException();
    }

    $oldName = $_POST['name'] ?? '';
    $newName = $_POST['update_name'] ?? '';
    $errors = [];

    if (trim($oldName) === "" || trim($newName) === ""){
      $errors[] = "どちらも名前を入力してください";
    }
    $employee = $this->databaseManager->get('Employee');

    if (empty($errors)) {
      $employee->alter($oldName, $newName);
    }

    return $this->render([
      'title' => '社員名変更',
      'employees' => $employees,
      'errors' => $errors,
    ], 'index');
  }

}
