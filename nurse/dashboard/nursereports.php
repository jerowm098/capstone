<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Reports and Analytics | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --main-form-width: 1200px; 
            --layout-margin-top: 1rem;
            --standard-padding: 1.5rem;
            --brand-primary: #28313a;      
            --medical-blue: #475867;        
            --medical-blue-dark: #1a2127; 
            --medical-blue-soft: rgba(71, 88, 103, 0.08); 
            --text-main: #28313a;          
            --text-muted: #5c7285;     
            --clay-bg: #f4f7f6;
            --form-bg-color: #ffffff;
            --form-border-radius: 10px;            
            --form-box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);

            --app-height-fs: 100vh;
            --app-height-min: 600px;
            --app-height-fit: auto;
        }

        html { overflow-y: auto; scrollbar-gutter: stable; height: auto; }
        
        body {
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-color: var(--clay-bg);
            margin: 0;
            padding: var(--layout-margin-top) 0;
            display: flex;
            justify-content: center;
            color: var(--text-main);
        }

        .floating-form-container {
            width: 95%;
            max-width: var(--main-form-width);
            min-height: var(--app-height-min);
            height: var(--app-height-fit);
            background: var(--form-bg-color);
            border-radius: var(--form-border-radius);
            overflow: hidden;
            box-shadow: var(--form-box-shadow);
            border: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .nav-header-tab {
            background-color: var(--brand-primary);
            padding: 0 var(--standard-padding);
            display: flex;
            align-items: center;
            height: 60px;
            flex-shrink: 0;
        }

        .nav-tabs-inline {
            display: flex;
            gap: 2rem; 
            margin: 0;
            padding: 0;
            height: 100%;
            align-items: center;
        }

        .nav-link-tab {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem; 
            opacity: 0.6; 
            transition: 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            position: relative;
        }

        .nav-link-tab:hover {
            opacity: 0.9;
            color: #ffffff;
        }

        .nav-link-tab.active {
            opacity: 1; 
            color: #ffffff !important;
        }

        .profile-body {
            flex-grow: 1;
            background: #ffffff;
            position: relative;
            display: flex;
        }

        #reports-frame {
            width: 100%;
            flex-grow: 1;
            border: none;
            background: transparent;
            display: block;
            min-height: 500px;
        }

        @media (max-width: 768px) {
            .nav-tabs-inline { gap: 1rem; }
            .nav-link-tab { font-size: 0.95rem; }
        }
    </style>
</head>
<body>

    <div class="floating-form-container">
        <nav class="nav-header-tab">
            <div class="nav-tabs-inline" id="reportTabs">
                <a href="nursereportssummary.php" data-tab="summary" class="nav-link-tab active">
                    <span>Summary Report</span>
                </a>
 <!--                <a href="nursereportsappointment.php" data-tab="appointment" class="nav-link-tab">
                    <span>Appointments</span>
                </a> -->
<!--                 <a href="nursereportsmedication.php" data-tab="medication" class="nav-link-tab">
                    <span>Medications Report</span>
                </a> -->
            </div>
        </nav>

        <div class="profile-body">
            <iframe src="nursereportssummary.php" name="reports-frame" id="reports-frame"></iframe>
        </div>        
    </div>

    <script>
        /**
         * FUNCTION #1: SECURITY REDIRECT (LAYOUT PROTECTION)
         */
        if (window.self === window.top) {
            const currentPage = window.location.pathname.split("/").pop();
            const urlParams = new URLSearchParams(window.location.search);
            const sub = urlParams.get('subpage') || 'nursereportssummary.php';
            window.location.href = "nursedashboard.php?page=" + currentPage + "&subpage=" + sub;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.nav-link-tab');
            const iframe = document.getElementById('reports-frame');

            /**
             * FUNCTION #2: TAB SWITCHING LOGIC (Updated for 3 Tabs)
             */
            function switchTab(tabId) {
                const mapping = {
                    'summary': 'nursereportssummary.php',
                    'appointment': 'nursereportsappointment.php',
                    'medication': 'nursereportsmedication.php'
                };

                const iframeSrc = mapping[tabId] || 'nursereportssummary.php';
                iframe.src = iframeSrc;
                
                tabs.forEach(t => {
                    t.classList.remove('active');
                    if (t.getAttribute('data-tab') === tabId) t.classList.add('active');
                });
            }

            /**
             * FUNCTION #3: INITIAL URL STATE CHECKER (DEEP LINKING)
             */
            let activeSub = 'summary';
            try {
                if (window.parent !== window.self) {
                    const parentParams = new URLSearchParams(window.parent.location.search);
                    const parentSubpage = parentParams.get('subpage');
                    
                    if (parentSubpage) {
                        if (parentSubpage.includes('summary')) activeSub = 'summary';
                        else if (parentSubpage.includes('appointment')) activeSub = 'appointment';
                        else if (parentSubpage.includes('medication')) activeSub = 'medication';
                    }
                }
            } catch(e) { 
                console.log('Using default tab');
                activeSub = 'summary'; 
            } 
            
            switchTab(activeSub);

            /**
             * FUNCTION #4: TAB CLICK EVENT HANDLER
             */
            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    if (!e.ctrlKey && !e.metaKey) {
                        e.preventDefault();
                        const tabId = this.getAttribute('data-tab');
                        switchTab(tabId);
                        
                        try {
                            if (window.parent !== window.self) {
                                const subFile = this.getAttribute('href');
                                const newURL = window.parent.location.origin + window.parent.location.pathname + 
                                               '?page=nursereports.php&subpage=' + subFile;
                                window.parent.history.replaceState({ path: newURL }, '', newURL);
                            }
                        } catch(e) { console.warn('URL sync failed'); }
                    }
                });
            });

            /**
             * FUNCTION #5: IFRAME-TO-PARENT SYNC (AUTO-UPDATE)
             */
            iframe.addEventListener('load', function() {
                try {
                    const iframeSrc = iframe.contentWindow.location.pathname.split('/').pop();
                    let activeTabId = '';
                    
                    if (iframeSrc.includes('summary')) activeTabId = 'summary';
                    else if (iframeSrc.includes('appointment')) activeTabId = 'appointment';
                    else if (iframeSrc.includes('medication')) activeTabId = 'medication';
                    
                    if (activeTabId) {
                        tabs.forEach(t => {
                            t.classList.remove('active');
                            if (t.getAttribute('data-tab') === activeTabId) t.classList.add('active');
                        });
                        
                        if (window.parent !== window.self) {
                            const newURL = window.parent.location.origin + window.parent.location.pathname + 
                                           '?page=nursereports.php&subpage=' + iframeSrc;
                            window.parent.history.replaceState({ path: newURL }, '', newURL);
                        }
                    }
                } catch(e) { }
            });
        });
    </script>
</body>
</html>