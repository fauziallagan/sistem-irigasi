<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="irigasi tetes" />
    <meta name="author" content="ROBOTIKA DAN MULTIMEDIA UNIVERSITAS GUNADARMA" />
    <title>IRIGASI TETES</title>
    <link href="css/styles.css" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <script data-search-pseudo-elements defer
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="styl
        esheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
  </head>
  <style>
    .nav-scroll.scrolled {
      background-color: #03a9f4 !important;
      transition: background-color 0.5 ease-in;
    }
    .client{
    width: 50%;
    }
.batas-footer{
  background-color: transparent;
width: 30%;
}
    .c-item {
      height: 480px;
    }

    .c-img {
      height: 100%;
      object-fit: cover;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    img {
      max-width: 100%;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 700;
    }


    a {
      text-decoration: none;
    }

    li {
      list-style-type: none;
    }

    header {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1em;
      z-index: 999;
    }

    h2,
    h3 {
      text-transform: uppercase;
    }

    header .logo {
      color: #fff;
      cursor: pointer;
    }

    .showcase {
      position: relative;
      right: 0;
      width: 100%;
      min-height: 100vh;
      padding: 1em;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #111;
      transition: all 0.3s ease;
      z-index: 2;
    }

    .showcase.active {
      right: 100%;
    }

    .showcase video {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      object-fit: cover;
      opacity: 0.25;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #78c3fb;
      mix-blend-mode: overlay;
    }

    .text {
      position: relative;
      z-index: 10;
    }

    .text h2 {
      color: #fff;
      font-size: 2rem;
      font-weight: 700;
      line-height: 1em;
    }

    .text h3 {
      font-size: 2.5em;
      font-weight: 700;
      color: #fff;
      line-height: 1em;
    }

    .text p {
      font-size: 1.1em;
      color: #fff;
      margin: 1.25em 0;
      font-weight: 400;
    }

    .text a {
      display: inline-block;
      font-size: 1rem;
      background: #fff;
      padding: 10px 30px;
      text-transform: uppercase;
      font-weight: 500;
      margin-top: 10px;
      color: #111;
      letter-spacing: 2px;
      transition: letter-spacing 0.2s ease-in;
    }

    .text a:hover {
      letter-spacing: 6px;
    }

    .social {
      position: absolute;
      z-index: 10;
      bottom: 1.25em;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .social li a {
      display: inline-block;
      filter: invert(1);
      transform: scale(0.5);
      transition: transform 0.3s ease-in;
    }

    .social li a:hover {
      transform: scale(0.5) translateY(-0.94em);
    }

    .social>*+* {
      margin-left: 1.25em;
    }

    .menu {
      position: absolute;
      top: 0;
      right: 0;
      width: 100%;
      height: 100%;
      display: grid;
      place-items: center;
    }

    .menu ul li a {
      font-size: 1.5rem;
      color: #111;
    }

    .menu ul li a:hover {
      color: #03a9f4;
    }

    .menu ul>*+* {
      margin-top: 2.5em;
    }

    .menu .toggle.active {
      filter: invert(1);
    }

    .menu .footer {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      bottom: 0;
      left: 0;
      font-size: 0.65rem;
      width: 100%;
      color: rgb(119, 118, 118);
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (-webkit-min-device-pixel-ratio: 1) {
      header {
        padding: 3em;
      }

      .showcase {
        padding: 3em;
      }

      .text p {
        max-width: 650px;
        font-size: 1.3rem;
      }

      .text h2 {
        font-size: 5rem;
      }

      .text h3 {
        font-size: 4rem;
      }

      .text a {
        font-size: 1.5rem;
      }

      .toggle {
        top: 2.15em;
      }

      .menu ul li a {
        font-size: 3.5rem;
      }
    }

    @media (min-width: 1024px) {
      .text p {
        max-width: 700px;
      }

      .desktop {
        display: block;
      }

      .desktop ul {
        display: flex;
      }

      .nav__link.nav__link--active {
        color: #fff;
      }

      .nav__link {
        color: #afaeae;
        font-size: 1.5rem;
      }

      .desktop ul>*+* {
        margin-left: 1.5em;
      }

      .toggle {
        display: none;
      }
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2) {
      .text h2 {
        font-size: 1.3rem;
      }

      .text h3 {
        font-size: 1rem;
      }

      .text p {
        font-size: 0.75rem;
        max-width: 500px;
      }

      .menu ul li a {
        font-size: 0.85rem;
      }

      .menu ul>*+* {
        margin-top: 1.5em;
      }
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: landscape) {
      .text h2 {
        font-size: 1rem;
      }

      .text h3 {
        font-size: 1.5rem;
      }

      .text p {
        font-size: 0.85rem;
        max-width: 600px;
      }

      .menu ul li a {
        font-size: 1rem;
      }

      .menu ul>*+* {
        margin-top: 1.5em;
      }
    }

    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: landscape) {
      .text h2 {
        font-size: 1rem;
      }

      .text h3 {
        font-size: 1.5rem;
      }

      .text p {
        font-size: 0.85rem;
        max-width: 600px;
      }

      .menu ul li a {
        font-size: 1rem;
      }

      .menu ul>*+* {
        margin-top: 1.5em;
      }
    }

    @media only screen and (min-device-width: 375px) and (max-device-width: 812px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: landscape) {
      .text h2 {
        font-size: 1rem;
      }

      .text h3 {
        font-size: 1.5rem;
      }

      .text p {
        font-size: 0.85rem;
        max-width: 600px;
      }

      .text a {
        font-size: 0.85rem;
      }

      .menu ul li a {
        font-size: 1rem;
      }

      .menu ul>*+* {
        margin-top: 1.5em;
      }
    }

    @media only screen and (min-device-width: 411px) and (max-device-width: 823px) and (-webkit-min-device-pixel-ratio: 3) and (orientation: landscape) {
      .text h2 {
        font-size: 1rem;
      }

      .text h3 {
        font-size: 1.5rem;
      }

      .text p {
        font-size: 0.85rem;
        max-width: 600px;
      }

      .text a {
        font-size: 0.85rem;
      }

      .menu ul li a {
        font-size: 1rem;
      }

      .menu ul>*+* {
        margin-top: 1.5em;
      }
    }
  </style>

  <body>
    <div id="layoutDefault">
      <div id="layoutDefault_content">
        <section class="showcase">
          <header>
            <nav class="navbar  navbar-expand-lg  navbar-dark fixed-top nav-scroll ">
              <div class="container px-5">
                <a class="navbar-brand text-white" href="index.php">IRIGASI TETES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation"><i data-feather="menu"></i></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto me-lg-5">
                    <li class="nav-item"><a class="nav-link" href="#layoutDefault">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#feature">Feature</a></li>
                    <li class="nav-item"><a class="nav-link" href="#showcase">Showcase</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="index.html">How to Use</a></li> -->
                  </ul>
                  <a href="index.php">
                    <button class="btn btn-info">
                      Dashboard
                    </button>
                  </a>

                </div>
              </div>
            </nav>
          </header>

          <video src="./assets/video.mp4" muted loop autoplay></video>
          <div class="overlay"></div>

          <div class="text">
            <h1 class="page-header-ui-title text-white">IRIGASI TETES</h1>
            <p class="page-header-ui-text mb-5 land-text">Aplikasi Pengendali Sistem Irigasi Tetes Dan Pemantau Npk,
              Soil
              Moisture , Ph adalah sebuah system yang dapat memantau keadaan tanah, kelembaban dan tingkat keasaman
              menggunakan beberapa sensor sekaligus melakukan pengendalian irigasi dengan menggunakan sensor kelembaban
              sebagai media</p>
            <a class="btn btn-teal fw-100 me-2 " href="#about">
              Telusuri Lebih lanjut
              <i class="ms-1" data-feather="arrow-right"></i>
            </a>
          </div>
        </section>
        <!-- sec 2 -->

        <section class="bg-white py-10">
          <div class="container px-5">
            <div class="head">
              <h2 class="text-center" id="about"> About</h2>
              <hr>
            </div>
            <div class="row gx-5 align-items-center justify-content-center">
              <div class="col-md-9 col-lg-6 order-1 order-lg-0" data-aos="fade-right">
                <div class="content-skewed content-skewed-right"><img class="img-fluid shadow-md rounded-3 w-100"
                    src="./assets/img/irigasi/tancep.jpg" alt="No Image View" /></div>
              </div>
              <div class="col-lg-6 order-0 order-lg-1 mb-5 mb-lg-0" data-aos="fade-left">
                <div class="mb-5">
                  <h2 class="text-center">apa itu Irigasi Tetes?</h2>
                  <hr>
                  <p class="lead" align="justify">metode irigasi yang digunakan untuk menghemat air dan pupuk dengan
                    membiarkan air menetes secara pelan-pelan ke akar tanaman, baik melalui permukaan tanah atau
                    langsung
                    ke akar melalui jaringan katup, pipa dan emitor.Sistem irigasi ini cocok diterapkan pada lahan
                    kering
                    dengan topografi yang relatif landai. Cara kerja dari irigasi tetes ini adalah dengan menampung air
                    dalam wadah dan mengalirkannya ke tanaman menggunakan tekanan gaya gravitasi melalui lubang yang
                    telah
                    dibuat sesuai dengan kebutuhan tanaman.
                    Bila sistem irigasi lain menerapkan prinsip air bertekanan tinggi, tidak demikian halnya dengan
                    sistem
                    irigasi tetes. Air dibuang secara lambat, mulai dari tetes demi tetes, namun menyebar akurat sampai
                    ke
                    bagian akar tanaman. Irigasi tetes ini biasanya menggunakan selang drip yang disusun sedemikian rupa
                    untuk mendistrikbusikan air ke tanaman. Sekarang ini banyak dijual berbagai jenis selang drip dengan
                    beragam merek dan kualitas, mulai dari yang paling murah hingga ke yang paling mahal tergantung dari
                    kualitas dan modelnya.</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- sec 3 -->
        <section class="bg-white py-10">
          <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
              <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">

                <div class="mb-5" id="feature">
                  <h2>"Sistem Monitoring Lahan Pertanian PPU"</h2>
                  <p class="lead" align="justify">sebuah sistem yang dapat memonitoring keadaan tanah dan juga mengatur
                    tingkat keperluan air dari lahan sehingga lahan tidak kekeringan. Sistem ini juga dibuat sebagai
                    bahan
                    acuan terhadap tingkat nutrisi yang diberikan ke tanaman berdasarkan hasil baca yang dihasilkan
                    sensor. Nilai baca sensor sendiri dihasilkan dari masing-masing client yang ada pada beberapa blok
                    lahan yang kemudian hasil nilai baca oleh sensor yang dihasilkan diteruskan oleh client menuju
                    server
                    sehingga dapat ditampilkan di halaman webo?</p>
                </div>
                <div class="mb-5">
                  <h2>Pengembangan</h2>
                  <p class="lead" align="justify">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, maiores sint. Laborum
                    deserunt delectus pariatur, necessitatibus dolore dicta tempore in cumque nemo dolor recusandae
                    libero
                    vero odit incidunt ex saepe! Quisquam, earum eaque beatae eos cum laborum pariatur ad dolore
                    blanditiis enim ea ab fuga quo sapiente, iste non quidem?</p>
                  <p class="lead" align="justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet, eos.
                    Qui
                    dolorum perspiciatis velit repellat sunt quibusdam nesciunt, earum et consectetur aspernatur modi
                    quis
                    sapiente ab natus tenetur laudantium nobis numquam expedita recusandae illum pariatur hic ducimus
                    deserunt id! Voluptatem magni culpa porro deleniti recusandae sunt incidunt, neque est sint.
                  </p>
                </div>
              </div>
              <div class="col-md-9 col-lg-6" data-aos="slide-left">
                <div class="mb-4">
                  <div class="content-skewed content-skewed-left"><img class="img-fluid shadow-lg rounded-3"
                      src="assets/img/irigasi/pemasangan.jpg" /></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Sec 4 -->
        <section class="py-3">
          <h1 class="text-center show bg-transparent" id="showcase">
            Show Case
          </h1>
          <br>
          <div id="hero-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active c-item">
                <img src="https://source.unsplash.com/random" class=" w-100 c-img" alt="NO IMAGE FOUND!">
              </div>
              <div class="carousel-item c-item">
                <img src="https://source.unsplash.com/random" class=" w-100 c-img" alt="NO IMAGE FOUND!">
              </div>
              <div class="carousel-item c-item">
                <img src="https://source.unsplash.com/random" class=" w-100 c-img" alt="NO IMAGE FOUND!">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        </section>


        <section class="bg-dark py-5">
          <h1 class="text-center show bg-transparent mb-5" id="partner">
            Sponsored By :
          </h1>
          <br>
          <div class="container px-4">
            <div class="row gx-5">
              <div class="col">
                <img src="./assets/ug.png" class="img-thumbnail rounded client" alt="...">
              </div>
              <div class="col">
                <img src="./assets/ppu.png" class="img-thumbnail rounded client " alt="...">
              </div>
              <div class="col">
                <img src="./assets/kedaireka.png" class="img-thumbnail rounded client" alt="...">
              </div>
              <div class="col">
                <img src="./assets/kampusbaru.png" class="img-thumbnail rounded client" alt="...">
              </div>
               <div class="col">
                <img src="./assets/diktibary.png" class="img-thumbnail rounded client" alt="...">
              </div>
            </div>
          </div>
        </section>

        <div id="layoutDefault_footer">
          <?php include "footer.php" ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
          crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
          $(function () {
            $(document).scroll(function () {
              var $nav = $(".nav-scroll");
              $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
            });
          });

          AOS.init({
            disable: 'mobile',
            duration: 600,
            once: true,
          });
        </script>
  </body>

</html>