<?php
class Database
{
  protected $host;
  protected $user;
  protected $password;
  protected $db_name;
  protected $conn;
  protected $title;

  public function __construct()
  {
    $this->getConfig();
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  private function getConfig()
  {
    include_once("config.php");
    $this->host = $config['host'];
    $this->user = $config['username'];
    $this->password = $config['password'];
    $this->db_name = $config['db_name'];
  }

  public function query($sql)
  {
    return $this->conn->query($sql);
  }

  public function get($table, $where)
  {
    $sql = "SELECT * FROM " . $table . " WHERE " . $where;
    $result = $this->conn->query($sql);
    if (!$result) {
      return false;
    }
    $sql = $result->fetch_assoc();
    if (!$sql) {
      return false;
    }
    return $sql;
  }

  public function getAll($table)
  {
    $sql = "SELECT * FROM " . $table;
    $result = $this->conn->query($sql);
    $data = array();
    while ($row = $result->fetch_object()) {
      $data[] = $row;
    }
    return $data;
  }


  public function insert($table, $data)
  {
    if (is_array($data)) {
      foreach ($data as $key => $val) {
        $column[] = $key;
        $value[] = "'{$val}'";
      }

      $columns = implode(",", $column);
      $values = implode(",", $value);
    }

    $sql = "INSERT INTO " . $table . "(" . $columns . ") VALUES (" . $values . ")";
    $sql = $this->conn->query($sql);
    header('Location: home');

    if ($sql == true) {
      return $sql;
    } else {
      return false;
    }
  }

  public function update($table, $data, $where)
  {
    $update_value = [];
    if (is_array($data)) {
      foreach ($data as $key => $val) {
        $update_value[] = "$key='{$val}'";
      }
      $update_value = implode(",", $update_value);
    }

    $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
    $sql = $this->conn->query($sql);
    header('Location: ../');

    if ($sql == true) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($table, $filter)
  {
    $sql = "DELETE FROM " . $table . " WHERE " . $filter;
    $sql = $this->conn->query($sql);
    if ($sql == true) {
      return true;
    } else {
      return false;
    }
  }
}