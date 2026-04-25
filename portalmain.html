<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Selection | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --pup-maroon: #9C0C20;
            --pup-red: #D51C3D;
            --medical-blue: #475867;
            --clay-bg: #f0f0f0;
/*             --clay-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff;
            --clay-inset: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff; */
            /* Theme colors */
            --nurse-sky: #87CEEB;      /* Sky blue base */
            --student-maroon: #9C0C20; /* PUP Maroon base */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* CRITICAL: Prevent scrollable panes — body fixed, no overflow */
        html, body {
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex; 
            align-items: center; 
            justify-content: center;
            background: #000;
            position: relative;
        }

        /* Blurred background overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1920');
            background-size: cover;
            background-position: center;
            filter: blur(10px);
            transform: scale(1.1);
            z-index: -2;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: -1;
        }

        /* Main container - fixed dimensions, no overflow */
        .portal-container {
            width: 1100px;
            max-width: 90vw;
            height: 650px;
            max-height: 100vh;
            background: transparent;
            border-radius: 40px;
            display: grid; 
            grid-template-columns: 1.2fr 1fr;
            overflow: hidden;      /* No scrolling inside container */
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
            position: relative;
            backdrop-filter: blur(5px);
        }

        /* Brand side (left column) */
        .brand-side {
            background: linear-gradient(rgba(156, 12, 32, 0.85), rgba(0, 0, 0, 0.4)), 
                        url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200');
            background-size: cover;
            padding: 4rem;
            display: flex; 
            flex-direction: column; 
            justify-content: center;
            color: white;
        }

        /* Selection side (right column) */
        .selection-side {
            padding: 3rem 4rem;
            background: rgba(253, 253, 253, 0.95);
            display: flex; 
            flex-direction: column; 
            justify-content: center;
            height: 100%;
            overflow-y: auto;       /* Allow internal scroll ONLY if content overflows, but content fits perfectly */
            scrollbar-width: thin;
        }
        /* Hide scrollbar for cleaner look but keep functionality (content fits anyway) */
        .selection-side::-webkit-scrollbar {
            width: 4px;
        }
        .selection-side::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .selection-side::-webkit-scrollbar-thumb {
            background: var(--pup-maroon);
            border-radius: 10px;
        }

        .welcome-badge {
            display: inline-block;
            background: rgba(156, 12, 32, 0.1);
            color: var(--pup-maroon);
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        /* STAT CARDS (role buttons) - customized per portal */
        .role-btn {
            border: none;
            border-radius: 20px;
            padding: 18px; 
            margin-bottom: 14px; 
            transition: all 0.2s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding-left: 25px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: var(--clay-shadow);
        }

        .role-btn i { 
            font-size: 1.6rem; 
            margin-right: 18px; 
        }

        /* Removed all glowing/hover gradient effects — only simple shadow change */
        .role-btn:hover {
            box-shadow: var(--clay-inset);
            transform: translateY(1px);
        }

        .role-description {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            color: rgba(255,255,255,0.85);
        }

        /* NURSE PORTAL STAT CARD - SKY BLUE BACKGROUND (NO GLOW, SOLID THEME) */
        .nurse-stat-card {
            background: #87CEEB;  /* Solid sky blue, no gradient */
            color: #1a3e50;
            border-bottom: 2px solid #5b9fc7;
        }
        .nurse-stat-card i {
            color: #0f4c6b;
        }
        .nurse-stat-card .role-description {
            color: #0a2f42;
            font-weight: 500;
        }
        /* Hover: only subtle shadow change, NO glowing, NO gradient shift */
        .nurse-stat-card:hover {
            background: #87CEEB;  /* stays exactly same sky blue, no color change */
            box-shadow: var(--clay-inset);
            transform: translateY(1px);
        }

        /* STUDENT PORTAL STAT CARD - PUP MAROON BACKGROUND (NO GLOW, SOLID THEME) */
        .student-stat-card {
            background: #9C0C20;  /* Solid PUP maroon, no gradient */
            color: #ffefef;
            border-bottom: 2px solid #6e0919;
        }
        .student-stat-card i {
            color: #ffcdcd;
        }
        .student-stat-card .role-description {
            color: #ffdbdb;
        }
        /* Hover: only subtle shadow change, NO glowing, NO background shift */
        .student-stat-card:hover {
            background: #9C0C20;  /* stays exactly same maroon, no hover color change */
            box-shadow: var(--clay-inset);
            transform: translateY(1px);
        }

        /* Divider style */
        .portal-divider {
            border: 0;
            height: 1px;
            background: rgba(0,0,0,0.1);
            margin: 2rem 0 1.5rem 0;
            width: 100%;
        }

        /* Responsive: maintain no outer scroll, container adjusts but never adds scrollbars to body */
        @media (max-width: 991px) {
            .portal-container {
                width: 95%;
                max-width: 95%;
                height: 90vh;
                grid-template-columns: 1fr;
            }
            .brand-side {
                padding: 2rem;
                text-align: center;
            }
            .selection-side {
                padding: 2rem;
                overflow-y: auto;
            }
            .brand-side .mt-4 {
                display: flex;
                justify-content: center;
                gap: 20px;
                flex-wrap: wrap;
            }
        }

        @media (max-width: 575px) {
            .portal-container {
                width: 98%;
                height: auto;
                max-height: 92vh;
            }
            .brand-side {
                padding: 1.8rem;
            }
            .selection-side {
                padding: 1.8rem;
            }
            .role-btn {
                padding: 14px 18px;
            }
            .role-btn i {
                font-size: 1.4rem;
                margin-right: 12px;
            }
        }

        /* Additional override to ensure body never scrolls */
        @media (max-width: 480px) {
            body {
                align-items: center;
            }
        }
    </style>
</head>
<body>

<div class="portal-container">
    <!-- Left side: Branding area (unchanged) -->
    <div class="brand-side">
        <h1 class="display-4 fw-bold">CareLink<br>Portals</h1>
        <p class="lead opacity-75">Access the University Health System tailored to your role.</p>
        <div class="mt-4">
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-shield-halved me-3"></i>
                <span>Secure Access Points</span>
            </div>
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-clock-rotate-left me-3"></i>
                <span>24/7 System Availability</span>
            </div>
        </div>
    </div>

    <!-- Right side: Selection area with stat cards (modified backgrounds, no glow) -->
    <div class="selection-side">
        <div class="text-center mb-4">
            <span class="welcome-badge">University Health System</span>
            <h2 class="fw-bold mb-1" style="color: var(--pup-maroon);">Welcome back!</h2>
            <p class="text-muted" style="font-size: 0.9rem;">Please select your destination portal.</p>
        </div>

        <div id="role-selector">
            <!-- NURSE PORTAL: Sky Blue Background Stat Card (solid, no glowing effects) -->
            <a href="nurselogin.html" class="role-btn nurse-stat-card">
                <i class="fa-solid fa-hand-holding-medical"></i>
                <div>
                    <span>Nurse Portal</span>
                    <span class="role-description">Consultations & records</span>
                </div>
            </a>

            <!-- STUDENT PORTAL: PUP Maroon Background Stat Card (solid, no glowing effects) -->
            <a href="studlogin.html" class="role-btn student-stat-card">
                <i class="fa-solid fa-user-graduate"></i>
                <div>
                    <span>Student Portal</span>
                    <span class="role-description">Appointments & certificates</span>
                </div>
            </a>
        </div>

        <hr class="portal-divider">

        <div class="text-center">
            <a href="index.html" class="text-muted small text-decoration-none fw-bold" style="font-size: 0.75rem; opacity: 0.8;">
                <i class="fa-solid fa-arrow-left-long me-2"></i> Go Back
            </a>
        </div>
    </div>
</div>

<!-- Ensure no scrollable panes on body level, layout stays intact -->
</body>
</html>