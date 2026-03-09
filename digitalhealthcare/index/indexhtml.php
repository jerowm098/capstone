<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="indexstyle.css">

    <title>Digital Healthcare | Home</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    
<a class="navbar-brand fw-bold d-flex align-items-center" href="#">
      <img src="logo1.png" alt="Logo" class="brand-logo me-2">
      
      <div class="brand-text-wrapper">
        <span class="d-block">PUPBC</span>
        <span class="text-secondary d-block">CareLink</span>
      </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- <ul class="navbar-nav mx-auto text-center"> -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li> -->



        <!-- STYLE FOR DROPDOWN NAVBAR -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#services" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services <i class="bi bi-chevron-down ms-1" style="font-size: 0.8rem;"></i>
            </a>
            <ul class="dropdown-menu animate__animated animate__fadeInUp" aria-labelledby="servicesDropdown">
                <li><a class="dropdown-item" href="appointment_form.php"><i class="bi bi-calendar-check me-2"></i>Book Appointment</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-capsule me-2"></i>Digital Pharmacy</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-shield-check me-2"></i>Health Tracking</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#services">View All Services</a></li>
            </ul>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="#doctors">Doctors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#review">Review</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contact">Contact Us</a>
        </li>


        <!-- STYLE FOR DROPDOWN NAVBAR -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="portalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Portals <i class="bi bi-chevron-down ms-1" style="font-size: 0.8rem;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="portalDropdown">
                <li><a class="dropdown-item" href="../login/studentloginhtml.php">Student Portal</a></li>
                <li><a class="dropdown-item" href="../login/loginhtml.php">Doctor Portal</a></li>
            </ul>
        </li>

      </ul>

      <div class="d-flex justify-content-center">
        <!-- <a href="loginhtml.php" class="btn btn-login">Login</a> -->
         <!-- <a href="../portal/portal.html" class="btn btn-login">Login</a> -->
        <a href="../portal/chooseportal.php" class="btn btn-login">Login</a>
    </div>
    </div>
  </div>
</nav>

<section id="home" class="p-0">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="6000" data-bs-pause="hover">
    
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
      
      <div class="carousel-item active second-section">
        <div class="container h-100 d-flex align-items-center">
          <div class="hero-box">
            <h1 class="display-3 fw-bold mb-4 second-section-header">
              <span class="text-pup">PUPBC</span> 
              <span class="text-care">Care</span><span class="text-link">Link</span>
            </h1>
            <p class="lead mb-5 text-muted second-section-p">
              <span class="p-top">Official Clinic Support Website | Connected to the</span> <br>
              <span class="p-bottom">Polytechnic University of the Philippines Biñan Campus.</span>
            </p>
         <!--    <div class="d-grid gap-3 d-sm-flex justify-content-sm-start">
              <a href="#about" class="btn btn-outline-dark btn-lg px-5 py-3">View Privacy</a>
            </div> -->
          </div>
        </div>
      </div>

      <div class="carousel-item" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('bg2.png');">
        <div class="container h-100 d-flex align-items-center">
          <div class="hero-box">
            <h1 class="display-3 fw-bold mb-4">Our Expertise <br>at your Service</h1>
            <p class="lead mb-5 text-muted">
              Your Online Link to PUP BC Health Services<br>
              PUP Biñan Campus Clinic
            </p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-start">
              <a href="#services" class="btn btn-dark btn-lg px-5 py-3">Services</a>
              <!-- <a href="#about" class="btn btn-outline-dark btn-lg px-5 py-3">Learn More</a> -->
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=1200&q=80');">
        <div class="container h-100 d-flex align-items-center">
          <div class="hero-box">
            <h1 class="display-3 fw-bold mb-4">Seamless <br>Appointments</h1>
            <p class="lead mb-5 text-muted">
              Skip the long lines. Book your medical consultation <br>
              online anytime, anywhere within the campus.
            </p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-start">
              <a href="appointment_form.php" class="btn btn-dark btn-lg px-5 py-3">Book Now</a>
            </div>
          </div>
        </div>
      </div>



    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>



