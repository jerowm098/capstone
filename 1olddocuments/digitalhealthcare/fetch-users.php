<?php
// fetch-users.php
session_start();
require_once 'db_conn.php';
/* require_once '../db_conn.php'; */

$limit = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$query_parts = "id, fname, lname, email, contact_num, expertise, gender, birth_month, birth_day, birth_year, created_at";

function highlightSearch($text, $search) {
    if (empty($search)) return htmlspecialchars($text);
    return preg_replace('/(' . preg_quote(htmlspecialchars($search), '/') . ')/i', '<span class="bg-warning px-1 rounded">$1</span>', htmlspecialchars($text));
}

// 1. Get TOTAL count
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

// 2. Get DATA
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

// Build HTML for table
ob_start();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
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
    <?php }
} else { ?>
    <tr>
        <td colspan="6" class="text-center py-5">
            <i class="bi bi-people text-muted" style="font-size: 8rem;"></i>
            <p class="text-muted mt-2">No users found.</p>
        </td>
    </tr>
<?php }
$table_html = ob_get_clean();

// Build HTML for pagination
ob_start();
if ($total_pages > 1) { ?>
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
<?php }
$pagination_html = ob_get_clean();

echo json_encode([
    'table' => $table_html,
    'pagination' => $pagination_html,
    'total' => $total_users,
    'searchLabel' => !empty($search) ? 'Showing results for: <strong>"'.htmlspecialchars($search).'"</strong> <a href="#" id="clearSearch" class="text-decoration-none ms-2 text-danger">× Clear Search</a>' : ''
]);
exit;