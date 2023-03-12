<?php


use App\Core\Model;

class UserModel extends Model
{


  public function listUser(): array
  {
    return $this->get_list('SELECT * FROM `users` ORDER BY `users`.`user_id` DESC');
  }

  public function detailUser($id)
  {

    $detail = $this->get_row("SELECT * FROM `users` WHERE `users`.`user_id` = '$id'");

    return $detail;
  }

  public function logsUser($id)
  {

    $logs = $this->get_list("SELECT * FROM `logs` WHERE `logs`.`user_id` = '$id' ORDER BY `logs`.`id` DESC ");
    return $logs;
  }
}
