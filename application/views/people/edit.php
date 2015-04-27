<h2>Registration Form</h2>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('people/edit');
echo form_label('Nama Lengkap : ');
echo form_input(array('name' => 'name', 'value' => $name, 'readonly' => true));
echo form_label('Tanggal Lahir (dd/mm/yyyy): ');
echo form_input(array('name' => 'birthday', 'id' => 'datepicker', 'value' => $birthday));
echo form_label('Jenis kelamin : ');
echo form_radio(array('name' => 'gender', 'value' => '1', 'checked' => (($gender=='1')?true:false))). "Pria";
echo form_radio(array('name' => 'gender', 'value' => '2', 'checked' => (($gender=='2')?true:false))). "Wanita";
echo '<br />';
echo form_label('Hobi: ');
echo form_input(array('name' => 'hobby', 'value' => $hobby));
echo form_label('Email : ');
echo $email;
echo form_submit('submit', 'Ubah');
echo form_close();
?>