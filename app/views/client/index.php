<div class="grid md:grid-cols-2 gap-x-[10px] justify-between pt-[50px]">
  <div class="md:ml-[70px] mt-[30px] self-center text-center md:text-left">
    <div class="text-[38px] text-[#333333] font-medium leading-[44px]">
      Learn <br class="hidden md:block">
      new concepts <br class="hidden md:block">
      for each question
    </div>
    <p class="text-[20px] my-[30px]"> - We help you prepare for exams and quizzes</p>
    <div>
      <button class="modal-open  button button--primary">Start solving</button>
    </div>
  </div>
  <div class="md:w-full w-2/3 m-auto">
    <img class="w-full" srcset="<?= __BASE_URL__  . '/public/hero.png' ?>" alt="">
  </div>
</div>



<!--Modal-->
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
  <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

  <div class="modal-container bg-white w-11/12 md:max-w-2xl lg:max-w-3xl mx-auto shadow-lg z-50 overflow-y-auto">

    <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
      </svg>
      <span class="text-sm">(Esc)</span>
    </div>

    <!-- Add margin if you want to see some of the overlay behind the modal-->
    <div class="modal-content py-4 text-left px-6">
      <!--Title-->
      <div class="flex justify-between items-center pb-3">
        <div></div>
        <div class="modal-close cursor-pointer z-50">
          <svg class="fill-current text-[#D1D1D1]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
          </svg>
        </div>
      </div>

      <!--Body-->
      <div class="md:p-[50px] p-[30px] text-center">
        <h3 class="font-semibold text-[38px] leading-[40px] text-[#333333] mb-[20px]">
          Choose your favorite topic
        </h3>
        <p class="text-[16px] leading-[18px]"> Select more than 5 topics to start quiz</p>

        <div class="p-[15px] md:p-[30px] grid md:grid-cols-4 sm:grid-cols-3 lg:grid-cols-5 grid-cols-1 gap-[30px]" id="topicContainer">

          <!-- <div class="cursor-pointer topic flex justify-center items-center">
            <span class="bg-[#FCC822]  p-[5px] text-[16px] font-semibold  text-[#333333]">TagBadge</span>
            <span class="chose bg-black p-[7px] text-white text-[18px] hidden">X</span>
          </div> -->

        </div>
      </div>

      <!--Footer-->
      <div class="flex justify-end pt-2">
        <button class="button button--primary" id="startQuiz">Start Quiz</button>
      </div>

    </div>
  </div>
</div>

<script>
  async function getResponse() {
    const response = await fetch(
      '<?= __BASE_URL__ . '/admin/topics/list' ?>', {
        method: 'GET',
      }
    );
    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.json();

    return data;
  }

  getResponse().then(data => {

    const html = data.data.map((el, index) =>
      `<div class="cursor-pointer topic flex justify-center items-center" data-id="${el.topic_id}">
      <span class="bg-[#D1D1D1] p-[5px] text-[16px] font-semibold  text-[#333333]">${el.topic_name}</span>
      <span class="chose bg-black p-[7px] text-white text-[18px] hidden">X</span>
      </div>`
    ).join('');

    document.querySelector('#topicContainer').innerHTML = html


    const topics = document.querySelectorAll('.topic');


    const listTopicId = [];

    const buttonStart = document.querySelector('#startQuiz');

    topics.forEach(el => {

      el.addEventListener('click', function(e) {
        if (el.querySelector('span').classList.contains('active')) {
          el.querySelector('span').classList.remove('active')
          el.querySelector('span.chose').classList.add('hidden')
          var index = listTopicId.indexOf(el.dataset.id);
          listTopicId.splice(index, 1);
        } else {
          listTopicId.push(el.dataset.id)
          el.querySelector('span.chose').classList.remove('hidden')
          el.querySelector('span').classList.add('active')
        }
      })
    })


    buttonStart.addEventListener('click', function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "<?= __BASE_URL__ . '/client/quiz/start' ?>",
        data: {
          data: listTopicId
        },
        dataType: "json",
        success: function(res) {
          if (res.redirect) {
            setTimeout(() =>
              window.location.href = res.redirect, 1500)
          }
        }
      });

    })


  })



  var openModal = document.querySelectorAll('.modal-open')
  for (var i = 0; i < openModal.length; i++) {
    openModal[i].addEventListener('click', function(event) {
      event.preventDefault()
      toggleModal()
    })
  }

  const overlay = document.querySelector('.modal-overlay')
  overlay.addEventListener('click', toggleModal)

  var closeModal = document.querySelectorAll('.modal-close')
  for (var i = 0; i < closeModal.length; i++) {
    closeModal[i].addEventListener('click', toggleModal)
  }

  document.onkeydown = function(evt) {
    evt = evt || window.event
    var isEscape = false
    if ("key" in evt) {
      isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
      isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains('modal-active')) {
      toggleModal()
    }
  };


  function toggleModal() {
    const body = document.querySelector('body')
    const modal = document.querySelector('.modal')
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle('modal-active')
  }
</script>