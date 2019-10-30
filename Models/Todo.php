<?php
require_once('config/dbconnect.php');
class Todo
{
    private $table = 'tasks';
    private $db_manager;
    public function __construct()
    {
        $this->db_manager = New DbManager();
        $this->db_manager->connect();
    }
    public function create($name)
    {
        $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table .' (name) VALUES (?)');
        $stmt->execute([$name]);
        // return $this->db_manager->dbh->lastInsertId();
    }
    // 一覧を呼び出すためのメソッド
    public function all()
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);
        $stmt->execute();
        $tasks = $stmt->fetchAll();
        return $tasks;
    }

    public function get($id)
    {
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM '.$this->table.' WHERE id = ?');
        $stmt->execute([$id]);
        $task = $stmt->fetch();

        return $task;
    }
    public function update($name,$id)
    {
        $stmt = $this->db_manager->dbh->prepare('UPDATE '.$this->table.' SET name =? WHERE id = ?');
        $stmt->execute([$name,$id]);
    }
  }