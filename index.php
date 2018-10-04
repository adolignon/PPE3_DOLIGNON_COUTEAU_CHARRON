<?php
session_start();
include 'Controleur.php';

function chargerPage()
{
	$monControleur = new Controleur();
	$monControleur->afficheEntete();
	//|| isset($_POST['nomClient']
		if(isset($_POST['login']) && isset($_POST['password'])){
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];
		}
		if(isset($_SESSION['login']))
		{
				if ((isset($_GET['vue']))&& (isset($_GET['action'])))
				{   
					$monControleur->affichePage($_GET['action'],$_GET['vue']);
				}
				else{
					if ((isset($_GET['vue']))&& !(isset($_GET['action']))){
						session_destroy();
						premier_affichage();
					}
				}
		}
		else
		{
			premier_affichage();
		}
	$monControleur->affichePiedPage();
}
	function premier_affichage()
	{
		/*echo "<div class = 'centrePage'>
				<table border=3 align=center>
					<tr align=center>
						<td>
							<h2> Nouveau compte</h2>
						</td>
						<td>
							<h2>    Je suis déjà client  </h2>
						</td>
					</tr>
					<tr align=center>
						<td>
								<form href = 'index.php?vue=compte&action=nouveauLogin' method='post'>
									<input type='text' name='nomClient' value='saisir votre nom'/><br>
									<input type='text' name='prenomClient' value='Saisir votre prenom'/><br>
									<input type='text' name='emailClient' value='Saisir votre email'/><br>
									<input type='text' name='dateAbonnementClient' value='Date souhaitée d abonnement'/><br>
									<input type='text' name='login' value='Saisir votre login'/><br>
									<input type='text' name='Password' value='Choisir un mot de passe'/><br>
									<input type='submit' value='Accéder'/>
								   </form>
						</td>
						<td>
							<form action=index.php method=GET>
									<input type='text' name='login'/><br>
									<input type='text' name='password'/><br>
									<input type='hidden' name='vue' value='compte'>
									<input type='hidden' name='action' value='verifLogin'/>
									<input type='submit' value='Accéder'/>
								</form>
						</td>
					</tr>
				</table>
			</div>";*/
		echo "</nav>
                <div class='container h-100'>
                    <div class='row h-100 justify-content-center align-items-center'>
                        <table class='table w-50'>
                            <thead>
                                <td class='head-table-connexion text-white'>Je suis déjà client</td>
                                <td class='head-table-connexion text-white'>Je crée mon compte</td>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='td-table justify-content-center'>
                                        <form action=index.php?vue=compte&action=verifLogin method=POST>
                                            <input class='form-group' type='text' placeholder='Login' name='login' required//><br>
                                            <input class='form-group' type='password' placeholder='Mot de passe' name='password' required/><br>
                                            <input class='btn btn-secondary mx-auto' type='submit' value='Accéder'/>
                                        </form>
                                    </td>
                                    <td class='justify-content-center td-table'>
                                        <form action='index.php?vue=compte&action=nouveauLogin' method='post'>
                                            <input class='form-group' type='text' name='nomClient' placeholder='saisir votre nom' required/><br>
                                            <input class='form-group' type='text' name='prenomClient' placeholder='Saisir votre prenom' required/><br>
                                            <input class='form-group' type='email' name='emailClient' placeholder='Saisir votre email' required /><br>
                                            <input class='form-group' type='date' name='dateNaissClient' placeholder='Date de naissance' required/><br>
                                            <input class='form-group' type='text' name='login' placeholder='Saisir votre login' required/><br>
                                            <input class='form-group' type='password' name='password' placeholder='Choisir un mot de passe' required/><br>
											<input class='form-group' type='hidden' name='dateAbonnementClient' value='".date("Y-m-d")."'>
                                            <input class='btn btn-secondary' type='submit' value='Accéder'/>
                                        </form>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                </div>";
	}

	chargerPage();


?>
