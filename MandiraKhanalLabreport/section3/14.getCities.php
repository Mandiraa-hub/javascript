<?php
// Array of countries and their cities
$countriesAndCities = [
    "USA" => ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix"],
    "India" => ["Mumbai", "Delhi", "Bangalore", "Hyderabad", "Chennai"],
    "Canada" => ["Toronto", "Vancouver", "Montreal", "Ottawa", "Calgary"]
];

// Check if the POST request contains a country
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['country'])) {
    $selectedCountry = trim($_POST['country']);

    // Check if the country exists in the array
    if (array_key_exists($selectedCountry, $countriesAndCities)) {
        // Return the cities as a JSON response
        echo json_encode($countriesAndCities[$selectedCountry]);
    } else {
        // Return an empty array if the country is not found
        echo json_encode([]);
    }
} else {
    // Invalid request
    http_response_code(400);
    echo json_encode(["error" => "Invalid request"]);
}
?>
