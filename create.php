<?php

header("Content-type: application/json; charset=utf-8");

require_once('Models/Todo.php');

//入力されたデータを変数taskに保存
$task = $_POST['task'];

$todo = new Todo();
// 新しいタスクを作成（作成したタスクのIDを取得）
$latestId = $todo->create($task);
// 最新のタスクを取得

// 最新のタスクをjson形式にして通信元に返す
$latestTask = $todo->get($latestId);
echo json_encode($latestTask);

// header('Location: index.php');

