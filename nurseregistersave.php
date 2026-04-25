<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    $filename = 'nurseregisterexample.json';
    
    // Read existing data if file exists
    $existing = [];
    if (file_exists($filename)) {
        $existing = json_decode(file_get_contents($filename), true);
        // If existing is not an array, make it one
        if (!is_array($existing)) {
            $existing = [];
        }
    }
    
    // Check for duplicate email
    $duplicateEmail = false;
    $duplicateStaffId = false;
    $existingEntry = null;
    
    foreach ($existing as $entry) {
        // Check if email already exists
        if (isset($entry['email']) && $entry['email'] === $data['email']) {
            $duplicateEmail = true;
            $existingEntry = $entry;
            break;
        }
        // Check if staff ID already exists
        if (isset($entry['staffId']) && $entry['staffId'] === $data['staffId']) {
            $duplicateStaffId = true;
            $existingEntry = $entry;
            break;
        }
    }
    
    // Return error if duplicate found
    if ($duplicateEmail) {
        echo json_encode([
            'success' => false, 
            'message' => 'Duplicate registration! This email "' . $data['email'] . '" is already registered.',
            'duplicate_field' => 'email',
            'existing_registration' => [
                'firstName' => $existingEntry['firstName'] ?? 'Unknown',
                'lastName' => $existingEntry['lastName'] ?? 'Unknown',
                'email' => $existingEntry['email'] ?? 'Unknown',
                'staffId' => $existingEntry['staffId'] ?? 'Unknown',
                'registeredAt' => $existingEntry['registeredAt'] ?? 'Unknown'
            ]
        ]);
        exit;
    }
    
    if ($duplicateStaffId) {
        echo json_encode([
            'success' => false, 
            'message' => 'Duplicate registration! This Staff ID "' . $data['staffId'] . '" is already registered.',
            'duplicate_field' => 'staffId',
            'existing_registration' => [
                'firstName' => $existingEntry['firstName'] ?? 'Unknown',
                'lastName' => $existingEntry['lastName'] ?? 'Unknown',
                'email' => $existingEntry['email'] ?? 'Unknown',
                'staffId' => $existingEntry['staffId'] ?? 'Unknown',
                'registeredAt' => $existingEntry['registeredAt'] ?? 'Unknown'
            ]
        ]);
        exit;
    }
    
    // No duplicates found - add new registration
    $existing[] = $data;
    file_put_contents($filename, json_encode($existing, JSON_PRETTY_PRINT));
    
    echo json_encode([
        'success' => true, 
        'filename' => $filename,
        'message' => 'Registration successful!',
        'total_registrations' => count($existing)
    ]);
    
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>