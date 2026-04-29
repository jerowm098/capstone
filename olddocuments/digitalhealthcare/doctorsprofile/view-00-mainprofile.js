$(document).ready(function() {

    // --- 1. POP-UP NOTIFICATION LOGIC (STATUS CHECKER) ---
    // Babasahin nito kung may ?status=success sa URL pagkatapos ng Save Changes
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
        Swal.fire({
            title: 'Saved!',
            text: 'Your profile has been updated successfully.',
            icon: 'success',
            confirmButtonColor: '#212529',
            timer: 3000
        });
        // Linisin ang URL para hindi mag-pop up ulit sa refresh
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (status === 'error') {
        Swal.fire({
            title: 'Error!',
            text: 'Something went wrong while updating your profile.',
            icon: 'error',
            confirmButtonColor: '#212529'
        });
    }

// --- 2. TAB PERSISTENCE ENGINE (LocalStorage) ---
    // Ito ang nagpapanatili ng tab kahit i-refresh ang page
    let lastTabId = localStorage.getItem("activeTab") || "v-pills-dashboard";
    activateTab(lastTabId);

    // Click event para sa navigation tabs
$(document).on("click", ".nav-link[data-bs-toggle='pill']", function() {
    // Alisin ang active class sa lahat bago i-apply sa bago
    $(".nav-link").removeClass("active");
    $(this).addClass("active");

    let targetId = $(this).attr("data-bs-target").replace("#", "");
    localStorage.setItem("activeTab", targetId);
    updateHeaderTitle(targetId);
});





    // --- 2. FIND USER / VIEW PROFILE MODAL LOGIC ---
    // Ilagay ito dito para kasama sa initialization
$(document).on("click", ".btn-view-user", function() {
    const data = $(this).data(); 
    
    // Siguraduhin na ang mapping ay tugma sa data- attributes ng button
    $("#v-name").text(data.fname + " " + data.lname);
    $("#v-email").text(data.email);
    $("#v-phone").text(data.phone); // Ito ay kukuha sa data-phone
    $("#v-expertise").text(data.expertise);
    $("#v-gender").text(data.gender);
    $("#v-birthday").text(data.bday); // Ito ay kukuha sa data-bday

    // Avatar Logic
    const initials = (data.fname.charAt(0) + data.lname.charAt(0)).toUpperCase();
    $("#v-avatar").text(initials);

    // Ipakita ang modal
    var modalElement = document.getElementById('viewUserModal');
    var myModal = new bootstrap.Modal(modalElement);
    myModal.show();
});



    
    // 3. Click event
function activateTab(tabId) {
    // 1. Hanapin ang button/link na may tamang data-bs-target
    let $targetBtn = $(`.nav-link[data-bs-target="#${tabId}"]`);
    
    if ($targetBtn.length > 0) {
        // 2. KRITIKAL: Alisin ang lahat ng 'active' class sa lahat ng nav-links
        // para walang double highlight sa refresh.
        $(".nav-link").removeClass("active");

        // 3. I-activate ang tamang tab gamit ang Bootstrap Tab API
        let tabTrigger = new bootstrap.Tab($targetBtn[0]);
        tabTrigger.show();

        // 4. I-re-add ang active class sa mismong pinindot (dahil minsan inaalis ng .removeClass)
        $targetBtn.addClass("active");

        // 5. Logic para sa Sub-menus (Collapse)
        let $parentCollapse = $targetBtn.closest('.collapse');
        if ($parentCollapse.length > 0) {
            $parentCollapse.addClass("show"); // Panatilihing bukás ang menu
            
            // I-rotate ang chevron icon ng parent
            let parentId = $parentCollapse.attr('id');
            $(`[data-bs-target="#${parentId}"] .bi-chevron-down`).addClass("rotate-icon");
            
            // PAALALA: Huwag lagyan ng 'active' class ang PARENT button 
            // kung ayaw mong maging kulay puti rin ang background nito.
        }
        
        updateHeaderTitle(tabId);
    }
}

    function updateHeaderTitle(tabId) {
        // Kukuha ng text sa h2 na may class 'main-tab-title' sa loob ng tab-pane
        let title = $(`#${tabId} .main-tab-title`).first().text();
        if (title) {
            $("#nav-header-target").html(`<h2 class="fw-bold m-0" style="font-size: 1.5rem;">${title}</h2>`);
        }
    }

    // Logout: Clear storage
    $("#logout-link").click(function() {
        localStorage.removeItem("activeTab");
    });

    function updateHeaderTitle(tabId) {
        // Kukunin ang text ng <h2> sa loob ng aktibong tab pane
        let title = $(`#${tabId} .main-tab-title`).first().text() || 
                    $(`#${tabId} h2`).first().text(); // Fallback kung walang class
        
        if (title) {
            $("#nav-header-target").html(`<h2 class="fw-bold m-0" style="font-size: 1.5rem;">${title}</h2>`);
        }
    }


    // --- 3. PHONE NUMBER PREFIX LOGIC ---
    // Gagamit tayo ng delegation dahil ang form ay nalo-load via AJAX (.load())


        $(document).on("submit", "#editProfileForm", function(e) {
            let phoneSuffix = $("#contact_num").val();
            if (phoneSuffix.length !== 9) {
                e.preventDefault();
                Swal.fire({
                    title: 'Error!',
                    text: 'Please enter exactly 9 digits after +639',
                    icon: 'warning'
                });
                return false;
            }
        });

 



});










