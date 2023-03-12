<?php

use App\Core\Model;

class QuizModel extends Model
{


  public function questions($topics, $totalQuestion)
  {
    # code...

    $stringTopics = implode(',', $topics);

    $listQuestion = $this->get_list(
      "SELECT `questions`.* FROM `questions`
        INNER JOIN `topics` ON `questions`.`topic_id` = `topics`.`topic_id`
        WHERE `questions`.`status` = 'on' AND   `topics`.`topic_status` = 'on' AND
        `questions`.`topic_id` in ($stringTopics) LIMIT $totalQuestion"
    );


    // foreach ($listQuestion as $item) {
    //   # code...
    //   $item['questions']  = [
    //     'question_a' => $item['question_a'],
    //     'question_b' => $item['question_b'],
    //     'question_c' => $item['question_c'],
    //     'question_d' => $item['question_d'],
    //   ];
    // }

    return $listQuestion;
  }


  public  function createCode()
  {
    $code = generate_string(2, 5);
    $row = $this->get_row("SELECT * FROM `quizzes` WHERE `quizzes`.`code` = '$code '");
    if ($row) {
      $this->createCode();
    } else {
      return $code;
    }
  }


  public function createQuiz($data)
  {
    # code...
    return $this->insert('quizzes', $data);
  }

  public function singleQuiz($code)
  {
    # code...

    return $this->get_row("SELECT * FROM `quizzes` WHERE `quizzes`.`code` = '$code'");
  }
}
