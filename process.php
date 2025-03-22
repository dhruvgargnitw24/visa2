<?php
// process.php - Process the visa check form

if (isset($_POST['submit'])) {
    $country = $_POST['country'];
    
    if (empty($country)) {
        header("Location: index.php?message=Invalid country selection.&type=error");
        exit();
    }
    
    $visaInfo = '';
    
    switch ($country) {
        case 'USA':
            $visaInfo = "Visa required for most applicants.";
            break;
        case 'Canada':
            $visaInfo = "Visa required unless you have an eTA.";
            break;
        case 'India':
            $visaInfo = "Visa required before travel.";
            break;
        case 'UK':
            $visaInfo = "Visa depends on the duration of stay.";
            break;
        case 'Australia':
            $visaInfo = "eVisa available for eligible travelers.";
            break;
        default:
            $visaInfo = "Information not available for this country.";
    }
    
    header("Location: index.php?message=" . urlencode($country . ": " . $visaInfo) . "&type=success");
    exit();
} else {
    // If someone tries to access this file directly
    header("Location: index.php");
    exit();
}