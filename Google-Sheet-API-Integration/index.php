<?php

require './app/bootstrap.php';
include_once 'constant.php';

use App\Services\SpreadsheetSnippets;

$userEmail = $_POST['subscribeEmail'];


$googleSheetTitle = $_POST['subscribeSheet'] ?: null;
$validationError = [];
$isValid = true;

// validation
if (!$userEmail) {
    $isValid = false;
    $validationError['emailErr'] = "Email is a required field";
}

if (!($googleSheetTitle == SHEET_SUBSCRIBE || $googleSheetTitle == SHEET_FOLLOW)) {
    $isValid = false;
    $validationError['sheetErr'] = "Invalid sheet format";
}

if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
    $isValid = false;
    $validationError['emailErr'] = "Invalid email format";
}

if (!$isValid) {
    $response = [
        'status' => false,
        'message' => $validationError,
    ];
    echo json_encode($response);
    exit;
}

// Google Sheet connect
$client = new Google\Client();
$client->setApplicationName(GOOGLE_SHEET_APP_NAME);
$client->setScopes(GOOGLE_SHEET_SCOPES);
$client->setAuthConfig(GOOGLE_SHEET_AUTH_CONFIG);
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

$service = new Google\Service\Sheets($client);

// append Google Sheet
$serviceSheet = new SpreadsheetSnippets($service);
$range = $googleSheetTitle . '!A1';
$valueInputOption = 'RAW';


try {
    $serviceSheet->appendValues(SPREAD_SHEET_ID, $range, $valueInputOption, [[$userEmail]]);
} catch (Exception $e) {
    $response = [
        'status' => false,
        'message' => 'Bad request. Please contact with administrator.'
    ];
    echo json_encode($response);
    exit;
}

$response = [
    'status' => true,
    'message' => 'data appended.'
];
echo json_encode($response);
exit;