<!-- ABOUT SECTION -->
<section id="about" class="py-5 bg-white">
  <div class="container py-5">
    <div class="row align-items-center">
      
      <div class="col-md-6 mb-5 mb-md-0">
        <div class="about-image-wrapper position-relative">
          <img src="https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=800&q=80" 
               alt="Digital Healthcare Team" 
               class="img-fluid rounded-4 shadow-lg main-about-img">
          <div class="experience-badge shadow-lg d-none d-lg-block">
             <span class="fs-2 fw-bold d-block">24/7</span>
             <small class="text-uppercase">Digital Care</small>
          </div>
        </div>
      </div>

      <div class="col-md-6 ps-md-5">
        <h6 class="text-uppercase fw-bold mb-2 tracking-widest about-sub-label">About Our Clinic</h6>
        <h2 class="display-5 fw-bold mb-4">Leading the Future of Digital Care</h2>
        
        <p class="lead text-dark mb-4">
          We are more than just a website; we are a dedicated network of healthcare professionals committed to making expert medical advice accessible to everyone.
        </p>
        
        <p class="text-muted mb-4">
          Founded in 2026, our mission is to simplify the healthcare journey. By merging advanced technology with clinical excellence, we provide a secure platform for patient management and care.
        </p>

        <div class="row g-4 mb-5">
          <div class="col-6 col-sm-4">
            <h4 class="fw-bold mb-0">100%</h4>
            <small class="text-muted">Secure Records</small>
          </div>
          <div class="col-6 col-sm-4">
            <h4 class="fw-bold mb-0">Fast</h4>
            <small class="text-muted">Consultation</small>
          </div>
        </div>

        <a href="#contact" class="btn btn-about-primary btn-lg shadow-sm">Learn more about us</a>
      </div>

    </div>
  </div>
</section>



<!-- SERVICES SECTION -->
<section id="services" class="py-5 bg-white">
  <div class="container py-5">
    
    <div class="row justify-content-center mb-4">
      <div class="col-md-7 text-center">
        <h6 class="text-uppercase fw-bold mb-2 tracking-widest text-maroon">Our Expertise</h6>
        <h2 class="display-5 fw-bold text-dark">Comprehensive Care</h2>
        <div class="header-line mx-auto mb-3"></div>
        <p class="text-muted">Tailored digital solutions designed to put your health first.</p>
      </div>
    </div>

    <div class="row g-4">
      
<div class="col-md-4">
  <div class="card service-card h-100 border-0 p-4">
    <div class="d-flex align-items-center mb-4">
      <div class="service-icon-box me-3">
        <i class="bi bi-calendar-check"></i> </div>
      <h4 class="fw-bold mb-2">Book Appointment</h4>
    </div>
    <p class="text-muted mb-4">
      Schedule a virtual or face-to-face consultation with our campus medical team at your most convenient time.
    </p>
    <div class="mt-auto">
       <a href="appointment_form.php" class="service-link">Set Schedule <i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</div>

      <div class="col-md-4">
        <div class="card service-card h-100 border-0 p-4">
          <div class="d-flex align-items-center mb-4">
            <div class="service-icon-box me-3">
              <i class="bi bi-capsule"></i>
            </div>
            <h4 class="fw-bold mb-2">Digital Pharmacy</h4>
          </div>
          <p class="text-muted mb-4">Manage your prescriptions digitally and have your medications delivered directly to your doorstep within hours.</p>
          <div class="mt-auto">
             <a href="#" class="service-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card service-card h-100 border-0 p-4">
          <div class="d-flex align-items-center mb-4">
            <div class="service-icon-box me-3">
              <i class="bi bi-shield-check"></i>
            </div>
            <h4 class="fw-bold mb-2">Health Tracking</h4>
          </div>
          <p class="text-muted mb-4">Securely store and access your medical history and lab results anytime through our encrypted database.</p>
          <div class="mt-auto">
             <a href="#" class="service-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- DOCTORS SECTION -->
