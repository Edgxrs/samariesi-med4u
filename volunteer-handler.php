<?php
/**
 * Volunteer Application Form Handler
 * Standalone PHP handler for volunteer form submissions
 */

// Load WordPress compatibility
require_once 'wp-config.php';

// Set content type
header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Basic spam protection
if (empty($_POST) || !isset($_POST['name'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid form data']);
    exit;
}

// Sanitize form data
$name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$phone = filter_var($_POST['phone'] ?? '', FILTER_SANITIZE_STRING);
$age = filter_var($_POST['age'] ?? '', FILTER_SANITIZE_STRING);
$experience = filter_var($_POST['experience'] ?? '', FILTER_SANITIZE_STRING);
$question1 = filter_var($_POST['question1'] ?? '', FILTER_SANITIZE_STRING);
$question2 = filter_var($_POST['question2'] ?? '', FILTER_SANITIZE_STRING);
$question3 = filter_var($_POST['question3'] ?? '', FILTER_SANITIZE_STRING);
$question4 = filter_var($_POST['question4'] ?? '', FILTER_SANITIZE_STRING);
$question5 = filter_var($_POST['question5'] ?? '', FILTER_SANITIZE_STRING);

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($question1) || empty($question2) || empty($question3)) {
    echo json_encode(['success' => false, 'message' => 'Visi obligātie lauki ir jāaizpilda']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Nepareiza e-pasta adrese']);
    exit;
}

// Prepare email content for coordinator
$coordinator_email = 'gerhards.edgars@gmail.com'; // Replace with your test email address
$subject = 'Jauns brīvprātīgo pieteikums - Samarieši@Med4You';

$email_message = "Jauns brīvprātīgo pieteikums:\n\n";
$email_message .= "KONTAKTINFORMĀCIJA:\n";
$email_message .= "Vārds: $name\n";
$email_message .= "E-pasts: $email\n";
$email_message .= "Tālrunis: $phone\n";
$email_message .= "Vecums: $age\n";
$email_message .= "Pieredze: $experience\n\n";

$email_message .= "TESTA ATBILDES:\n";
$email_message .= "1. Motivācija:\n$question1\n\n";

// Format radio button answers
$conflict_answer = '';
switch($question2) {
    case 'stay_calm': $conflict_answer = 'Paliku mierīgs un mēģinātu noskaidrot problēmas cēloni'; break;
    case 'call_staff': $conflict_answer = 'Nekavējoties sauktu medicīnas personālu'; break;
    case 'leave_situation': $conflict_answer = 'Atstātu situāciju un vēlāk to apspriestu ar koordinatoru'; break;
    default: $conflict_answer = $question2;
}
$email_message .= "2. Rīcība konfliktsituācijā: $conflict_answer\n\n";

$time_answer = '';
switch($question3) {
    case '2-4_hours': $time_answer = '2-4 stundas'; break;
    case '5-8_hours': $time_answer = '5-8 stundas'; break;
    case '9+_hours': $time_answer = '9+ stundas'; break;
    default: $time_answer = $question3;
}
$email_message .= "3. Pieejamais laiks: $time_answer\n\n";

$transport_answer = '';
switch($question4) {
    case 'yes_car': $transport_answer = 'Ir auto un apliecība'; break;
    case 'no_car': $transport_answer = 'Nav auto, izmanto sabiedrisko transportu'; break;
    default: $transport_answer = $question4 ?: 'Nav norādīts';
}
$email_message .= "4. Transports: $transport_answer\n\n";

$email_message .= "5. Papildu komentāri:\n$question5\n\n";
$email_message .= "Laiks: " . date('d.m.Y H:i') . "\n";
$email_message .= "IP adrese: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";

$headers = "From: Samarieši@Med4You <noreply@samariesi.lv>\r\n";
$headers .= "Reply-To: $name <$email>\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Try to send email
$coordinator_sent = mail($coordinator_email, $subject, $email_message, $headers);

// Send confirmation email to applicant
$confirmation_subject = 'Paldies par jūsu pieteikumu - Samarieši@Med4You';
$confirmation_message = "Sveiki $name!\n\n";
$confirmation_message .= "Paldies par jūsu interesi kļūt par brīvprātīgo Samarieši@Med4You!\n\n";
$confirmation_message .= "Mēs esam saņēmuši jūsu pieteikumu un izskatīsim to tuvākajās dienās. ";
$confirmation_message .= "Ja jūsu pieteikums būs atbilstošs, mēs ar jums sazināsimies 3-5 darba dienu laikā.\n\n";
$confirmation_message .= "Ja jums ir jautājumi, sazinieties ar mūsu brīvprātīgo koordinatoru:\n";
$confirmation_message .= "Evita Zālīte\n";
$confirmation_message .= "Tālrunis: 28017600\n";
$confirmation_message .= "E-pasts: volunteers@samariesi.lv\n\n";
$confirmation_message .= "Ar cieņu,\n";
$confirmation_message .= "Samarieši@Med4You komanda";

$confirmation_headers = "From: Samarieši@Med4You <noreply@samariesi.lv>\r\n";
$confirmation_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send confirmation email
$confirmation_sent = mail($email, $confirmation_subject, $confirmation_message, $confirmation_headers);

// Log the submission (for development)
error_log("Volunteer application submitted: $name ($email) - Coordinator email sent: " . ($coordinator_sent ? 'Yes' : 'No'));

// For testing - save email content to a file so you can see what was sent
$log_content = "=== VOLUNTEER APPLICATION SUBMITTED ===\n";
$log_content .= "Time: " . date('d.m.Y H:i:s') . "\n";
$log_content .= "Coordinator Email: $coordinator_email\n";
$log_content .= "Subject: $subject\n\n";
$log_content .= "EMAIL CONTENT:\n" . $email_message . "\n";
$log_content .= "========================================\n\n";

file_put_contents('volunteer_submissions.log', $log_content, FILE_APPEND | LOCK_EX);

// Return response
if ($coordinator_sent) {
    echo json_encode([
        'success' => true, 
        'message' => 'Pieteikums veiksmīgi nosūtīts!',
        'confirmation_sent' => $confirmation_sent,
        'debug_info' => "Email sent to: $coordinator_email"
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'Kļūda nosūtot pieteikumu. Lūdzu mēģiniet vēlreiz.',
        'debug_info' => "Failed to send to: $coordinator_email"
    ]);
}
?>