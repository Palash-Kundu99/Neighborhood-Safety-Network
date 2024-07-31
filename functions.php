<?php
include 'db.php';

// Function to get paginated incidents
function getPaginatedIncidents($limit, $offset) {
    global $pdo;
    // Prepare SQL statement with proper ordering by ID
    $stmt = $pdo->prepare("
        SELECT * 
        FROM incidents 
        ORDER BY id DESC 
        LIMIT :limit 
        OFFSET :offset
    ");
    
    // Bind parameters
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get total number of incidents
function getIncidentCount() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM incidents");
    return $stmt->fetchColumn();
}

// Function to add a new incident
function addIncident($name, $description, $flat_number, $floor_number, $incident_time, $latitude, $longitude, $contact_info) {
    global $pdo;
    $stmt = $pdo->prepare("
        INSERT INTO incidents (name, description, flat_number, floor_number, incident_time, latitude, longitude, contact_info) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    return $stmt->execute([$name, $description, $flat_number, $floor_number, $incident_time, $latitude, $longitude, $contact_info]);
}

// Handle AJAX requests for incidents
if (isset($_GET['action']) && $_GET['action'] == 'getIncidents') {
    header('Content-Type: application/json');
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 2;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
    // Calculate offset based on the page number
    $offset = ($page - 1) * $limit;

    $incidents = getPaginatedIncidents($limit, $offset);
    echo json_encode($incidents);
    exit;
}

// Handle AJAX requests for total incidents count
if (isset($_GET['action']) && $_GET['action'] == 'getIncidentCount') {
    header('Content-Type: application/json');
    $count = getIncidentCount();
    echo json_encode(['count' => $count]);
    exit;
}
?>
