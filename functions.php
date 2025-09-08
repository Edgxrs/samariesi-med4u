<?php
/**
 * Theme functions and definitions
 */

// Load WordPress compatibility first
require_once 'wp-config.php';

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function samariesi_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'samariesi'),
        'footer' => __('Footer Menu', 'samariesi'),
    ));
}
add_action('after_setup_theme', 'samariesi_theme_setup');

// Enqueue scripts and styles
function samariesi_scripts() {
    wp_enqueue_style('samariesi-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('samariesi-script', home_url('/script.js'), array(), '1.0.0', true);
    wp_enqueue_script('samariesi-mobile-menu', home_url('/mobile-menu.js'), array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'samariesi_scripts');

// Custom post type for team members
function samariesi_register_team_members() {
    $args = array(
        'labels' => array(
            'name' => __('Team Members', 'samariesi'),
            'singular_name' => __('Team Member', 'samariesi'),
        ),
        'public' => false,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => false,
        'rewrite' => false,
    );
    register_post_type('team_member', $args);
}
add_action('init', 'samariesi_register_team_members');

// Custom comment form for reviews
function samariesi_comment_form_defaults($defaults) {
    $defaults['comment_field'] = '<p class="comment-form-comment">
        <label for="comment">' . __('Your Review', 'samariesi') . ' <span class="required">*</span></label>
        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="500" required placeholder="' . __('Share your experience with our care...', 'samariesi') . '"></textarea>
    </p>';
    
    $defaults['title_reply'] = __('Leave Your Review', 'samariesi');
    $defaults['label_submit'] = __('Submit Review', 'samariesi');
    $defaults['comment_notes_before'] = '<p class="comment-notes">' . __('Your review will be moderated before being published.', 'samariesi') . '</p>';
    $defaults['comment_notes_after'] = '';
    
    return $defaults;
}
add_filter('comment_form_defaults', 'samariesi_comment_form_defaults');

// Moderate all comments for reviews page
function samariesi_moderate_reviews($approved, $commentdata) {
    // Only moderate comments on the reviews page
    $post = get_post($commentdata['comment_post_ID']);
    if ($post && $post->post_name === 'atsauksmes') {
        return 0; // Hold for moderation
    }
    return $approved;
}
add_filter('pre_comment_approved', 'samariesi_moderate_reviews', 10, 2);

/**
 * AJAX handler for volunteer application form
 */
function samariesi_handle_volunteer_application() {
    // Basic spam protection
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method');
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $age = sanitize_text_field($_POST['age'] ?? '');
    $experience = sanitize_textarea_field($_POST['experience'] ?? '');
    $question1 = sanitize_textarea_field($_POST['question1'] ?? '');
    $question2 = sanitize_text_field($_POST['question2'] ?? '');
    $question3 = sanitize_text_field($_POST['question3'] ?? '');
    $question4 = sanitize_text_field($_POST['question4'] ?? '');
    $question5 = sanitize_textarea_field($_POST['question5'] ?? '');
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($question1) || empty($question2) || empty($question3)) {
        wp_send_json_error('All required fields must be filled');
        return;
    }
    
    if (!is_email($email)) {
        wp_send_json_error('Invalid email address');
        return;
    }
    
    // Prepare email content for coordinator
    $coordinator_email = 'volunteers@samariesi.lv'; // Replace with actual coordinator email
    $subject = 'Jauns brīvprātīgo pieteikums - ' . get_bloginfo('name');
    
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
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <noreply@samariesi.lv>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    // Send email to coordinator
    $coordinator_sent = wp_mail($coordinator_email, $subject, $email_message, $headers);
    
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
    
    $confirmation_headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: Samarieši@Med4You <noreply@samariesi.lv>'
    );
    
    // Send confirmation email
    $confirmation_sent = wp_mail($email, $confirmation_subject, $confirmation_message, $confirmation_headers);
    
    if ($coordinator_sent) {
        // Log successful submission
        error_log("Volunteer application submitted: $name ($email)");
        wp_send_json_success('Application submitted successfully');
    } else {
        error_log("Failed to send volunteer application email for: $name ($email)");
        wp_send_json_error('Failed to send application. Please try again.');
    }
}

// Hook for AJAX requests (both logged in and non-logged in users)
add_action('wp_ajax_volunteer_application', 'samariesi_handle_volunteer_application');
add_action('wp_ajax_nopriv_volunteer_application', 'samariesi_handle_volunteer_application');

?>