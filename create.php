<?php

require_once('Models/Todo.php');

//入力されたデータを変数taskに保存
$task = $_POST['task'];

$todo = new Todo();
// 新しいタスクを作成（作成したタスクのIDを取得）
$latestId = $todo->create($task);
// 最新のタスクを取得

// 最新のタスクをjson形式にして通信元に返す
  echo json_encode($latestId);

// header('Location: index.php');

