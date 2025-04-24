<?php
header("Content-Type: application/json");
require_once("../db.php");

$id = $_GET['id'] ?? '';
if (!$id) {
    http_response_code(400);
    echo json_encode(["error" => "Missing license ID"]);
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM licenses WHERE id = ?");
$stmt->execute([$id]);
$license = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$license) {
    http_response_code(404);
    echo json_encode(["error" => "License not found"]);
    exit;
}

echo json_encode([
    "owner" => $license["owner"],
    "product" => $license["product"],
    "creation_date" => (int)$license["creation_date"],
    "ips" => explode(",", $license["ips"])
]);
?>
