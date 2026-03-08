<?php
session_start();
require_once '../db_conn.php';

// --- PAGINATION LOGIC START ---
$limit = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$query_parts = "id, fname, lname, email, contact_num, expertise, gender, birth_month, birth_day, birth_year, created_at";

function highlightSearch($text, $search) {
    if (empty($search)) return htmlspecialchars($text);
    return preg_replace('/(' . preg_quote(htmlspecialchars($search), '/') . ')/i', '<span class="bg-warning px-1 rounded">$1</span>', htmlspecialchars($text));
}

// 1. Kunin ang TOTAL count
if (!empty($search)) {
    $count_sql = "SELECT COUNT(*) as total FROM users WHERE fname LIKE ? OR lname LIKE ? OR email LIKE ?";
    $stmt_c = $conn->prepare($count_sql);
    $searchTerm = "%$search%";
    $stmt_c->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt_c->execute();
    $total_result = $stmt_c->get_result()->fetch_assoc();
} else {
    $total_result = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc();
}
$total_users = $total_result['total'];
$total_pages = ceil($total_users / $limit);

// 2. Kunin ang DATA
if (!empty($search)) {
    $sql = "SELECT $query_parts FROM users 
            WHERE fname LIKE ? OR lname LIKE ? OR email LIKE ?
            ORDER BY created_at DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $searchTerm, $searchTerm, $searchTerm, $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT $query_parts FROM users ORDER BY created_at DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $limit, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
}

