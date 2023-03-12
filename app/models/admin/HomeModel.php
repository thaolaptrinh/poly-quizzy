<?php


use App\Core\Model;

class HomeModel extends Model
{


  public function dataSetting(): array
  {
    return $this->get_row('SELECT * FROM `settings`');
  }

  public function dataLogs(): array
  {
    # code...

    $data = $this->get_list("SELECT `logs`.*, `users`.`email` FROM `logs` INNER JOIN `users` ON `users`.`user_id` = `logs`.`user_id` ORDER BY `logs`.`id` DESC");

    return $data;
  }

  public function dataUsers(): array
  {
    # code...

    $data = $this->get_list("SELECT * FROM `users`ORDER BY `users`.`user_id` DESC");

    return $data;
  }

  public function statisticUser(): array
  {
    # code...

    $total['all'] = $this->num_rows("SELECT `users`.`user_id` FROM `users`") ?? 0;
    $total['active'] = $this->num_rows("SELECT `users`.`user_id` FROM `users` WHERE `users`.`status` = 'on'") ?? 0;
    $total['disabled'] = $this->num_rows("SELECT `users`.`user_id` FROM `users` WHERE `users`.`status` = 'off'") ?? 0;

    return $total;
  }

  public function dataTotal(): array
  {
    # code...

    $total['topics'] = $this->num_rows("SELECT `topics`.`topic_id` FROM `topics`") ?? 0;
    $total['questions'] = $this->num_rows("SELECT `questions`.`id` FROM `questions` ") ?? 0;
    $total['users'] = $this->num_rows("SELECT `users`.`user_id` FROM `users`") ?? 0;

    return $total;
  }

  public function dataTopics(): array
  {
    # code...

    $list = $this->get_list("SELECT * FROM `topics` ORDER BY `topics`.`topic_id` DESC");

    return $list;
  }
}
