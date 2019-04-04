<div class="centrePage">
<br><br>

	<?php 
	
	$leTypeSupport = $_SESSION['typeSupport'];
	$support = $_GET['IdSupport'];

	if($leTypeSupport == "F")
	{
		$leFilm = $_SESSION['infosFilm'];
		echo '<div class="row">
            <div class="col-lg-12">
                <table>
                <tr>
                    <td>
                        <div class="overlay" style="text-align:left;">
                            <img class="images" src="Images\\'.$leFilm->getImageFilm().'">
                        </div>
                    </td>
                    <td>
                        <div class="textTitre">
                            '.$leFilm->getTitreFilm().'
                        </div>
                        <br><br>
                        <div class="textContenu">
                            Réalisateur : '.$leFilm->getRealisateurFilm().'
                        </div>
                        <div class="textContenu">
                            Durée : '.$leFilm->getDureeFilm().'
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>';
	}
	else
	{
		$laSerie = $_SESSION['infosSerie'];
//		$lesSaisons = json_encode($_SESSION['tabSaisons']);
		echo '<div class="row">
            <div class="col-lg-12">
                <table>
                    <tr>
                        <td>
                            <div class="overlay" style="text-align:left;">
                                <img class="images" src="Images\\'.$laSerie->getUneImageDeLaSerie().'">
                            </div>
                        </td>
                        <td>
                            <div class="textTitre">
                                '.$laSerie->getTitreSerie().'
                            </div>
                            <br><br>
                            <div class="textContenu">
                                Réalisateur : '.$laSerie->getRealisateurSerie().'
                            </div>
                            <br><br>
                            <a class="menu-link" id="lesSaisons">Voir les saisons disponibles</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
		<div class="row">
            <div class="col-lg-10 offset-1">
                <table id="retourAjax" class="table table-striped" style="box-shadow : 5px 10px 10px rgba(0,0,0,0.2);">
                
                </table>
            </div>
        </div>';

	}
	?>
	
</div>

<script type="text/javascript" charset="utf-8">
$( document ).ready(function() {
	
var idS = <?php  print $support; ?>;

$('#lesSaisons').click(function(){
    var x = $.ajax({
		url: "Modeles/ajax/test.php",
		timeout: 4000,
		dataType : "json",
		encode: true,
		type: "POST",
		data: {'idSerie' : idS},
		
	});
	x.done(function (retour){
		if(retour.success)
		{
		    var table = document.getElementById("retourAjax");
            for (var i=table.rows.length; i>0; i--)
            {
                table.deleteRow(i);
            }
		    var row = table.insertRow();
		    var cell1 = row.insertCell(0);
		    var cell2 = row.insertCell(1);
		    var cell3 = row.insertCell(2);

		    cell1.innerHTML = "Saison";
		    cell1.style.fontWeight = 'bold';

		    cell2.innerHTML = "Année";
            cell2.style.fontWeight = 'bold';

            cell3.innerHTML = "Nombre d'épisodes";
            cell3.style.fontWeight = 'bold';

			$.each(retour, function(index, value)
            {
                if(index != 'success')
                {
                    row = table.insertRow();
                    cell1 = row.insertCell(0);
                    cell2 = row.insertCell(1);
                    cell3 = row.insertCell(2);
                    cell1.innerHTML = '<a class="menu-link" id="lesEpisodes">'+index+'</a>';
                    cell2.innerHTML = value[0];
                    cell3.innerHTML = value[1];
                }
            })
		}
		});
	x.fail(function(jqXHR, textStatus)
			{
			// traitement des erreurs ajax	
     			if (jqXHR.status === 0){alert("Not connect.n Verify Network.");}
    			else if (jqXHR.status == 404){alert("Requested page not found. [404]");}
				else if (jqXHR.status == 500){alert("Internal Server Error [500].");}
				else if (textStatus === "parsererror"){alert("Requested JSON parse failed.");}
				else if (textStatus === "timeout"){alert("Time out error.");}
				else if (textStatus === "abort"){alert("Ajax request aborted.");}
				else{alert("Uncaught Error.n" + jqXHR.responseText);}
			});

	})
});
</script>

