<div class= "container">	
	<div class="panel panel-default">
	  <div class="panel-body">
	    <form class="form-login" method="POST" action="<?php echo site_url("control_autentikasi/request_lupa_password");?>" role="form" enctype="multipart/form-data">
			<label for="email">Email Anda</label> 
			<input type="email" name="email" value="<?php if (empty ( $submitSukses )) echo set_value('email')?>" class="form-control" placeholder="Isikan Email Anda" required /><br>
			<button class="btn btn-lg btn-primary btn-block" type="submit"
				name="submit" >Kirim Reset Password</button>
			<br>
		</form>
		<?php
			if (! empty( $submitErrors)) {
				echo "<div class= \"alert alert-danger\"><ol type='1'>";
					echo "<li>".$submitErrors."</li>\n";
				echo "</ol></div>";
			}
			if (! empty ( $submitSukses )) {
				echo "<div class= \"alert alert-success\"><ol type='1'>";
					echo "<li>".$submitSukses."</li>\n";
				echo "</ol></div>";
			}
		?>
	  </div>
	</div>
</div>