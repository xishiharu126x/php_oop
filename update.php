<?php
require_once 'Models/Todo.php';
// スーパーグローバル変数でtask,idを取得するコードを書いてください
    $task = $_POST['task'];
    $id = $_POST['id'];

    // var_dump($task);
    // var_dump($id);

    $todo = new Todo();
    $todo->update($task,$id);

    header('Location: index.php');