/* --- EDIT PHOTO FUNCTION --- */

// 1. Pag-click ng button, i-trigger ang hidden file input
$(document).on("click", "#btnEditPhoto", function() {
    $("#fileInput").click();
});

$(document).on("change", "#fileInput", function(e) {
    const file = e.target.files[0];
    if (file) {
        let formData = new FormData();
        formData.append('image', file);

        // AJAX call para i-save sa database
        $.ajax({
            url: '../upload-profile.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let data = JSON.parse(response);
                if(data.status === "success") {
                    // Ito ang nagpapapermanent sa preview
                    $("#profilePreview").attr("src", data.path);
                    
                    Swal.fire({
                        title: 'Saved!',
                        text: 'Profile picture has been updated permanently.',
                        icon: 'success',
                        timer: 2000
                    });
                }
            }
        });
    }
});


function showTab(tabId) {
    // Itago lahat ng sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.style.display = 'none';
    });

    // Ipakita ang napiling section
    const activeTab = document.getElementById(tabId + '-tab');
    if (activeTab) {
        activeTab.style.display = 'block';
        
        // Update ang header title kung kinakailangan
        const title = activeTab.querySelector('h2').innerText;
        document.getElementById('nav-header-target').innerHTML = 
            '<h2 class="fw-bold m-0" style="font-size: 1.5rem;">' + title + '</h2>';
    }
}



/* FIND PROFILE JS */

/* LIVESEARCH  */
$(document).ready(function() {
    let typingTimer;
    const doneTypingInterval = 400; 
    const $input = $('#searchInput');

    function liveSearch(pageNum = 1) {
        let query = $input.val() ? $input.val().trim() : '';
        
        $.ajax({
            url: '../fetch-users.php', // Binago natin ang target file dito
            type: 'GET',
            data: { 
                search: query, 
                page: pageNum,
                ajax: 1 
            },
            dataType: 'json',
            success: function(response) {
                $('#userTableBody').html(response.table);
                $('#paginationContainer .d-flex').html(response.pagination);
                $('#totalUsersBadge').text('Total Users: ' + response.total);
                $('#searchStatus').html(response.searchLabel);
            },
            error: function() {
                console.log("Error fetching data.");
            }
        });
    }

    // Initial Load ng data pagbukas ng page
    liveSearch(1);

    $input.on('keyup', function (e) {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(liveSearch, doneTypingInterval);
    });

    $(document).on('click', '#clearSearch', function(e) {
        e.preventDefault();
        $input.val('');
        liveSearch(1);
    });

    $(document).on('click', '.page-nav-link', function(e) {
        e.preventDefault();
        let pageNum = $(this).data('page');
        if(pageNum) liveSearch(pageNum);
    });

    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        clearTimeout(typingTimer);
        liveSearch();
    });
});



