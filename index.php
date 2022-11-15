<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Deditech task</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
  <style>
      .main-container {
          margin-top: 13rem;
      }

      .know-more-block {
          margin-top: 12rem;
      }
  </style>
</head>
<body>
<div class="main-container text-center">
  <button class="main-button btn btn-info text-white animate__animated animate__zoomInDown">Click me!</button>

  <div class="base64-block d-none">
    <h1 class="mt-3">Who is Tricolici Serghei? Base64 decode to find out</h1>
    <p class="base64-block__code mt-3"></p>
  </div>

  <div class="know-more-block d-none">
    <h2>Want to know more about Serghei?</h2>
    <button class="secondary-button btn btn-info text-white mt-3 animate__animated animate__zoomInDown">Don't click
    </button>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {
    $('.main-button').click(function () {
      $('.base64-block').removeClass('d-none');
      $(this).addClass('animate__zoomOutUp');

      $.post("src/php/API.php", function (data) {
        data = JSON.parse(data);
        animateEncoding(data.parts, data.code);
      });

      setTimeout(() => {
        $('.know-more-block').removeClass('d-none').addClass('animate__animated animate__fadeInDown');
      }, 3500);
    });

    $('.secondary-button').click(function () {
      window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley', '_blank');
      $(this).text('Ouch..');

      setTimeout(() => {
        $('.know-more-block').append($('<h4 class="mt-3">I also love humour. You\'ve got Rickrolled ;)</h4>'))
      }, 1500);
    });
  });

  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }

  async function animateEncoding(positions, splitCode) {
    let minWidth = 0;

    while (positions) {
      let position = positions.shift();

      if (position.length < minWidth) {
        continue;
      }

      minWidth = position.length;
      await sleep(200);
      $('.base64-block__code').text(position.map((item) => splitCode[item]).join(''));
    }
  }
</script>
</body>
</html>



