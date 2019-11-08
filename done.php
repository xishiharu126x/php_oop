<?php
header("Content-type: application/json; charset=utf-8");

require_once 'Models/Todo.php';

// 完了ボタンがクリックされたタスクのIDを取得
$id = $_GET['id'];
// インスタンス化
$todo = new Todo();
// メソッドを実行
$todo->done($id);
// 更新したタスクのIDをjsonにして返す
echo json_encode($id);