// DELETE USER FUNCTION
// DELETE USER FUNCTION
$(document).on('click', '.btn-delete-user', function() {
    const userId = $(this).data('id');
    const userName = $(this).data('name');

    // SweetAlert2 Confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete " + userName + ". This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#212529', 
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // AJAX Call to delete
            $.ajax({
                url: '../delete-user.php',
                type: 'POST',
                data: { id: userId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // 1. Ipakita ang success message
                        Swal.fire({
                            title: 'Deleted!',
                            text: response.message,
                            icon: 'success',
                            timer: 2000, // Kusa itong mawawala sa loob ng 1.5 seconds
                            showConfirmButton: false
                        });

                        // 2. KRITIKAL: Tawagin muli ang liveSearch para mag-update ang table
                        // Ginagamit nito ang kasalukuyang search input at page 1
                        if (typeof liveSearch === "function") {
                            liveSearch(1); 
                        } else {
                            // Fallback: kung hindi ma-access ang liveSearch, i-reload ang page
                            location.reload();
                        }
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error!', 'Something went wrong with the server.', 'error');
                }
            });
        }
    });
});





// --- EDIT PROFILE TAB LOGIC JS PARTSSSS ---

// 1. Toggle Password Visibility
$(document).on('click', '.toggle-password', function() {
    const input = $(this).closest('.input-group').find('input');
    const icon = $(this).find('i');
    const isPassword = input.attr('type') === 'password';
    
    input.attr('type', isPassword ? 'text' : 'password');
    icon.toggleClass('bi-eye-slash bi-eye');
});

// 2. Name Validation (Bawal numbers)
$(document).on('input', '#fname, #lname', function() {
    let input = $(this);
    let hint = $('#hint-' + input.attr('id'));
    
    input.val(input.val().replace(/[0-9]/g, '')); 
    
    if (input.val().trim().length < 2) {
        hint.text("Name too short").addClass("text-danger").removeClass("text-success text-muted");
    } else {
        hint.text("Looks good!").addClass("text-success").removeClass("text-danger text-muted");
    }
});

// 3. Password Match & Strength Logic
$(document).on('input', '#newPassword, #confirmPassword', function() {
    const newPass = $('#newPassword').val();
    const confPass = $('#confirmPassword').val();
    const hintPass = $('#hint-password');
    const hintConf = $('#hint-confirm');

    // Strength
    if (newPass.length > 0 && newPass.length < 6) {
        hintPass.text("Too short (min 6)").addClass("text-danger").removeClass("text-success text-muted");
    } else if (newPass.length >= 6) {
        hintPass.text("Strong enough").addClass("text-success").removeClass("text-danger text-muted");
    } else {
        hintPass.text("Min. 6 characters").addClass("text-muted").removeClass("text-danger text-success");
    }

    // Match
    if (confPass === "") {
        hintConf.text("Passwords must match").addClass("text-muted").removeClass("text-danger text-success");
    } else if (confPass === newPass) {
        hintConf.text("Passwords match!").addClass("text-success").removeClass("text-danger text-muted");
    } else {
        hintConf.text("Passwords do not match").addClass("text-danger").removeClass("text-success text-muted");
    }
});

// 4. Contact Number Validation
$(document).on('input', '#contact_num', function() {
    let input = $(this);
    input.val(input.val().replace(/[^0-9]/g, '')); 
    
    if (input.val().length === 9) {
        $('#hint-contact').text("Valid number format").addClass("text-success").removeClass("text-danger text-muted");
    } else {
        $('#hint-contact').text("Enter exactly 9 digits").addClass("text-danger").removeClass("text-success text-muted");
    }
});

// 5. Email Validation
$(document).on('input', '#email', function() {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const hintEmail = $('#hint-email');
    
    if (re.test($(this).val())) {
        hintEmail.text("Valid email address").addClass("text-success").removeClass("text-danger text-muted");
    } else {
        hintEmail.text("Invalid email format").addClass("text-danger").removeClass("text-success text-muted");
    }
});

// 6. Final Form Submission
$(document).on('submit', '#editProfileForm', function(e) {
    const newPass = $('#newPassword').val();
    const confPass = $('#confirmPassword').val();

    if (newPass.length > 0 && newPass.length < 6) {
        e.preventDefault();
        Swal.fire({ icon: 'error', title: 'Security', text: 'New password must be at least 6 characters.' });
    } else if (newPass !== confPass) {
        e.preventDefault();
        Swal.fire({ icon: 'error', title: 'Mismatch', text: 'Passwords do not match!' });
    }
});



