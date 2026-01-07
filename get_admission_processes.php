<?php
header('Content-Type: application/json');
if (!isset($_GET['program_id']) || !isset($_GET['type'])) {
    echo json_encode(['success' => false, 'message' => 'Missing parameters']);
    exit();
}

$program_id = intval($_GET['program_id']);
$type = in_array($_GET['type'], ['UG', 'PG']) ? $_GET['type'] : 'UG';
require_once '../config/db.php';

try {
    $database = new Database();
    $db = $database->getConnection();    
    $query = "SELECT * FROM admission_processes WHERE program_id = ? AND program_type = ? AND is_active = 1 ORDER BY display_order";    
    $stmt = $db->prepare($query);
    $stmt->bind_param("is", $program_id, $type);
    $stmt->execute();
    $result = $stmt->get_result();    
    $processes = [];
    while ($row = $result->fetch_assoc()) {
        $processes[] = $row;
    }    
    $stmt->close();
    $db->close();   
    echo json_encode([
        'success' => true,
        'processes' => $processes
    ]);
    
} catch (Exception $e) {
    error_log("Database error in get_admission_processes.php: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error'
    ]);
}
?>
