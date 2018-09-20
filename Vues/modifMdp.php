<form action='index.php?login=<?php echo $_SESSION['login'];?>&password=<?php echo $_SESSION['password'];?>&vue=compte&action=nvMdp' method='post'>
	<input class='form-group' type='text' name='nvMdp' placeholder='Saisir votre nouveau mot de passe' required/><br>
	<input class='btn btn-secondary' type='submit' value='Accéder'/>
</form>