// --- CHECK IF AJAX REQUEST ---
// Kung ang request ay galing sa AJAX search, i-return lang ang table content
if (isset($_GET['ajax'])) {
    ob_start(); // Start buffer
    ?>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td class="ps-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-3 bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center">
                            <?php echo strtoupper($row['fname'][0] . $row['lname'][0]); ?>
                        </div>
                        <div class="overflow-hidden">
                            <div class="fw-bold text-dark text-truncate">
                                <?php echo highlightSearch($row['fname'] . " " . $row['lname'], $search); ?>
                            </div>
                            <small class="text-muted">ID: #<?php echo $row['id']; ?></small>
                        </div>
                    </div>
                </td>
                <td class="text-truncate"><?php echo highlightSearch($row['email'], $search); ?></td> 
                <td><?php echo htmlspecialchars($row['contact_num']); ?></td>
                <td class="text-center">
                    <span class="badge bg-light text-dark border expertise-badge">
                        <?php echo htmlspecialchars($row['expertise']); ?>
                    </span>
                </td>
                <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-1">
                        <button class="btn btn-sm btn-outline-dark btn-view-user px-3" 
                            data-id="<?php echo $row['id']; ?>"
                            data-fname="<?php echo htmlspecialchars($row['fname']); ?>"
                            data-lname="<?php echo htmlspecialchars($row['lname']); ?>"
                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                            data-phone="<?php echo htmlspecialchars($row['contact_num']); ?>"
                            data-gender="<?php echo htmlspecialchars($row['gender']); ?>"
                            data-expertise="<?php echo htmlspecialchars($row['expertise']); ?>"
                            data-bday="<?php echo htmlspecialchars($row['birth_month'] . ' ' . $row['birth_day'] . ', ' . $row['birth_year']); ?>">
                            View
                        </button>
                        <button class="btn btn-sm btn-light border btn-delete-user" 
                            data-id="<?php echo $row['id']; ?>" 
                            data-name="<?php echo htmlspecialchars($row['fname'] . ' ' . $row['lname']); ?>">
                            <i class="bi bi-trash text-danger"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6" class="text-center py-5">
                <i class="bi bi-people text-muted" style="font-size: 8rem;"></i>
                <p class="text-muted mt-2">No users found.</p>
            </td>
        </tr>
    <?php endif; ?>
    <?php
    $table_html = ob_get_clean();

    // Generate Pagination HTML
    ob_start();
    if ($total_pages > 1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mb-0">
                <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link page-nav-link text-dark" href="#" data-page="<?php echo $page - 1; ?>"><i class="bi bi-chevron-left"></i></a>
                </li>
                <?php for($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                        <a class="page-link page-nav-link <?php echo ($page == $i) ? 'bg-dark border-dark text-white' : 'text-dark'; ?>" 
                           href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                    <a class="page-link page-nav-link text-dark" href="#" data-page="<?php echo $page + 1; ?>"><i class="bi bi-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
    <?php endif;
    $pagination_html = ob_get_clean();

    // I-return bilang JSON
    echo json_encode([
        'table' => $table_html,
        'pagination' => $pagination_html,
        'total' => $total_users,
        'searchLabel' => !empty($search) ? 'Showing results for: <strong>"'.htmlspecialchars($search).'"</strong> <a href="#" id="clearSearch" class="text-decoration-none ms-2 text-danger">× Clear Search</a>' : ''
    ]);
    exit;
}
?>

<link rel="stylesheet" href="view-02.2-findprofiletab.css">

<div class="container-fluid px-4 py-1">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold m-0">User Directory</h2>
            <small class="text-muted">Manage and view medical professional profiles</small>
        </div>
        <span class="badge bg-dark px-3 py-2" id="totalUsersBadge">Total Users: <?php echo $total_users; ?></span>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3">
            <form id="searchForm" class="row g-2">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" id="searchInput" class="form-control border-start-0 py-2" 
                               placeholder="Search by name or email..." value="<?php echo htmlspecialchars($search); ?>" autocomplete="off">
                    </div>
                </div>
            </form>
            <div id="searchStatus" class="mt-2 small text-muted">
                <?php if(!empty($search)): ?>
                    Showing results for: <strong>"<?php echo htmlspecialchars($search); ?>"</strong> 
                    <a href="#" id="clearSearch" class="text-decoration-none ms-2 text-danger">× Clear Search</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm d-flex flex-column" style="min-height: auto;">
        <div class="table-responsive flex-grow-1">
            <table class="table table-hover align-middle mb-0 user-directory-table">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 col-name">Name</th>
                        <th class="col-email">Email</th>
                        <th class="col-contact">Contact</th>
                        <th class="col-expertise text-center">Expertise</th>
                        <th class="col-joined">Joined Date</th>
                        <th class="text-center col-action">Action</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <?php 
                    // Initial Load
                    $result->data_seek(0);
                    while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle me-3 bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center">
                                        <?php echo strtoupper($row['fname'][0] . $row['lname'][0]); ?>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="fw-bold text-dark text-truncate">
                                            <?php echo highlightSearch($row['fname'] . " " . $row['lname'], $search); ?>
                                        </div>
                                        <small class="text-muted">ID: #<?php echo $row['id']; ?></small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-truncate"><?php echo highlightSearch($row['email'], $search); ?></td> 
                            <td><?php echo htmlspecialchars($row['contact_num']); ?></td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border expertise-badge">
                                    <?php echo htmlspecialchars($row['expertise']); ?>
                                </span>
                            </td>
                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <button class="btn btn-sm btn-outline-dark btn-view-user px-3" 
                                        data-id="<?php echo $row['id']; ?>"
                                        data-fname="<?php echo htmlspecialchars($row['fname']); ?>"
                                        data-lname="<?php echo htmlspecialchars($row['lname']); ?>"
                                        data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                        data-phone="<?php echo htmlspecialchars($row['contact_num']); ?>"
                                        data-gender="<?php echo htmlspecialchars($row['gender']); ?>"
                                        data-expertise="<?php echo htmlspecialchars($row['expertise']); ?>"
                                        data-bday="<?php echo htmlspecialchars($row['birth_month'] . ' ' . $row['birth_day'] . ', ' . $row['birth_year']); ?>">
                                        View
                                    </button>
                                    <button class="btn btn-sm btn-light border btn-delete-user" 
                                        data-id="<?php echo $row['id']; ?>" 
                                        data-name="<?php echo htmlspecialchars($row['fname'] . ' ' . $row['lname']); ?>">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer bg-white border-0 py-3" id="paginationContainer">
            <div class="d-flex justify-content-center">
                <?php if ($total_pages > 1): ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link page-nav-link text-dark" href="#" data-page="<?php echo $page - 1; ?>"><i class="bi bi-chevron-left"></i></a>
                        </li>
                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                <a class="page-link page-nav-link <?php echo ($page == $i) ? 'bg-dark border-dark text-white' : 'text-dark'; ?>" 
                                   href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link page-nav-link text-dark" href="#" data-page="<?php echo $page + 1; ?>"><i class="bi bi-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title fw-bold" id="viewUserModalLabel">User Profile Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="text-center mb-4">
                    <div id="v-avatar" class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold;">
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Full Name:</strong> <span id="v-name" class="text-muted"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Email:</strong> <span id="v-email" class="text-muted"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Contact:</strong> <span id="v-phone" class="text-muted"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Expertise:</strong> <span id="v-expertise" class="text-muted"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Gender:</strong> <span id="v-gender" class="text-muted"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Birthday:</strong> <span id="v-birthday" class="text-muted"></span>
                    </li>
                </ul>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light border w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let typingTimer;
    const doneTypingInterval = 400; // Tumaas ang delay para hindi laggy habang nagta-type
    const $input = $('#searchInput');

    // Live Filtering Function (AJAX)
    function liveSearch(pageNum = 1) {
        let query = $input.val().trim();
        
        $.ajax({
            url: 'view-02.2-findprofiletabhtml.php',
            type: 'GET',
            data: { 
                search: query, 
                page: pageNum,
                ajax: 1 
            },
            dataType: 'json',
            success: function(response) {
                // I-update lang ang mga specific parts, hindi ang buong page
                $('#userTableBody').html(response.table);
                $('#paginationContainer .d-flex').html(response.pagination);
                $('#totalUsersBadge').text('Total Users: ' + response.total);
                $('#searchStatus').html(response.searchLabel);
            }
        });
    }

    // Event kapag nag-type
    $input.on('keyup', function (e) {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(liveSearch, doneTypingInterval);
    });

    // Clear Search Logic
    $(document).on('click', '#clearSearch', function(e) {
        e.preventDefault();
        $input.val('');
        liveSearch(1);
    });

    // Pagination Logic (delegated)
    $(document).on('click', '.page-nav-link', function(e) {
        e.preventDefault();
        let pageNum = $(this).data('page');
        if(pageNum) liveSearch(pageNum);
    });

    // Submit form (prevent refresh)
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        clearTimeout(typingTimer);
        liveSearch();
    });
});
</script>