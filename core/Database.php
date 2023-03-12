<?php


namespace App\Core;

class Database
{
  private $conn;

  public function __construct()
  {
    $this->connect();
  }

  public function connect()
  {
    if (!$this->conn) {
      $this->conn = mysqli_connect(
        $_ENV['DB_HOST'],
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
        $_ENV['DB_DATABASE'],
        $_ENV['DB_PORT']
      ) or die('Error => DATABASE');
      mysqli_query($this->conn, "set names 'utf8'");
    }
  }
  public function dis_connect()
  {
    if ($this->conn) {
      mysqli_close($this->conn);
    }
  }
  public function site($data)
  {
    // $this->connect();
    // $row = $this->conn->query("SELECT * FROM `settings` WHERE `name` = '$data' ")->fetch_array();
    // return $row['value'];
    $this->connect();
    $row = $this->conn->query("SELECT * FROM `settings` LIMIT 1")->fetch_array();
    if ($row) {
      return $row[$data];
    }
    return false;
  }

  public function query($sql)
  {
    $this->connect();
    $row = $this->conn->query($sql);
    return $row;
  }

  public function insert($table, $data)
  {
    $this->connect();
    $field_list = '';
    $value_list = '';
    foreach ($data as $key => $value) {
      $field_list .= ",$key";
      $value_list .= ",'" . mysqli_real_escape_string($this->conn, $value) . "'";
    }
    $sql = 'INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' . trim($value_list, ',') . ')';

    return mysqli_query($this->conn, $sql);
  }
  public function update($table, $data, $where)
  {
    $this->connect();
    $sql = '';
    foreach ($data as $key => $value) {
      $sql .= "$key = '" . mysqli_real_escape_string($this->conn, $value) . "',";
    }
    $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;
    return mysqli_query($this->conn, $sql);
  }
  public function update_value($table, $data, $where, $value1)
  {
    $this->connect();
    $sql = '';
    foreach ($data as $key => $value) {
      $sql .= "$key = '" . mysqli_real_escape_string($this->conn, $value) . "',";
    }
    $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where . ' LIMIT ' . $value1;
    return mysqli_query($this->conn, $sql);
  }


  public function remove($table, $where)
  {
    $this->connect();
    $sql = "DELETE FROM $table WHERE $where";
    return mysqli_query($this->conn, $sql);
  }
  public function get_list($sql)
  {
    $this->connect();
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      die('Câu truy vấn bị sai');
    }
    $return = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $return[] = $row;
    }
    mysqli_free_result($result);
    return $return;
  }
  public function get_row($sql)
  {
    $this->connect();
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      die('Câu truy vấn bị sai');
    }
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    if ($row) {
      return $row;
    }
    return false;
  }
  public function num_rows($sql)
  {
    $this->connect();
    $result = mysqli_query($this->conn, $sql);
    if (!$result) {
      die('Câu truy vấn bị sai');
    }
    $row = mysqli_num_rows($result);
    mysqli_free_result($result);
    if ($row) {
      return $row;
    }
    return 0;
  }
}
