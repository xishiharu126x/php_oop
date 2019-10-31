<?php
    $id = $_GET['id'];

    require_once 'Models/Todo.php';
    $todo = new Todo();
    $todo->delete($id);