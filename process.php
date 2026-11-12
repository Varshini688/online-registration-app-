<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullname = htmlspecialchars(trim($_POST['fullname'] ?? ''));
    $email    = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone    = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $dob      = htmlspecialchars(trim($_POST['dob'] ?? ''));
    $gender   = htmlspecialchars(trim($_POST['gender'] ?? ''));
    $course   = htmlspecialchars(trim($_POST['course'] ?? ''));
    $address  = nl2br(htmlspecialchars(trim($_POST['address'] ?? '')));

    $appId = "APP-" . strtoupper(substr(md5(uniqid()), 0, 8));
    $submittedAt = date("d M Y, h:i A");

    echo "
    <div class='success-banner'>
        &#10003; Application Submitted Successfully! Reference ID: <strong>{$appId}</strong>
    </div>
    <h2>Registration Summary</h2>
    <p class='subtitle'>Submitted on {$submittedAt}</p>

    <table class='summary-table'>
        <tr>
            <th>Application ID</th>
            <td><strong>{$appId}</strong></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td>{$fullname}</td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td>{$email}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{$phone}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{$dob}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>{$gender}</td>
        </tr>
        <tr>
            <th>Selected Program</th>
            <td>{$course}</td>
        </tr>
        <tr>
            <th>Residential Address</th>
            <td>{$address}</td>
        </tr>
    </table>

    <div class='no-print'>
        <button onclick='window.print()' class='btn-primary'>Print / Save as PDF</button>
        <button onclick='resetForm()' class='btn-secondary'>Submit Another Response</button>
    </div>
    ";
} else {
    http_response_code(405);
    echo "Invalid Request Method.";
}
?>
