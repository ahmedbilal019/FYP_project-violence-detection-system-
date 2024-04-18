
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<body>
<?php
include 'message.php';
?>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="">violence detection system</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#upload">Upload Video</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.html">Logout</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/sld-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to Violence Detection System</h2>
              <p class=" txt animate__animated animate__fadeInUp scrollto">A modern system to detect violence and
                non-violence.</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/sld-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Solving Violence Issues Efficiently & Accuratly </h2>
              <p class="txt animate__animated animate__fadeInUp scrollto">Generate accurate results by using deep learning algorithms.</p>

            </div>
          </div>
        </div>



        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/sld-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Making a Crime Free Society.</h2>
              <p class=" txt animate__animated animate__fadeInUp scrollto">Reducing human efforts by automated system. </p>

            </div>
          </div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">



    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>

        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <video autoplay muted loop id="myVideo">
              <source src="assets/videos/V_9.mp4" type="video/mp4">
            </video>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Violence Detection System:</h3>
            <p>
              Violence is defined as the intentional use of physical force or power, threatened or actual, against
              oneself or a group of community that results in an injury, death or psychological harm.
            </p>
            <p>Violence Detection System is a stand-alone web application developed to distinguish between violent and
              non-violent content within videos. This project prioritizes accuracy and ensures enhanced safety by
              efficiently identifying violent elements in videos.</p>
            <h3>Background working:</h3>
            <p>
              In this project we use mobilenetv2 algorithm. MobileNetV2 is a remarkably efficient deep learning model
              architecture that was designed for computer vision tasks, with a particular focus on image classification
              and object detection.
            </p>
            <p>To use this system, the user must be Signup or Login in the
              system. After login, the user upload a video for detection. The system use the backend algorithm and
              detect that the video contain violence or not. </p>
            <ul>
              <h3>Our Objectives:</h3>
              <li><i class="bi bi-check-circled"></i> To solve violation issue using modern technologies. </li>
              <li><i class="bi bi-check-circled"></i> To reduce the violence rate and other criminal activities.</li>
              <li><i class="bi bi-check-circled"></i>To handle situation in correct and efficient way. </li>
            </ul>

          </div>

      </div>
    </section><!-- End About Us Section -->



    <!-- ==== Uploading Video Section ==== -->
      <section id="upload" class="uplaod">
      <form id="uploadForm" enctype="multipart/form-data" method="post" onsubmit="event.preventDefault(); uploadVideo();">

        <div class="container">
          <div class="section-title">
            <h2>Upload video </h2>

          </div>
          <div class="row">
            <div class="text-primary">
              <p>If you want to detect video,
                 just click on "choose file" button and select video clip for violence detection.</p>
            </div>
            <div class="fileUpload">
              <input type="file" name="upload" id="" accept="video/*" required>
            </div>
            <video id="videoPlayer"  controls style="display:none;">
             Your browser does not support the video tag.
            </video>
            <div class="button">
              <button type="submit" class="submit">Submit</button>
            </div>
          </div>

        </div>

        
        </form>

      </section>
    <!-- End Upload Video Section -->

    
    


    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/img3.jpeg" alt="">
              <h4>Ahmed Bilal</h4>
              <span>Student</span>
              <p>
                BCS student from Comsats University Attock Campus
              </p>
              <div class="social">
                <a href="https://mail.google.com">sp20-bcs-019@cuiatk.edu.pk</i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/img2.jpeg" alt="">
              <h4>Muhammad Usman</h4>
              <span>Student</span>
              <p>
                BCS student from Comsats University Attock Campus
              </p>
              <div class="social">
                <a href="https://mail.google.com">fa19-bcs-124@cuiatk.edu.pk</i></a>
              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/img1.jpeg" alt="">
              <h4>Dr. Khalid Iqbal</h4>
              <span>Project Supervisor</span>
              <p>
                Associate Professor Comsats University Attock Campus
              </p>
              <div class="social">
                <a href="https://mail.google.com">khalidiqbal@cuiatk.edu.pk</i></a>
              
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


    <script>

      async function uploadVideo() {
            // const formData = new FormData(document.getElementById('uploadForm'));
            // const videoFile = formData.get('video');
            const fileInput = document.getElementById('uploadForm').elements['upload'];
            const videoFile = fileInput.files[0];

            // Read video data as bytes
            const videoData = await readFileAsBytes(videoFile);
            console.log('Request URL:', 'http://127.0.0.1:8000/api/uploadfile/');

            try {
                const response = await fetch('http://127.0.0.1:8000/api/uploadfile/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        video: Array.from(videoData), // Convert Uint8Array to a regular array
                    }),
                });

                if (response.ok) {

                    const data = await response.json();
                    // document.getElementById('playButton').style.display = 'block';
                    playVideo(data.video_path);
                } else {
                    throw new Error('Error uploading video.');
                }
            } catch (error) {
                console.error(error);
                alert('Error uploading video.');
            }
        }

        // async function readFileAsBytes(file) {
        //     return new Promise((resolve, reject) => {
        //         const reader = new FileReader();
        //         reader.onload = (event) => {
        //             resolve(new Uint8Array(event.target.result));
        //         };
        //         reader.onerror = (error) => {
        //             reject(error);
        //         };
        //         reader.readAsArrayBuffer(file);
        //     });
        // }
        async function readFileAsBytes(file) {
              return new Promise((resolve, reject) => {
                  const reader = new FileReader();
                  reader.onload = (event) => {
                      resolve(new Uint8Array(event.target.result));
                  };
                  reader.onerror = (error) => {
                      reject(error);
                  };
                  reader.readAsArrayBuffer(file);
              });
          }

          function playVideo(videoPath) {
            const videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.style.display = 'block';
            videoPlayer.src = videoPath;  // Set the video path explicitly
            videoPlayer.play();
        }
    </script>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


  <div class="copyright">
      &copy; Copyright Comsats Attock. All Rights Reserved
    </div>
    Developed by <p> Bilal & Usman</p>



  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  



</html>