<div id="main">
<div id="login">
<h2>Registration Form</h2>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('people/new_user_reg');
echo form_label('Nama Lengkap : ');
echo form_input(array('name' => 'name', 'value' => $name));
echo form_label('Nomor HP : ');
echo form_input(array('name' => 'mobile_phone', 'value' => $mobile_phone));
echo form_label('Tanggal Lahir (dd/mm/yyyy): ');
echo form_input(array('name' => 'birthday', 'id' => 'datepicker', 'value' => $birthday));
echo form_label('Email : ');
$data = array(
'type' => 'email',
'name' => 'email_value',
'value' => $email_value
);
echo form_input($data);
echo "<div class='error_msg'>";
if (isset($message_display)) {
echo $message_display;
}
echo "</div>";
echo form_label('Kata sandi : ');
echo form_password(array('name' => 'password', 'value' => $password));
echo form_label('Ulangi kata sandi : ');
echo form_password(array('name' => 'repassword', 'value' => $repassword));
echo "<div class='error_msg'>";
if (isset($pword_error)) {
echo $pword_error;
}
echo "</div>";
echo form_submit('submit', 'Sign Up');
echo form_close();
?>
</div>
</div>