<section id="doctors" class="py-4 bg-white">
  <div class="container pt-5 pb-4">
    
    <div class="row justify-content-center mb-3">
      <div class="col-md-7 text-center">
        <h6 class="text-uppercase fw-bold mb-1 tracking-widest text-maroon">Our Team</h6>
        <h2 class="display-5 fw-bold text-dark">Meet Our Specialists</h2>
        <div class="header-line mx-auto mb-2"></div>
        <p class="text-muted">Highly qualified professionals dedicated to your digital health journey.</p>
      </div>
    </div>

    <div class="row g-4">
      
      <div class="col-md-4">
        <div class="doctor-card p-4 text-center h-100 shadow-sm border">
          <div class="image-container mb-4 position-relative">
            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=400&h=400&q=80" 
                 alt="Doctor" class="img-fluid rounded-circle doctor-profile-img">
          </div>
          <h4 class="fw-bold mb-1">Dr. James Wilson</h4>
          <p class="text-maroon small text-uppercase fw-bold mb-3">Cardiologist</p>
          <p class="text-muted mb-4 px-2">Expert in heart health and remote diagnostic monitoring for campus clinical safety.</p>
          
          <div class="doctor-socials d-flex justify-content-center gap-3">
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-envelope-fill"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-calendar-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="doctor-card p-4 text-center h-100 shadow-sm border">
          <div class="image-container mb-4">
            <img src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=400&h=400&q=80" 
                 alt="Doctor" class="img-fluid rounded-circle doctor-profile-img">
          </div>
          <h4 class="fw-bold mb-1">Dr. Sarah Jenkins</h4>
          <p class="text-maroon small text-uppercase fw-bold mb-3">Pediatrician</p>
          <p class="text-muted mb-4 px-2">Dedicated to providing digital care and health guidance for students and families.</p>
          
          <div class="doctor-socials d-flex justify-content-center gap-3">
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-envelope-fill"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-calendar-plus"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="doctor-card p-4 text-center h-100 shadow-sm border">
          <div class="image-container mb-4">
            <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=400&h=400&q=80" 
                 alt="Doctor" class="img-fluid rounded-circle doctor-profile-img">
          </div>
          <h4 class="fw-bold mb-1">Dr. Michael Chen</h4>
          <p class="text-maroon small text-uppercase fw-bold mb-3">Neurologist</p>
          <p class="text-muted mb-4 px-2">Specializing in telehealth consultations and advanced nervous system health assessment.</p>
          
          <div class="doctor-socials d-flex justify-content-center gap-3">
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-envelope-fill"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-calendar-plus"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- REVIEW SECTION -->
<section id="review" class="py-5 bg-white">
  <div class="container py-5">
    
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center">
        <h6 class="text-uppercase fw-bold text-maroon mb-2 tracking-widest">Testimonials</h6>
        <h2 class="display-5 fw-bold text-dark">Patient Reviews</h2>
        <div class="header-line mx-auto mb-3"></div>
        <p class="text-muted">Hear from those who have experienced our digital care firsthand.</p>
      </div>
    </div>

    <div class="row g-4 mb-5 mt-2">
      <div class="col-md-4">
        <div class="review-card p-4 bg-white shadow-sm h-100 border-top-maroon">
          <div class="mb-3 text-gold">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="text-dark italic mb-4">"The telemedicine service was seamless. I was able to talk to a cardiologist within 20 minutes of booking. Truly a life-saver."</p>
<div class="d-flex align-items-center mt-auto">
  <div class="avatar-circle">JD</div>
  <div class="ms-3">
    <div class="fw-bold text-dark lh-1">Johnathan Doe</div>
    <span class="text-muted small">— Verified Patient</span>
  </div>
</div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="review-card p-4 bg-white shadow-sm h-100 border-top-maroon">
          <div class="mb-3 text-gold">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
          </div>
          <p class="text-dark italic mb-4">"Managing my daughter's prescriptions has never been easier. The digital tracking is clear and the delivery is always on time."</p>
<div class="d-flex align-items-center mt-auto">
  <div class="avatar-circle">MG</div>
  <div class="ms-3">
    <div class="fw-bold text-dark lh-1">Maria Garcia</div>
    <span class="text-muted small">— Mother of two</span>
  </div>
</div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="review-card p-4 bg-white shadow-sm h-100 border-top-maroon">
          <div class="mb-3 text-gold">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
          </div>
          <p class="text-dark italic mb-4">"I was skeptical about digital health, but Dr. Chen was very thorough. The platform is very secure and easy to use."</p>
<div class="d-flex align-items-center mt-auto">
  <div class="avatar-circle">RS</div>
  <div class="ms-3">
    <div class="fw-bold text-dark lh-1">Robert Smith</div>
    <span class="text-muted small">— Retired Engineer</span>
  </div>
</div>
        </div>
      </div>
    </div>

<div class="row mt-2 py-4">
  <div class="col-12">
    <div class="d-flex flex-wrap justify-content-between text-center stats-container">
      
      <div class="stat-group">
        <h2 class="stat-number">1500 +</h2>
        <p class="stat-label">Happy Patients</p>
      </div>

      <div class="stat-group">
        <h2 class="stat-number">120 +</h2>
        <p class="stat-label">Expert Doctors</p>
      </div>

      <div class="stat-group">
        <h2 class="stat-number">15</h2>
        <p class="stat-label">Specialized Clinics</p>
      </div>

      <div class="stat-group">
        <h2 class="stat-number">100 %</h2>
        <p class="stat-label">Secure Records</p>
      </div>

      <div class="stat-group">
        <h2 class="stat-number">4.9 /5</h2>
        <p class="stat-label">Average Rating</p>
      </div>

    </div>
  </div>
