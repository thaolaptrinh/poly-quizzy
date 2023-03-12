<?php


use App\Core\Model;

class TopicModel extends Model
{


  public function listTopic(): array
  {
    return $this->get_list('SELECT * FROM `topics` ORDER BY `topics`.`topic_id` DESC');
  }

  public function detailTopic($id)
  {

    $detail = $this->get_row("SELECT * FROM `topics` WHERE `topics`.`topic_id` = '$id'");

    return $detail;
  }

  public function deleteTopic($id)
  {
    # code...
    return  $this->remove('topics', "topic_id = '" . $id . "'");
  }

  public function addTopic($data)
  {
    # code...
    return $this->insert('topics', $data);
  }

  public function updateTopic($data, $id)
  {
    # code...
    return  $this->update('topics', $data, "topic_id = '" . $id . "'");
  }
}
