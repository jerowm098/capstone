<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Student Medical Records | PUPBC CareLink</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --main-form-width: 1200px; 
            --layout-margin-top: 1rem;
            --standard-padding: 1.5rem;
            
            /* MAROON THEME COLORS */
            --brand-primary: #9C0C20;      
            --brand-primary-dark: #7a0a1a;
            --brand-primary-light: #c0283e;
            --brand-primary-soft: rgba(156, 12, 32, 0.08);
            
            --text-main: #28313a;          
            --text-muted: #5c7285;     
            --clay-bg: #f4f7f6;
            --form-bg-color: #ffffff;
            --form-border-radius: 10px;            
            --form-box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
            
            --app-height-min: 600px;
            --app-height-fit: auto;
        }

        html { 
            overflow-y: auto; 
            scrollbar-gutter: stable; 
            height: auto; 
        }
        
        body {
            min-height: 100vh;
            height: auto;
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
            border-bottom: 3px solid var(--brand-primary-dark);
        }

        .nav-tabs-inline {
            display: flex;
            gap: 1.5rem; 
            margin: 0;
            padding: 0;
            height: 100%;
            align-items: center;
        }

        .nav-link-tab {
            color: rgba(255, 255, 255, 0.6) !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem; 
            cursor: pointer;
            display: flex;
            align-items: center;
            height: 100%;
            padding: 0;
            position: relative;
            gap: 8px;
            transition: color 0.3s ease, opacity 0.3s ease;
        }

        .nav-link-tab:hover {
            color: #ffffff !important;
            opacity: 1;
        }

        /* ACTIVE STATE */
        .nav-link-tab.active {
            color: #ffffff !important;
            opacity: 1 !important;
        }

        .profile-body {
            flex-grow: 1;
            display: flex;
            width: 100%;
            background: var(--form-bg-color);
            padding: 0;
            overflow: visible;
        }

        #medical-frame {
            width: 100%;
            flex-grow: 1;
            min-height: 500px;
            border: none;
            background: transparent;
            display: block;
        }

        @media (max-width: 768px) {
            .nav-tabs-inline { gap: 1rem; }
            .nav-link-tab { font-size: 1rem; }
        }
    </style>
</head>
<body>

    <div class="floating-form-container">
        <nav class="nav-header-tab">
            <div class="nav-tabs-inline" id="medicalTabs">
                <a href="studmedicalrecordsview.php" data-tab="records" class="nav-link-tab">
                    <span>View Records</span>
                </a>
<!--                 <a href="studmedicalhistory.php" data-tab="history" class="nav-link-tab">
                    <span>Medical History</span>
                </a> -->
            </div>
        </nav>

        <div class="profile-body">
            <iframe src="about:blank" name="medical-frame" id="medical-frame"></iframe>
        </div>        
    </div>

<script>
    /**
     * 1. SECURITY REDIRECT (LAYOUT PROTECTION)
     */
    if (window.self === window.top) {
        const currentPage = window.location.pathname.split("/").pop();
        const urlParams = new URLSearchParams(window.location.search);
        const sub = urlParams.get('subpage') || 'studmedicalrecordsview.php';
        
        // DITO: Sinisiguro na laging may parameters pag labas sa dashboard
        window.location.href = "studdashboard.php?page=" + currentPage + "&subpage=" + sub;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.nav-link-tab');
        const iframe = document.getElementById('medical-frame');
        let isSwitchingTab = false;

        /**
         * 2. TAB SWITCHING & URL SYNC LOGIC
         * Dito natin isasama ang pag-update ng URL agad sa load pa lang.
         */
        function switchTab(tabId) {
            const mapping = {
                'records': 'studmedicalrecordsview.php',
                'history': 'studmedicalhistory.php'
            };

            const targetSrc = mapping[tabId] || 'studmedicalrecordsview.php';
            
            isSwitchingTab = true;
            iframe.src = targetSrc;
            
            tabs.forEach(t => {
                t.classList.remove('active');
                if (t.getAttribute('data-tab') === tabId) t.classList.add('active');
            });

            // GUMAGANA NA SYNC: Ito ang magpapakita ng mahabang URL sa dashboard
            try {
                if (window.parent !== window.self) {
                    const newURL = window.parent.location.origin + window.parent.location.pathname + 
                                   '?page=studmedicalrecords.php&subpage=' + targetSrc;
                    window.parent.history.replaceState({ path: newURL }, '', newURL);
                }
            } catch(e) { console.warn('URL sync failed'); }

            setTimeout(() => { isSwitchingTab = false; }, 100);
        }

        /**
         * 3. INITIAL LOAD (DEEP LINKING)
         */
        let activeSub = 'records';
        try {
            if (window.parent !== window.self) {
                const parentParams = new URLSearchParams(window.parent.location.search);
                const parentSubpage = parentParams.get('subpage');
                
                if (parentSubpage) {
                    if (parentSubpage.includes('records')) activeSub = 'records';
                    else if (parentSubpage.includes('history')) activeSub = 'history';
                }
            }
        } catch(e) { activeSub = 'records'; }
        
        // Pagtawag dito, automatic na mag-a-update ang URL bar
        switchTab(activeSub);

        /**
         * 4. CLICK HANDLER
         */
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                if (!e.ctrlKey && !e.metaKey) {
                    e.preventDefault();
                    const tid = this.getAttribute('data-tab');
                    switchTab(tid);
                }
            });
        });

        /**
         * 5. IFRAME LOAD SYNC
         */
        iframe.addEventListener('load', function() {
            if (isSwitchingTab) return;
            try {
                const iframeSrc = iframe.contentWindow.location.pathname.split('/').pop();
                let activeTabId = '';
                
                if (iframeSrc.includes('records')) activeTabId = 'records';
                else if (iframeSrc.includes('history')) activeTabId = 'history';
                
                if (activeTabId) {
                    tabs.forEach(t => {
                        t.classList.remove('active');
                        if (t.getAttribute('data-tab') === activeTabId) t.classList.add('active');
                    });
                    
                    // Sync parent URL also when navigating inside iframe
                    if (window.parent !== window.self) {
                        const newURL = window.parent.location.origin + window.parent.location.pathname + 
                                       '?page=studmedicalrecords.php&subpage=' + iframeSrc;
                        window.parent.history.replaceState({ path: newURL }, '', newURL);
                    }
                }
            } catch(e) { }
        });
    });
</script>
</body>
</html>