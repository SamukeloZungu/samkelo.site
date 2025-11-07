<?php
// Contact form handler
$receiving_email_address = 'samkelozungu675@gmail.com';

// Include the PHP Email Form library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Gmail SMTP setup
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'samkelozungu675@gmail.com',
  'password' => 'slgpndnrb04@Last', // <-- Replace this with your Gmail App Password
  'port' => '587',
  'encryption' => 'tls'
);

// Add form messages
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
if (!empty($_POST['phone'])) {
  $contact->add_message($_POST['phone'], 'Phone');
}
$contact->add_message($_POST['message'], 'Message', 10);

// Send email
echo $contact->send();
?>
