<h1>Login</h1>

<?php  ?>

<?php echo form_open($form_action); ?>
    <?php echo form_fieldset( 'Identifícate' ); ?>

		<?php if (isset($login_error_message)) echo $login_error_message; ?>

        <div class="textfield">
            <?php
				echo form_label('Email', 'email');
				echo form_input('email', set_value('email'));
				echo form_error('email');
			?>
			
        </div>
        <div class="textfield">
            <?php
				echo form_label('Contraseña', 'passwd');
				echo form_password('passwd');
				echo form_error('passwd');
			?>
			
        </div>
        <div class="buttons">
            <?php echo form_submit( 'login', 'Acceder' ); ?>
			
        </div>

    <?php echo form_fieldset_close(); ?>
<?php echo form_close(); ?>