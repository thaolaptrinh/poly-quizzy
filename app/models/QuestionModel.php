<?php

use App\Core\Model;

class QuestionModel extends Model
{


  public function listQuestion($topic_id)
  {
    # code...
    $list = $this->get_list("SELECT * FROM `questions` WHERE `questions`.`topic_id` = '$topic_id' ");
    return $list;
  }

  public function addQuestion($data)
  {
    # code...
    return $this->insert('questions', $data);
  }


  public function singleQuestion($id)
  {
    # code...
    return $this->get_row("SELECT * FROM `questions` WHERE `questions`.`id` = '$id'");
  }

  public function deleteQuestion($id)
  {
    # code...
    return $this->remove('questions', "id = '$id'");
  }
}
