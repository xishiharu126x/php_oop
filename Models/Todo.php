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
  }