</div>

  </div>
</section>




<!-- FOOTER SECTION -->
<footer id="contact" class="py-5">
  <div class="container">
    <div class="row g-5">
      
<div class="col-lg-3 col-md-6">
  <a class="navbar-brand fw-bold d-flex align-items-center mb-3 footer-brand-link" href="#">
    <img src="logo1.png" alt="Logo" class="brand-logo me-2">
    <div class="brand-text-wrapper footer-brand-text">
      <span class="d-block">PUPBC</span>
      <span class="d-block">CareLink</span>
    </div>
  </a>
  <p class="footer-description mb-4">
    Providing trusted health services for the PUP Biñan Campus community. Bridging technology and clinical care since 2026.
  </p>
  <div class="d-flex gap-3">
    <a href="#" class="social-icon"><i class="bi bi-facebook fs-5"></i></a>
    <a href="#" class="social-icon"><i class="bi bi-instagram fs-5"></i></a>
    <a href="#" class="social-icon"><i class="bi bi-youtube fs-5"></i></a>
  </div>
</div>

      <div class="col-lg-3 col-md-6">
        <h6 class="footer-heading mb-4">Quick Links</h6>
        <ul class="list-unstyled footer-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Our Services</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6">
        <h6 class="footer-heading mb-4">Resources</h6>
        <ul class="list-unstyled footer-links">
          <li><a href="#doctors">Find a Doctor</a></li>
          <li><a href="#">Health Blog</a></li>
          <li><a href="#">Emergency Care</a></li>
          <li><a href="#">FAQs</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6">
        <h6 class="footer-heading mb-4">Clinic Hours</h6>
        <ul class="list-unstyled footer-hours small">
          <li class="d-flex justify-content-between mb-2">
            <span>Monday - Friday:</span>
            <span class="text-white">8:00 AM - 8:00 PM</span>
          </li>
          <li class="d-flex justify-content-between mb-2">
            <span>Saturday:</span>
            <span class="text-white">9:00 AM - 5:00 PM</span>
          </li>
          <li class="d-flex justify-content-between">
            <span>Sunday:</span>
            <span class="text-gold fw-bold">Closed</span>
          </li>
        </ul>
      </div>

    </div>

    <div class="row mt-5 pt-4 footer-bottom-border">
      <div class="col text-center">
        <p class="copyright-text mb-0">&copy; 2026 PUPBC CareLink. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>




   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const statNumbers = document.querySelectorAll('.stat-number');
    const statsContainer = document.querySelector('.stats-container');

    // Store original values immediately before any animation logic starts
    statNumbers.forEach(num => {
        if (!num.getAttribute('data-target')) {
            num.setAttribute('data-target', num.innerText);
            // Initialize with 0 so it doesn't "jump" on first load
            const suffix = num.innerText.replace(/[\d.]/g, '');
            num.innerText = "0" + suffix;
        }
    });

    const animateCounter = (el) => {
        // Prevent double-animation if already animating
        if (el.dataset.animating === "true") return;
        el.dataset.animating = "true";

        const rawValue = el.getAttribute('data-target');
        const target = parseFloat(rawValue.replace(/[^\d.]/g, ''));
        const suffix = rawValue.replace(/[\d.]/g, '');
        
        const duration = 2000; // 2 seconds
        let startTime = null;

        const step = (currentTime) => {
            if (!startTime) startTime = currentTime;
            const progress = Math.min((currentTime - startTime) / duration, 1);
            
            const currentCount = progress * target;

            // Formatting logic
            if (target % 1 !== 0) { // If it's a decimal like 4.9
                el.innerText = currentCount.toFixed(1) + suffix;
            } else {
                el.innerText = Math.floor(currentCount) + suffix;
            }

            if (progress < 1) {
                requestAnimationFrame(step);
            } else {
                el.innerText = rawValue;
                el.dataset.animating = "false"; // Animation finished
            }
        };

        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate each number individually
                statNumbers.forEach(num => animateCounter(num));
            } else {
                // Reset to 0 when scrolled away so it can re-animate later
                statNumbers.forEach(num => {
                    const rawValue = num.getAttribute('data-target');
                    const suffix = rawValue.replace(/[\d.]/g, '');
                    num.innerText = "0" + suffix;
                    num.dataset.animating = "false";
                });
            }
        });
    }, { threshold: 0.2 });

    if (statsContainer) {
        observer.observe(statsContainer);
    }
});
</script>
  
  
  </body>
</html>