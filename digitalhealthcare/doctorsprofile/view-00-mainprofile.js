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


    // 1. Kunin ang huling file na binuksan mula sa storage, default ay dashboard
    let lastFile = localStorage.getItem("activeTab") || "view-01-tabdashboard.html";

    // 2. I-load ang huling page at i-activate ang tamang button
    loadAndRelocate(lastFile);
    
    // Hanapin ang button na may katapat na data-file at lagyan ng 'active'
    /* $(`.nav-link[data-file="${lastFile}"]`).addClass("active"); */

    // 3. I-activate ang tamang button/link
    let $activeLink = $(`.nav-link[data-file="${lastFile}"]`);
    $activeLink.addClass("active");

    // --- SMART COLLAPSE START ---
    // Hanapin kung ang active link ay nasa loob ng isang sub-menu (collapse)
    let $parentCollapse = $activeLink.closest('.collapse');
    
    if ($parentCollapse.length > 0) {
        // Kung nasa loob ng sub-menu, piliting manatiling nakabukas (show)
        $parentCollapse.addClass("show");
        
        // I-rotate ang arrow icon ng parent button
        let parentId = $parentCollapse.attr('id');
        $(`[data-bs-target="#${parentId}"] .bi-chevron-down`).addClass("rotate-icon");
    }
    // --- SMART COLLAPSE END ---



    
    // 3. Click event
    $(document).on("click", ".nav-link[data-file]", function(e) {
        /* e.preventDefault();
        let file = $(this).data("file"); */
        
        // I-save sa localStorage para pag ni-refresh, ito pa rin ang lilitaw

        /* localStorage.setItem("activeTab", file); */
        
        /* $(".nav-link").removeClass("active");
        $(this).addClass("active");

        loadAndRelocate(file); */

    if ($(this).is('a')) {
            e.preventDefault();
        }
        
        let file = $(this).data("file");
        if(!file) return;

        localStorage.setItem("activeTab", file);
        
        // Highlight sidebar if applicable
        $(".nav-link").removeClass("active");
        $(`.nav-link[data-file="${file}"]`).addClass("active");

        loadAndRelocate(file);



    });
    // ADD THIS PART: Clear storage on Logout
    $(document).on("click", "#logout-link", function() {
        localStorage.removeItem("activeTab");
        // No need to preventDefault if it's a real link to logout.php
    });


    // --- 3. PHONE NUMBER PREFIX LOGIC ---
    // Gagamit tayo ng delegation dahil ang form ay nalo-load via AJAX (.load())
    $(document).on("submit", "#editProfileForm", function(e) {
        // Humanap ng paraan para maisama ang +639 kung hindi mo binago ang PHP
        // Pero dahil inayos na natin ang PHP mo kanina, ang trabaho ng JS dito
        // ay siguraduhin na 9 digits lang ang pinapadala.
        
        let contactInput = $("#contactNum").val();
        if (contactInput.length !== 9) {
            e.preventDefault(); // Pigilan ang submit
            Swal.fire({
                title: 'Invalid Number',
                text: 'Please enter exactly 9 digits for the contact number.',
                icon: 'warning',
                confirmButtonColor: '#212529'
            });
        }
    });

        $(document).on("submit", "#editProfileForm", function(e) {
            let phoneSuffix = $("#contactNum").val();
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

        
// --- 4. DELETE USER LOGIC ---
$(document).on("click", ".btn-delete-user", function() {
    const userId = $(this).data("id");
    const userName = $(this).data("name");

    if (!userId) return;

    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to delete the profile of ${userName}.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#212529',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../delete-user.php',
                type: 'POST',
                data: { id: userId },
                dataType: 'json', // Sabihin sa jQuery na i-parse na ang JSON automatically
                success: function(res) {
                    if(res.status === "success") {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'User has been removed.',
                            icon: 'success',
                            confirmButtonColor: '#212529'
                        }).then(() => {
                            // Siguraduhin na tama ang pangalan ng file na ito:
                            loadAndRelocate('view-02.2-findprofiletabhtml.php'); 
                        });
                    } else {
                        Swal.fire('Error!', res.message || 'Could not delete user.', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    // Dito mo makikita kung ano talaga ang error ng PHP
                    console.error("Server Response:", xhr.responseText);
                    Swal.fire('Error!', 'Server error. Check console for details.', 'error');
                }
            });
        }
    });
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


function loadAndRelocate(file) {
    if(!file) return;

    $("#content-area").fadeOut(100, function() {
        $(this).load(file, function(response, status, xhr) {
            if (status == "error") {
                $(this).html("<div class='alert alert-danger'>Error: File not found.</div>");
            }

            // Lipat Header Logic
            let title = $(this).find("h2").first().text();
            if(title) {
                $("#nav-header-target").html('<h2 class="fw-bold m-0" style="font-size: 1.5rem;">' + title + '</h2>');
                $(this).find("h2").first().hide();
            }
            
            $(this).fadeIn(150);
            window.dispatchEvent(new Event('resize'));
        });
    });
}