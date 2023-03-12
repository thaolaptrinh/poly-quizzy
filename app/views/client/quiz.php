<section>

  <nav class="py-[15px] flex justify-center mb-[30px]">
    <ol class="flex">
      <li class="relative w-[40px] md:w-[150px] text-center text-sm font-light italic
                after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-6 after:h-6
                after:bg-[#FCC822] after:rounded-full after:z-50
                ">
      </li>
      <li class="relative w-[40px] md:w-[150px] text-center text-sm font-light italic
            before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 
            before:bg-[#FCC822]
            after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-6 after:h-6
            after:bg-[#FCC822] after:rounded-full after:z-50
                ">
      </li>

      <li class="relative w-[40px] md:w-[150px]  text-center text-sm font-light italic
            before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 
            before:bg-[#FCC822]
            after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-6 after:h-6
            after:bg-[#FCC822] after:rounded-full after:z-50
                ">
      </li>
      <li class="relative w-[40px] md:w-[150px]  text-center text-sm font-light italic
            before:content-[''] before:absolute before:left-[-50%] before:top-[calc(200%+0.5rem)] before:w-full before:h-1 
            before:bg-[#BDBDBD]
            after:content-[''] after:absolute after:left-[50%] after:top-[200%] after:w-6 after:h-6 
            after:bg-[#BDBDBD] after:rounded-full after:z-50
                ">
      </li>
    </ol>
  </nav>

  <div id="question_title" class="md:py-[50px] md:px-[30px] py-[30px] px-[15px] bg-[#FCC822] text-white md:text-[30px] text-[24px]  mb-[15px] md:mb-[30px]">
    <!-- An interface design application that runs in the browser with team-based collaborative design projects -->
  </div>

  <div class="grid gap-x-[45px] gap-y-[20px]  sm:grid-cols-2  md:grid-cols-4">

    <ul>
      <li>
        <input type="radio" name="answer" class="answer" data-id="answer_a">
        <label id="answer_a" for="a"></label>
      </li>
      <li>
        <input type="radio" name="answer" class="answer" data-id="answer_b">
        <label id="answer_b" for="b"></label>
      </li>
      <li>
        <input type="radio" name="answer" class="answer" data-id="answer_c">
        <label id="answer_c" for="c"></label>
      </li>
      <li>
        <input type="radio" name="answer" class="answer" data-id="answer_d">
        <label id="answer_d" for="d"></label>
      </li>


      <input type="hidden" name="answerTrue" id="answerTrue">
      <input type="hidden" name="totalQuestion" id="totalQuestion">
    </ul>

    <!-- <div class="bg-[#D1D1D1] text-black p-[20px] question" data-target="question_a">
      <span>A</span>
      <p class="font-semibold text-[21px]" id="question_a">FIGMA</p>
    </div>

    <div class="bg-[#D1D1D1] text-black p-[20px] question" data-target="question_b">
      <span>B</span>
      <p class="font-semibold text-[21px]" id="question_b">FIGMA</p>
    </div>


    <div class="bg-[#D1D1D1] text-black p-[20px] question" data-target="question_c">
      <span>C</span>
      <p class="font-semibold text-[21px]" id="question_c">FIGMA</p>
    </div>

    <div class="bg-[#D1D1D1] text-black p-[20px] question" data-target="question_d">
      <span>D</span>
      <p class="font-semibold text-[21px]" id="question_d">FIGMA</p>
    </div> -->

  </div>


  <div class="clear-both flex justify-between mt-[30px] md:mt-[100px]">
    <!-- <button class="button button--secondary sm:ml-14" id="btnPrevious">
      <i class="fa fa-caret-left" aria-hidden="true"></i>
      Previous</button> -->
    <button class="button button--primary sm:mr-14" id="btnNext">
      Next
      <i class="fa fa-caret-right" aria-hidden="true"></i>
    </button>
  </div>
</section>


<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

  <div class="modal-container bg-white w-11/12 md:max-w-2xl lg:max-w-3xl mx-auto shadow-lg z-50 overflow-y-auto">

    <!-- Add margin if you want to see some of the overlay behind the modal-->
    <div class="modal-content py-8 text-left px-6">
      <!--Title-->
      <!--Body-->
      <div class="md:p-[50px] p-[30px] text-center bg-contain bg-no-repeat bg-center" style="background-image: url('<?= __BASE_URL__ . '/public/result.png' ?>');">
        <p class="text-white text-[26px] md:text-[36px]">Your score</pc>
        <div id="scored" class="text-[70px] md:text-[150px] text-white text-center"></div>
      </div>

      <button class="button button--primary text-[18px] float-right mb-4" id="buttonComplete" >Complete</button>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {


    const question_title = document.querySelector('#question_title');
    const answers = document.querySelectorAll('.answer');
    const answer_a = document.querySelector('#answer_a');
    const answer_b = document.querySelector('#answer_b');
    const answer_c = document.querySelector('#answer_c');
    const answer_d = document.querySelector('#answer_d');

    let currentQuestion = 0;
    let scored = 0;
    load();


    function load() {
      removeAnswer();

      const dataQuestion = $.ajax({
        type: "GET",
        url: "<?= __BASE_URL__ . '/client/quiz/dataPlay' ?>",
        dataType: "json",
        success: function(res) {
          const data = JSON.parse(res);

          const quiz = data[currentQuestion];

          question_title.innerText = quiz.question_title;
          answer_a.innerText = quiz.answer_a;
          answer_b.innerText = quiz.answer_b;
          answer_c.innerText = quiz.answer_c;
          answer_d.innerText = quiz.answer_d;
          document.querySelector('#answerTrue').value = quiz.answer;
          document.querySelector('#totalQuestion').value = data.length;
        }
      });

    }

    function getAnswer() {

      let answer = null;

      answers.forEach(el => {

        if (el.checked) {
          answer = el.dataset.id
        }

      });
      return answer;
    }

    function removeAnswer() {
      answers.forEach(el => {
        el.checked = false
      });
    }

    // btnPrevious.addEventListener('click', function() {
    //   if (currentQuestion === 0) {
    //     currentQuestion = size - 1;
    //   } else {
    //     currentQuestion--;
    //   }
    //   const answer = getAnswer();
    //   load();
    // })

    btnNext.addEventListener('click', function() {

      // if (currentQuestion === size - 1) {
      //   curSlide = 0;
      // } else {
      //   currentQuestion++;
      // }
      const answer = getAnswer();
      currentQuestion++;

      if (answer) {
        if (answer === document.querySelector('#answerTrue').value) {
          scored++;
        }
      }

      if (currentQuestion < document.querySelector('#totalQuestion').value) {
        load();
      } else {

        document.querySelector('#scored').innerText = scored;
        toggleModal();
      }

      load();
    })


  });
</script>


<script>
  var openModal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openModal.length; i++) {
    openModal[i].addEventListener('click', function(event) {
      event.preventDefault()
      toggleModal()
    })
  }

  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)


  function toggleModal() {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }
</script>