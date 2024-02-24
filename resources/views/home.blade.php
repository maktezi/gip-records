<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DOLE-GIP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/dolero8logo.png" rel="icon">
  <link href="assets/img/dolero8logo.png" rel="dole logo">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl">
            <a href="\" class="logo d-flex align-items-center">
                <a data-aos="fade-down" id="date"></a>
            </a>
        </div>
  </header>

  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="text-center col-lg-6">
            <img src="images/gip.png" data-aos="fade-down" class="img-fluid" width="300" height="300">
            <h2 data-aos="fade-up">GIP Monitoring</h2>
            <a data-aos="fade-up" data-aos-delay="200" href="/admin" class="btn-1">ENTER</a>
          </div>
        </div>
      </div>
    </div>
    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
      <div class="carousel-item active" style="background-image: url(images//back1.jpeg)"></div>
    </div>

  </section>


  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/js/main.js"></script>

    <script>
        var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        function updateTime() {
            var currentDate = new Date();
            var monthName = months[currentDate.getMonth()];
            var day = currentDate.getDate();
            var year = currentDate.getFullYear();
            var time = currentDate.toLocaleTimeString();
            var dateTimeString = monthName + ' ' + day + ', ' + year + ' | ' + time;
            document.getElementById('date').innerHTML = dateTimeString;
        }
        setInterval(updateTime, 1000);
    </script>

</body>

</html>
