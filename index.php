<?php
$slackName = isset($_GET['slack_name']) ? $_GET['slack_name'] : '';
$track = isset($_GET['track']) ? $_GET['track'] : '';

if ($track !== 'Backend') {
    http_response_code(200);
    echo json_encode(['error' => 'Invalid track']);
    exit;
}

$currentDayOfWeek = date('l');

// Time with validation of +/-2 hours
$currentTime = gmdate('Y-m-d H:i:s');
$currentTimeUTC = new DateTime($currentTime, new DateTimeZone('UTC'));
$currentTimeUTC->modify('-2 hours'); // Adjust for +/-2 UTC

// GitHub File
$github_file_URL = 'https://github.com/adeyermi/zuri-task-/blob/main/index.php';

// GitHub repo
$github_repo_URL = 'https://github.com/adeyermi/zuri-task-';

$response = [
    'slack_name' => 'Adeyermi', 
    'day_of_week' => $currentDayOfWeek,
    'current_utc_time' => $currentTimeUTC->format('Y-m-d \TH:i:s\Z'),
    'track' => 'Backend',
    'github_file_url' => "https://github.com/adeyermi/zuri-task-/blob/main/index.php",
    'github_repo_url' => 'https://github.com/adeyermi/zuri-task-',
    'status_code' => 200,
];


http_response_code(200);

header('Content-Type: application/json');

echo json_encode($response);
?>
