<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>PUPBC CareLink | University Health System</title>
    
    <!-- Bootstrap 5 + Icons + Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* ----- GLOBAL RESET & VARIABLES ----- */
        :root {
            --pup-maroon: #9C0C20;
            --pup-red: #D51C3D;
            --medical-blue: #475867;
            --sidebar-width: 300px;
        }
        * {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfdfd;
            color: var(--medical-blue);
            overflow-x: hidden;
            width: 100%;
        }
        section {
            scroll-margin-top: 0;
        }

        /* ----- NAVBAR (transparent → scrolled) ----- */
        .navbar {
            background: transparent;
            padding: 5px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1050;
            transition: all 0.4s ease;
        }
        .navbar.scrolled {
            background: #ffffff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
        }
        .navbar .nav-link, .navbar-brand {
            color: white !important;
            transition: 0.3s;
        }
        .navbar.scrolled .nav-link {
            color: var(--medical-blue) !important;
        }
        .navbar.scrolled .navbar-brand, 
        .navbar.scrolled .nav-link:hover {
            color: var(--pup-maroon) !important;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            color: var(--pup-maroon) !important;
            flex-shrink: 0;
        }
        .navbar-brand img {
            height: 45px;
            object-fit: contain;
        }
        .nav-link {
            font-weight: 500;
            margin: 0 10px;
            position: relative;
            white-space: nowrap;
        }
        .nav-link:hover {
            color: var(--pup-maroon) !important;
        }
        
        /* Button container styling for desktop navbar */
        .navbar-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: 10px;
            flex-shrink: 0;
        }
        
        .btn-login-nav {
            background: var(--pup-maroon);
            color: white !important;
            border-radius: 50px;
            padding: 8px 25px !important;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(156, 12, 32, 0.2);
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            white-space: nowrap;
        }
        .btn-login-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(156, 12, 32, 0.3);
            color: white !important;
        }
        .dropdown-item {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--medical-blue);
            padding: 10px 20px;
            transition: 0.2s;
        }
        .dropdown-item:hover {
            background-color: rgba(156, 12, 32, 0.05);
            color: var(--pup-maroon);
        }
        @media (min-width: 1200px) {
            .nav-item.dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }

        /* ============================================ */
        /* CRITICAL FIX: Media query for 992px to 1200px range */
        /* ============================================ */
        @media (min-width: 992px) and (max-width: 1199px) {
            .navbar {
                padding: 5px 0;
            }
            .navbar-brand span {
                font-size: 0.95rem;
            }
            .navbar-brand img {
                height: 38px;
            }
            .nav-link {
                font-size: 0.85rem;
                margin: 0 6px;
                padding: 8px 0 !important;
            }
            .btn-login-nav {
                padding: 6px 18px !important;
                font-size: 0.8rem;
            }
            .navbar-buttons {
                gap: 10px;
                margin-left: 5px;
            }
            .container {
                max-width: 960px;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
        }
        
        @media (min-width: 1050px) and (max-width: 1150px) {
            .nav-link {
                margin: 0 5px;
                font-size: 0.82rem;
            }
            .btn-login-nav {
                padding: 5px 16px !important;
                font-size: 0.78rem;
            }
            .navbar-brand span {
                font-size: 0.9rem;
            }
            .navbar-brand img {
                height: 35px;
            }
            .navbar-buttons {
                gap: 8px;
            }
        }

        /* ============================================ */
        /* HAMBURGER MENU BUTTON - RIGHT SIDE */
        /* ============================================ */
        .hamburger-menu-btn {
            display: none;
            position: fixed;
            top: 12px;
            right: 15px;
            z-index: 1060;
            background: var(--medical-blue);
            border: none;
            color: white;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            font-size: 1.4rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            align-items: center;
            justify-content: center;
        }
        
        .hamburger-menu-btn:hover {
            background: #5a6a7a;
            transform: scale(1.02);
        }
        
        .navbar.scrolled ~ .hamburger-menu-btn,
        body:has(.navbar.scrolled) .hamburger-menu-btn {
            background: var(--pup-maroon);
            box-shadow: 0 4px 12px rgba(156, 12, 32, 0.25);
        }
        
        .mobile-sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1055;
            backdrop-filter: blur(3px);
            transition: all 0.3s ease;
        }
        
        .mobile-sidebar-overlay.active {
            display: block;
        }
        
        .mobile-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: var(--sidebar-width);
            max-width: 85%;
            height: 100vh;
            background: linear-gradient(145deg, #ffffff 0%, #fefefe 100%);
            box-shadow: -4px 0 30px rgba(0,0,0,0.15);
            z-index: 1061;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
            overflow-x: hidden;
            padding: 1.5rem 1.2rem;
            display: flex;
            flex-direction: column;
        }
        
        .mobile-sidebar.open {
            transform: translateX(0);
        }
        
        .mobile-sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid rgba(156, 12, 32, 0.1);
        }
        
        .mobile-sidebar-brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }
        
        .mobile-sidebar-brand span {
            font-weight: 700;
            color: var(--medical-blue);
            font-size: 1.2rem;
            line-height: 1.2;
        }
        
        .mobile-nav-links {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
            margin-top: 1rem;
        }
        
        .mobile-nav-link {
            padding: 12px 16px;
            border-radius: 14px;
            color: #555;
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            font-weight: 500;
            gap: 12px;
        }
        
        .mobile-nav-link i {
            width: 28px;
            font-size: 1.1rem;
            color: var(--medical-blue);
        }
        
        .mobile-nav-link:hover {
            background: rgba(71, 88, 103, 0.08);
            color: var(--medical-blue);
        }
        
        .mobile-nav-link.active {
            background: var(--medical-blue) !important;
            color: white !important;
            box-shadow: 0 8px 15px rgba(71, 88, 103, 0.3);
        }
        
        .mobile-nav-link.active i {
            color: white;
        }
        
        .mobile-sidebar-footer {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(0,0,0,0.08);
        }
        
        .mobile-login-btn {
            background: var(--pup-maroon);
            color: white;
            border-radius: 50px;
            padding: 12px 20px;
            font-weight: 600;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            transition: 0.3s;
        }
        
        .mobile-login-btn:hover {
            background: #7a0a1a;
            color: white;
            transform: translateY(-2px);
        }
        body.sidebar-open {
            overflow: hidden;
        }

        .navbar-toggler {
            display: none !important;
        }

        /* ============================================ */
        /* HERO SECTION - FIXED BACKGROUND WITH LIGHTER OVERLAY */
        /* ============================================ */
        .hero-section {
            padding: 100px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background-color: rgba(0, 0, 0, 0.35);
            isolation: isolate;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -2;
            background-image: url('https://www.pup.edu.ph/resources/images/subweb/sbBinan.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: scroll;
        }
        
        .hero-section::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background: linear-gradient(135deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.4) 100%);
            pointer-events: none;
        }
        
        @media (max-width: 576px) {
            .hero-section::before {
                background-position: 70% center;
            }
        }
        
        @media (min-width: 577px) and (max-width: 991px) {
            .hero-section::before {
                background-position: 60% center;
            }
        }
        
        .hero-text h1, .hero-text p {
            color: white !important;
            text-shadow: 0 2px 8px rgba(0,0,0,0.4);
            position: relative;
            z-index: 2;
        }
        
        .stat-item h2.counter {
            color: white;
            text-shadow: 0 1px 4px rgba(0,0,0,0.3);
        }
        
        .stat-item small {
            display: block;
        }

        /* ----- SERVICES SECTION ----- */
        #services {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 66px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }
        #services::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(156, 12, 32, 0.05) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .services-header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 2;
        }
        .services-header h2 {
            color: var(--pup-maroon);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0;
        }
        .services-header p {
            color: #666;
            font-size: 1.1rem;
            margin-top: 10px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 35px;
            position: relative;
            z-index: 3;
        }
        .service-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 45px 35px;
            border: 1.5px solid #eaeef2;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            height: 100%;
            display: flex;
            flex-direction: column;
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.25, 1, 0.5, 1);
            border-top: 3px solid transparent;
            border-bottom: 3px solid transparent;
        }
        .service-card.appear {
            opacity: 1;
            transform: translateY(0);
        }
        .service-card:hover {
            border-top-color: var(--pup-maroon);
            border-bottom-color: var(--pup-maroon);
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(156, 12, 32, 0.15);
        }
        .service-icon-wrapper {
            width: 75px;
            height: 75px;
            background: linear-gradient(135deg, var(--pup-maroon), var(--pup-red));
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 25px rgba(156, 12, 32, 0.15);
        }
        .service-card:hover .service-icon-wrapper {
            transform: translateY(-8px) scale(1.1);
        }
        .service-icon-wrapper i {
            font-size: 2rem;
            color: white;
        }
        .service-card h5 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--medical-blue);
            margin-bottom: 15px;
        }
        .service-card:hover h5 {
            color: var(--pup-maroon);
        }
        .service-card p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 0;
            flex-grow: 1;
        }
        .service-card-link {
            color: var(--pup-maroon);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            margin-top: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            width: fit-content;
        }
        .service-card:hover .service-card-link {
            gap: 12px;
        }

        /* ----- NURSE SECTION - FIXED HEIGHT & SMOOTH ANIMATION FOR ALL DEVICES ----- */
        #nurse {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 0;
            background-color: #f0f8ff;
        }
        .nurse-container {
            display: flex;
            width: 100%;
            height: 60vh;
            min-height: 480px;
            gap: 15px;
            align-items: stretch;
            transition: all 0.2s ease;
        }
        .nurse-card {
            flex: 2;
            display: flex;
            flex-direction: row;
            cursor: pointer;
            border-radius: 30px;
            overflow: hidden;
            background: #ffffff;
            filter: grayscale(100%);
            position: relative;
            opacity: 0;
            transform: translateX(100px);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1), filter 0.4s, flex 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            will-change: flex, transform, opacity;
        }
        .nurse-card.appear {
            opacity: 1;
            transform: translateX(0);
        }
        .nurse-card.active {
            flex: 4;
            filter: grayscale(0%);
            box-shadow: 0 20px 40px rgba(156, 12, 32, 0.15);
        }
        .nurse-img-container {
            flex: 1;
            min-width: 100%;
            height: 100%;
            transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .nurse-card.active .nurse-img-container {
            min-width: 50%;
            flex: 0 0 50%;
        }
        .nurse-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .nurse-info {
            flex: 0 0 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease 0.25s, visibility 0.3s 0.25s;
        }
        .nurse-card.active .nurse-info {
            opacity: 1;
            visibility: visible;
        }
        .nurse-role {
            color: var(--pup-maroon);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .nurse-info h3 {
            font-weight: 700;
            color: var(--medical-blue);
            font-size: 1.75rem;
        }

        /* ============================================ */
        /* FIXED NURSE CARD IMAGE CONSISTENCY FOR 991px AND BELOW */
        /* When cards stack vertically, ensure BOTH active and inactive cards:
           1. Have the SAME fixed image height
           2. Show the TOPPEST part of the image (object-position: top)
           3. Preserve all other functionality and design
        */
        /* ============================================ */
        @media (max-width: 991px) {
            .nurse-container {
                flex-direction: column;
                height: auto;
                min-height: 520px;
                gap: 16px;
            }
            .nurse-card {
                flex: none !important;
                width: 100%;
                flex-direction: column;
                height: auto;
                transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1.1);
                filter: grayscale(0%);
                background: white;
                opacity: 1;
                transform: translateX(0);
                margin-bottom: 0;
            }
            
            /* Remove any forced height restrictions on the card itself for fluid behavior */
            .nurse-card:not(.active) {
                height: auto !important;
                min-height: auto !important;
                max-height: none !important;
            }
            
            /* Make the image container have a fixed consistent height across ALL cards (active + inactive) */
            .nurse-card .nurse-img-container {
                height: 220px !important;      /* Fixed height for every card on tablet/mobile */
                min-height: 220px !important;
                max-height: 220px !important;
                transition: none;               /* Prevent height transition flicker */
                width: 100%;
                min-width: auto;
            }
            
            /* For active card, ensure same height to keep visual consistency */
            .nurse-card.active .nurse-img-container {
                height: 220px !important;
                min-width: 100% !important;
                flex: none !important;
            }
            
            /* CRITICAL: For BOTH active and inactive cards, ensure the image shows the TOPPEST part */
            /* This unifies the image positioning across all nurse cards on mobile/tablet */
            .nurse-card .nurse-img-container img {
                object-fit: cover;
                object-position: top center !important;    /* Forces top-most part of the image for every card */
                width: 100%;
                height: 100%;
            }
            
            /* No exception for active card — both active and inactive now show top part */
            
            /* Info section styling */
            .nurse-info {
                width: 100%;
                padding: 20px 24px;
                flex: none;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease 0.2s, visibility 0.3s 0.2s;
            }
            
            .nurse-card.active .nurse-info {
                opacity: 1;
                visibility: visible;
                display: flex;
            }
            
            /* Ensure the info section remains hidden for inactive cards */
            .nurse-card:not(.active) .nurse-info {
                display: none !important;
                opacity: 0;
                visibility: hidden;
            }
            
            /* Active card expanded styling */
            .nurse-card.active {
                min-height: auto;
                max-height: none;
                filter: grayscale(0%);
                box-shadow: 0 12px 28px rgba(0,0,0,0.12);
            }
            
            /* Typography refinements for tablet/mobile */
            .nurse-info h3 {
                font-size: 1.5rem;
                margin-bottom: 8px;
            }
            .nurse-role {
                font-size: 0.8rem;
            }
            .nurse-card {
                border-radius: 24px;
                margin-bottom: 0;
                transition: all 0.3s ease;
            }
            
            /* Prevent any layout shift or flicker when transitioning */
            .nurse-card * {
                backface-visibility: hidden;
                -webkit-backface-visibility: hidden;
            }
        }
        
        /* Additional fine-tuning for smaller devices (below 576px) */
        @media (max-width: 576px) {
            .nurse-card .nurse-img-container {
                height: 180px !important;
                min-height: 180px !important;
                max-height: 180px !important;
            }
            .nurse-card.active .nurse-img-container {
                height: 180px !important;
            }
            .nurse-info {
                padding: 16px 18px;
            }
            .nurse-info h3 {
                font-size: 1.3rem;
            }
        }
        
        /* For medium-large tablets (between 768px and 991px) - slightly taller images */
        @media (min-width: 768px) and (max-width: 991px) {
            .nurse-card .nurse-img-container {
                height: 260px !important;
                min-height: 260px !important;
                max-height: 260px !important;
            }
            .nurse-card.active .nurse-img-container {
                height: 260px !important;
            }
        }
        
        /* ----- PRE-FOOTER & FOOTER ----- */
        .contact-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background-color: #fdfdfd;
        }
        .pre-footer {
            padding: 103px 0;
            text-align: center;
            background-image: linear-gradient(rgba(80, 80, 80, 0.7), rgba(80, 80, 80, 0.7)),
                url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .pre-footer h2 {
            color: #ffffff !important;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }
        .pre-footer p {
            color: #ffffff !important;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }
        .btn-prefooter {
            background: var(--pup-maroon);
            color: white !important;
            border-radius: 50px;
            padding: 12px 35px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .btn-prefooter:hover {
            background: transparent;
            border-color: #ffffff;
            color: #ffffff !important;
            transform: translateY(-3px);
        }
        footer {
            background: #1a1a1a;
            color: white;
            padding: 60px 0 20px;
        }
        .footer-logo h4 {
            color: white;
            font-weight: 700;
        }
        .footer-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: 0.3s;
        }
        .footer-link:hover {
            color: var(--pup-red);
        }
        .social-icons a {
            font-size: 1.5rem;
            color: white;
            margin-right: 15px;
            opacity: 0.7;
            transition: 0.3s;
        }
        .social-icons a:hover {
            opacity: 1;
            color: var(--pup-red);
        }

        /* ----- RESPONSIVE MEDIA QUERIES ----- */
        @media (max-width: 991px) {
            .hero-section {
                padding: 75px 0 60px 0;
                text-align: center;
            }
            .hero-text h1 {
                font-size: 2.2rem;
            }
            .hamburger-menu-btn {
                display: flex;
            }
            .navbar-buttons {
                gap: 12px;
                margin-top: 10px;
                margin-bottom: 10px;
                flex-wrap: wrap;
                justify-content: center;
            }
            .navbar .container {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }
        
        @media (max-width: 768px) {
            .services-grid {
                gap: 25px;
            }
            .service-card {
                padding: 35px 25px;
            }
            .hero-text h1 {
                font-size: 1.8rem;
            }
            .hero-text .d-flex {
                flex-direction: column;
                gap: 10px !important;
            }
            .btn-lg {
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section {
                padding-top: 100px;
            }
            .services-header h2 {
                font-size: 1.7rem;
            }
            .mobile-sidebar {
                width: 85%;
            }
            .hamburger-menu-btn {
                width: 40px;
                height: 40px;
                top: 10px;
                right: 12px;
                font-size: 1.2rem;
            }
            .mobile-sidebar-footer {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
        }
        
        .container, .container-fluid {
            overflow-x: clip !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }
    </style>
</head>
<body>

    <!-- HAMBURGER MENU BUTTON - RIGHT SIDE -->
    <button class="hamburger-menu-btn" id="hamburgerMenuBtn">
        <i class="fa-solid fa-bars"></i>
    </button>
    
    <!-- Sidebar Overlay -->
    <div class="mobile-sidebar-overlay" id="mobileSidebarOverlay"></div>
    
    <!-- Mobile Sidebar -->
    <div class="mobile-sidebar" id="mobileSidebar">
        <div class="mobile-sidebar-brand">
            <img src="../assets/cliniclogohalf.png" alt="PUP Logo">
            <span>PUPBC CareLink</span>
        </div>
        
        <div class="mobile-nav-links">
            <a href="#home" class="mobile-nav-link" data-target="home">
                <i class="fa-solid fa-house"></i> Home
            </a>
            <a href="#services" class="mobile-nav-link" data-target="services">
                <i class="fa-solid fa-stethoscope"></i> Services
            </a>
            <a href="#nurse" class="mobile-nav-link" data-target="nurse">
                <i class="fa-solid fa-user-nurse"></i> Nurse
            </a>
            <a href="#contact" class="mobile-nav-link" data-target="contact">
                <i class="fa-solid fa-envelope"></i> Contact Us
            </a>
        </div>
        
        <div class="mobile-sidebar-footer">
            <a href="../portal/portalmain.php" class="mobile-login-btn">
                <i class="fa-solid fa-right-to-bracket"></i> Login Portal
            </a>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="../assets/cliniclogohalf.png" alt="PUP Logo">
                <span>PUPBC CareLink</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#home" id="homeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                        <ul class="dropdown-menu shadow-sm border-0" aria-labelledby="homeDropdown" style="border-radius: 15px;">
                            <li><a class="dropdown-item" href="digitalhealthcare/index/indexhtml.php">Homepage 1</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nurse">Nurse</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
                </ul>
                <div class="navbar-buttons">
                    <a href="../portal/portalmain.php" class="btn-login-nav">
                        <i class="fa-solid fa-right-to-bracket me-1"></i> Login Portal
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-10 mx-auto mx-lg-0 hero-text">
                    <h1 class="fw-bold">Digital Healthcare <br> Made Simple.</h1>
                    <p class="lead mb-4">Experience a seamless connection between students and medical services. Book appointments, access records, and stay healthy.</p>
                    <div class="d-flex gap-3 mb-5">
                        <a href="#services" class="btn btn-lg rounded-pill px-4" style="background: var(--pup-maroon); color: white;">Explore Services</a>
                        <a href="#contact" class="btn btn-lg rounded-pill px-4" style="background: #6c757d; color: white; border: none;">Contact Support</a>
                    </div>
                    <div class="row g-4 mt-2">
                        <div class="col-4 col-md-3"><div class="stat-item"><h2 class="fw-bold mb-0 counter" style="color: white;" data-target="15000" data-type="students">0</h2><small class="text-white-50 text-uppercase fw-semibold">Students Registered</small></div></div>
                        <div class="col-4 col-md-3"><div class="stat-item"><h2 class="fw-bold mb-0 counter" style="color: white;" data-target="98" data-type="satisfaction">0</h2><small class="text-white-50 text-uppercase fw-semibold">Patient Satisfaction</small></div></div>
                        <div class="col-4 col-md-3"><div class="stat-item"><h2 class="fw-bold mb-0 counter" style="color: white;" data-target="10" data-type="services">0</h2><small class="text-white-50 text-uppercase fw-semibold">Services</small></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services">
        <div class="container">
            <div class="services-header"><h2>Our Medical Services</h2><p>Comprehensive healthcare solutions designed for every PUPian.</p></div>
            <div class="services-grid">
                <div class="service-card"><div class="service-icon-wrapper"><i class="fa-solid fa-calendar-check"></i></div><h5>Easy Appointments</h5><p>Schedule your clinic visits online without waiting in long queues.</p><a href="#" class="service-card-link">Learn more <i class="fa-solid fa-arrow-right"></i></a></div>
                <div class="service-card"><div class="service-icon-wrapper"><i class="fa-solid fa-file-medical"></i></div><h5>Medical Records</h5><p>Access your complete health history and medical certificates securely.</p><a href="#" class="service-card-link">Learn more <i class="fa-solid fa-arrow-right"></i></a></div>
                <div class="service-card"><div class="service-icon-wrapper"><i class="fa-solid fa-pills"></i></div><h5>Medicine Supply</h5><p>Check real-time availability of essential medicines in the campus infirmary.</p><a href="#" class="service-card-link">Learn more <i class="fa-solid fa-arrow-right"></i></a></div>
            </div>
        </div>
    </section>

    <!-- NURSE SECTION (FIXED VERTICAL ANIMATION WITH UNIFIED IMAGE TOP POSITIONING) -->
    <section id="nurse">
        <div class="container">
            <div class="text-center mb-5"><h2 class="fw-bold" style="color: var(--medical-blue);">Meet Our Medical Team</h2><p class="text-muted">Click a nurse profile to view full details.</p></div>
            <div class="nurse-container">
                <div class="nurse-card active"><div class="nurse-img-container"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSva14ZZo9s3rOWInP0-jQXpoQtw82nzzWOzQ&s" alt="Maria Clara"></div><div class="nurse-info"><span class="nurse-role">Head Nurse</span><h3>Maria Clara, RN</h3><p class="text-muted">Expert in emergency triage and campus health protocols.</p><div class="mt-3"><span class="badge rounded-pill bg-danger px-4 py-2">8:00 AM - 5:00 PM</span></div></div></div>
                <div class="nurse-card"><div class="nurse-img-container"><img src="https://static.vecteezy.com/system/resources/thumbnails/026/375/249/small/ai-generative-portrait-of-confident-male-doctor-in-white-coat-and-stethoscope-standing-with-arms-crossed-and-looking-at-camera-photo.jpg" alt="Juan Dela Cruz"></div><div class="nurse-info"><span class="nurse-role">Clinical Nurse</span><h3>Juan Dela Cruz, RN</h3><p class="text-muted">Specializes in student counseling and primary healthcare.</p><div class="mt-3"><span class="badge rounded-pill bg-danger px-4 py-2">10:00 AM - 7:00 PM</span></div></div></div>
                <div class="nurse-card"><div class="nurse-img-container"><img src="https://t3.ftcdn.net/jpg/15/75/74/62/360_F_1575746216_ZS5ovZG1rHulQUatTq0WVno9BGInMCwW.jpg" alt="Elena Adarna"></div><div class="nurse-info"><span class="nurse-role">Health Specialist</span><h3>Elena Adarna, RN</h3><p class="text-muted">Focuses on preventative medicine and managing digital medical records.</p><div class="mt-3"><span class="badge rounded-pill bg-danger px-4 py-2">Mon - Sat Service</span></div></div></div>
            </div>
        </div>
    </section>

    <!-- CONTACT + FOOTER -->
    <div id="contact" class="contact-wrapper">
        <div class="pre-footer"><div class="container"><h2 class="fw-bold mb-3">Get in Touch</h2><p class="text-muted">We are here to assist you with your health concerns and inquiries.</p><div class="mt-4"><a href="../portal/portalmain.php" class="btn-prefooter">Get Started <i class="fa-solid fa-arrow-right ms-2"></i></a></div></div></div>
        <footer><div class="container"><div class="row g-5"><div class="col-lg-4 footer-logo"><h4>PUPBC CareLink</h4><p class="small opacity-50 mt-3">The official health information system of PUP Biñan Campus.</p><div class="social-icons mt-4"><a href="#"><i class="fa-brands fa-facebook"></i></a><a href="#"><i class="fa-brands fa-twitter"></i></a><a href="#"><i class="fa-brands fa-instagram"></i></a></div></div><div class="col-lg-2"><h6 class="fw-bold mb-4">Quick Links</h6><ul class="list-unstyled"><li><a href="#home" class="footer-link small">Home</a></li><li><a href="#services" class="footer-link small">Services</a></li><li><a href="#nurse" class="footer-link small">Nurse Portal</a></li></ul></div><div class="col-lg-3"><h6 class="fw-bold mb-4">Contact Info</h6><p class="small opacity-50"><i class="fa-solid fa-location-dot me-2"></i> Brgy. Zapote, Biñan City, Laguna</p><p class="small opacity-50"><i class="fa-solid fa-envelope me-2"></i> clinic.binan@pup.edu.ph</p><p class="small opacity-50"><i class="fa-solid fa-phone me-2"></i> (049) 539-1234</p></div><div class="col-lg-3 text-center"><h6 class="fw-bold mb-4">Campus Clinic Hours</h6><div class="p-3 rounded-4" style="background: rgba(255,255,255,0.05);"><p class="mb-1 small">Mon - Sat</p><h5 class="fw-bold mb-0">8:00 AM - 6:00 PM</h5></div></div></div><hr class="mt-5 opacity-25"><div class="text-center small opacity-50"><p>&copy; 2026 PUPBC CareLink. All rights reserved.</p></div></div></footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            function updateNavbar() { window.scrollY > 50 ? navbar.classList.add('scrolled') : navbar.classList.remove('scrolled'); }
            window.addEventListener('scroll', updateNavbar);
            window.addEventListener('load', updateNavbar);
            
            // Counters animation
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const type = counter.getAttribute('data-type');
                function animateCounter() {
                    let current = 0;
                    counter.innerText = (type === 'satisfaction') ? "0%" : "0";
                    const update = () => {
                        const inc = target > 100 ? target / 150 : 0.5;
                        if (current < target) {
                            current = Math.min(current + inc, target);
                            counter.innerText = (type === 'satisfaction') ? Math.floor(current) + "%" : Math.ceil(current);
                            setTimeout(update, 20);
                        } else {
                            if (type === 'students') counter.innerText = "15k+";
                            else if (type === 'satisfaction') counter.innerText = "98%";
                            else if (type === 'services') counter.innerText = "10+";
                            else counter.innerText = target + "+";
                            setTimeout(() => { counter.innerText = (type === 'satisfaction') ? "0%" : "0"; animateCounter(); }, 3000);
                        }
                    };
                    update();
                }
                animateCounter();
            });
            
            // Nurse cards click with smooth transition
            const nurseCards = document.querySelectorAll('.nurse-card');
            nurseCards.forEach(card => {
                card.addEventListener('click', (e) => {
                    if (card.classList.contains('active')) return;
                    nurseCards.forEach(c => c.classList.remove('active'));
                    card.classList.add('active');
                });
            });
            
            // Intersection Observer for animations
            const nurseItems = document.querySelectorAll('.nurse-card');
            const nurseObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) nurseItems.forEach((card, idx) => setTimeout(() => card.classList.add('appear'), idx * 100));
                    else nurseItems.forEach(card => card.classList.remove('appear'));
                });
            }, { threshold: 0.15 });
            if (document.querySelector('#nurse')) nurseObserver.observe(document.querySelector('#nurse'));
            
            const serviceCards = document.querySelectorAll('.service-card');
            const servicesObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('appear');
                    else entry.target.classList.remove('appear');
                });
            }, { threshold: 0.15 });
            serviceCards.forEach(card => servicesObserver.observe(card));
            
            // Hamburger menu functionality
            const hamburgerBtn = document.getElementById('hamburgerMenuBtn');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const sidebarOverlay = document.getElementById('mobileSidebarOverlay');
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
            function openSidebar() { mobileSidebar?.classList.add('open'); sidebarOverlay?.classList.add('active'); document.body.classList.add('sidebar-open'); }
            function closeSidebar() { mobileSidebar?.classList.remove('open'); sidebarOverlay?.classList.remove('active'); document.body.classList.remove('sidebar-open'); }
            hamburgerBtn?.addEventListener('click', () => mobileSidebar?.classList.contains('open') ? closeSidebar() : openSidebar());
            sidebarOverlay?.addEventListener('click', closeSidebar);
            mobileNavLinks.forEach(link => link.addEventListener('click', (e) => { e.preventDefault(); const target = document.getElementById(link.getAttribute('data-target')); if (target) target.scrollIntoView({ behavior: 'smooth' }); closeSidebar(); }));
            document.addEventListener('keydown', (e) => e.key === 'Escape' && mobileSidebar?.classList.contains('open') && closeSidebar());
            window.addEventListener('resize', () => window.innerWidth > 991 && mobileSidebar?.classList.contains('open') && closeSidebar());
        })();

// Fix Home dropdown button to scroll to home section with single click
const homeDropdownBtn = document.querySelector('#homeDropdown');
if (homeDropdownBtn) {
    homeDropdownBtn.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#home').scrollIntoView({ behavior: 'smooth' });
        
        // Close dropdown if open
        const dropdownMenu = this.nextElementSibling;
        if (dropdownMenu && dropdownMenu.classList.contains('show')) {
            dropdownMenu.classList.remove('show');
        }
    });
}
    </script>
</body>
</html>