<?php
require 'vendor/autoload.php'; // Include Composer's autoload if using MongoDB

// MongoDB connection
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->test->users;



// Function to validate date format
function validateDate($date, $format = 'd/m/Y') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $idNumber = trim($_POST['id_number']);
    $dob = trim($_POST['dob']);

    // Validation
    if (!preg_match('/^\d{13}$/', $idNumber)) {
        header('Location: index.html?error=ID Number must be exactly 13 digits');
        exit;
    }

    if (!validateDate($dob)) {
        header('Location: index.html?error=Date of Birth must be in the format dd/mm/yyyy');
        exit;
    }

    // Check for duplicates
    $existingUser = $collection->findOne(['id_number' => $idNumber]);
    if ($existingUser) {
        header('Location: index.html?error=Duplicate ID Number found. Please enter a unique ID Number.');
        exit;
    }

    // Insert data into MongoDB
    $data = [
        'name' => $name,
        'surname' => $surname,
        'id_number' => $idNumber,
        'date_of_birth' => $dob
    ];
    $collection->insertOne($data);

    echo "User information saved successfully!";
}
