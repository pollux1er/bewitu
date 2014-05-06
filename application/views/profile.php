<?php 
//var_dump($profile); 
?>
<div id="profileblock">
	<div id="title">
		9 dernières personnes en ligne
	</div>
	<div id="friendspics">
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/philparis4"><img src="<?php echo base_url('system_images/man.jpg'); ?>" width="80" height="80" title="philparis4 50 ans Paris 14"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/merci1961"><img src="<?php echo base_url('system_images/woman.jpg'); ?>" width="80" height="80" title="merci1961 42 ans Carouge GE"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/Mour59"><img src="<?php echo base_url('system_images/man.jpg'); ?>" width="80" height="80" title="Mour59 
		55 ans 		Grande synthe"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/hommesimple32000"><img src="<?php echo base_url('system_images/man.jpg'); ?>" width="80" height="80" title="hommesimple32000 
		51 ans 
		oran"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/astronaute38000"><img src="<?php echo base_url('system_images/woman.jpg'); ?>" width="80" height="80" title="astronaute38000 
		52 ans 
		Grenoble"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/tiffaine123"><img src="<?php echo base_url('system_images/woman.jpg'); ?>" width="80" height="80" title="tiffaine123 
		18 ans 
		Lauwin planque"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/JP25HUY"><img src="<?php echo base_url('system_images/man.jpg'); ?>" width="80" height="80" title="JP25HUY 
		59 ans 
		Huy"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/titi82370"><img src="<?php echo base_url('system_images/woman.jpg'); ?>" width="80" height="80" title="titi82370 28 ans Montauban"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/spacial"><img src="<?php echo base_url('system_images/woman.jpg'); ?>" width="80" height="80" title="spacial 
		46 ans 
		kourou"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/hommetende1967"><img src="<?php echo base_url('system_images/man.jpg'); ?>" width="80" height="80" title="hommetende1967 
		47 ans 
		Coucouron"></a></p>
		</div>
		<div id="friendpicitem">
		<p><a href="<?php echo base_url(); ?>profile/steven37"><img src="<?php echo base_url('system_images/woman.jpg'); ?>" width="80" height="80" title="steven37 
		46 ans 
		Amboise"></a></p>
		</div>
	</div>
	<div id="filler">
	</div>
	<a href="<?php echo base_url(); ?>rencontre/region/Littoral/femmes/1.html">Autres personnes dans la région Littoral</a>
</div>

<div id="profileblock">
	<div id="title">
		<?php echo $profile->pseudo; ?> - <?php echo $profile->title; ?>
	</div>
	<?php
	if($profile->civil_status == 'single')
		$profile->civil_status = 'Célibataire ';
	else if ($profile->civil_status == 'couple')
		$profile->civil_status = 'En couple ';
	else
		$profile->civil_status = 'Marié ';
		
	if($profile->looking_for == 'rs')
		$profile->looking_for = 'Rencontre serieuse ';
	else if ($profile->looking_for == 'ra')
		$profile->looking_for = 'Rencontre amicale ';
	else
		$profile->looking_for = 'Rencontre ephemere ';
	
	if($profile->sexuality == 'hetero' && $profile->sex == 'Homme ')
		$profile->sexuality = 'Femme ';
	else if ($profile->sexuality == 'hetero' && $profile->sex == 'Femme ')
		$profile->sexuality = 'Homme ';
	else
		$profile->sexuality = 'Homme ou Femme ';
	?>
	<div id="basicinfos">
		<table border="0" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom: 5px;"><tbody><tr>
		<td valign="top" align="left" width="33%">
			<ul>
				<li><span class="descriptor">Genre :</span> <a href="#"><?php echo ($profile->sex == "m") ? "Homme" : "Femme"; ?></a></li>
				<li><span class="descriptor">Âge : </span> <?php echo $profile->age; ?> ans</li>
				<li><span class="descriptor">État civil : </span> <a href="#"><?php echo $profile->civil_status; ?></a></li>
				<li><span class="descriptor">Ici pour:</span> <a href="#"><?php echo $profile->looking_for; ?></a></li>
				<li><span class="descriptor">Ville:</span> <a href="#"><?php echo $profile->town; ?></a></li>
				<li><span class="descriptor">Région:</span> <a href="#"><?php echo $profile->region; ?></a></li>
				<li><span class="descriptor">Pays:</span> <a href="#"><?php echo $profile->country; ?></a></li>
				<li><span class="descriptor">Pays de connexion:</span> <!-- Cameroun --></li>
			</ul>
		</td>
		<td valign="top" align="left" width="33%">
			<ul>
				<li><span class="descriptor">Orientation:</span> <a href="#"><?php echo $profile->sexuality; ?></a></li>
				<li><span class="descriptor">Taille : </span> <?php echo $profile->height_m . "." . $profile->height_cm . "m"; ?><!-- - 5'4" --></li>
				<li><span class="descriptor">Physique : </span> <a href="#"><?php echo $profile->appearance; ?></a></li>
				<li><span class="descriptor">Astrologie : </span> <a href="#"><?php echo $profile->signe; ?></a></li>
				<li><span class="descriptor">Membre depuis : </span><?php echo $profile->month_reg . " " . $profile->year_reg; ?></li>
				<li><span class="descriptor">Dernière visite:</span> Connecté(e)</li>
				<li><span class="descriptor">Statut:</span> Connecté(e)</li>
				<li><span class="descriptor">Vues:</span> <?php echo $profile->views; ?></li>
			</ul>
		</td>
		<td valign="top" align="left" width="33%">
			<ul>
				<li style="margin-bottom: 8px;"><a href="<?php echo base_url("message/$profile->pseudo"); ?>">Envoyer un message à <?php echo $profile->pseudo; ?></a></li>
				<li style="margin-bottom: 8px;"><a href="Javascript:performer_action('ajouterfavori','3677526');">Ajouter <?php echo $profile->pseudo; ?> à vos favoris!</a></li>
				<li style="margin-bottom: 8px;"><a href="Javascript:confirmer_action('ajouterami','3677526');">Ajouter <?php echo $profile->pseudo; ?> à vos amis!</a></li>
			</ul>
			<div style="margin-top: 10px;">
			</div>
		</td>
		</tr></tbody></table>
	</div>
	<script language="Javascript">
	function changepic(imgurl, nom){
	  document.getElementById('image1').src = imgurl;
	  voteon = nom;
	}
	function details(){
	  url = '/autrestailles/' + voteon;
	  location.href = url;
	}
	</script>
<div style="float:right;">
</div>
<?php 
if(is_object($profile->pictures)) { ?>
	<img src="<?php echo base_url('system_images/' . $profile->pictures->picture_location); ?>" height="200px" border="0">
<?php } else { ?>
<div style="height: 335px;">
	<a href="<?php echo base_url('photos/' . $profile->pseudo . '/' . $profile->picture_id); ?>">
		<img border="0" id="image1" style="max-height:320px" src="<?php echo base_url('uploads/' . $profile->default_pic); ?>" />
	</a>
<br>
<a href="<?php echo base_url("message/$profile->pseudo"); ?>">Envoyer un message</a>&nbsp;&nbsp;&nbsp;<a href="Javascript:confirmer_action('voterphoto',voteon);">+ 1 Vote photo</a>&nbsp;&nbsp;&nbsp;<a href="Javascript:confirmer_action('reporterphoto',voteon);">Photo inappropriée?</a>
</div><br>
<?php } ?>
<div id="filler">
</div><div id="photos_profil_nav">
<?php if(is_array($profile->pictures)) { 
foreach($profile->pictures as $pic) {
?>
	<a href="<?php echo base_url('photos/' . $profile->pseudo . '/' . $pic->id); ?>"><img width="80" height="80" src="<?php echo base_url("uploads/$pic->thumb_location"); ?>"></a>
<?php } 
} 
?></div>
</div>

<div id="profileblock">
<div style="float:right;">
</div>
<div id="title">
À propos de <?php echo $profile->pseudo; ?> :
</div>
<div id="basicinfos">
<p><?php echo $profile->description; ?></p>
<p>
</p><ul>
<li><span class="descriptor">Passe-temps : </span> </li>
<li><span class="descriptor">Emploi / Travail ou Occupation : </span><?php echo $profile->job; ?></li>
<li><span class="descriptor">Poids : </span> <?php echo $profile->weight; ?> kgs <!-- - 230 lbs --></li>
<li><span class="descriptor">Nationalité : </span>
<a href="/rencontre-homme-camerounais-1.html"><?php echo $profile->home_country; ?></a></li>
<li><span class="descriptor">Ethnicité : </span> <a href="/rencontre-homme-noir-africain-1.html"><?php echo $profile->ethnicity; ?></a></li>
<li><span class="descriptor">Yeux : </span> <a href="/rencontre-homme-aux-yeux-noirs-1.html"><?php echo $profile->eye_color; ?></a></li>
<li><span class="descriptor">Cheveux : </span> <a href="/rencontre-homme-au-cheveux-noirs-1.html"><?php echo $profile->hair_color; ?></a></li>
<!--
<li><span class="descriptor">Votes pour sa ou ses photo au total:</span> 1 (1 votes cette semaine)</li>
<li><span class="descriptor">Votes pour sa personnalité au total:</span> 0 (0 votes cette semaine)</li>
<li><span class="descriptor">Votes pour son entrevue au total:</span> 0 (0 votes cette semaine)</li>
-->
</ul>
<p></p>
<p>
<a href="Javascript:confirmer_action('voterprofil','3667647');">+ 1 Vote profil</a>&nbsp;&nbsp;&nbsp;<a href="Javascript:confirmer_action('reporterprofil','3667647');">Profil inapproprié?</a>
</p>
</div>
<div id="filler">
</div>
</div>
<div id="profileblock">
<div id="title">
Envoyer un message privé à <?php echo $profile->pseudo; ?></div>
<form action="<?php echo base_url("message/$profile->pseudo"); ?>" method="POST" name="publier">
<input type="hidden" name="action" value="message">
<input type="hidden" name="source" value="profil">
<input type="hidden" name="dest" value="<?php echo $profile->pseudo; ?>">
<textarea name="message" cols="65" rows="10"></textarea><br>
<input type="submit" value="Soumettre" onclick="return checkdata();">
</form>
</div>
<div id="profileblock">
<div id="title">
Signaler le profil de <?php echo $profile->pseudo; ?></div>
<div id="report_text">
<a href="Javascript:fj_afficher('report_form');fj_cacher('report_text');">Cliquez ici pour signaler le profil de <?php echo $profile->pseudo; ?></a>
</div>
<div id="report_form" class="hidden">
<form action="/ajax/actions.php" method="POST" name="reporter">
<input type="hidden" name="action" value="report">
<input type="hidden" name="source" value="profil">
<input type="hidden" name="profil" value="3200269">
Expliquez de façon la plus détaillée possible en quoi ce profil ne respecte pas les règlements du site:<br>
<textarea name="message" cols="65" rows="10"></textarea><br>
<input type="button" name="soumettre" value="Soumettre" onclick="return submitreport();">
<div id="report_encours" class="hidden">
Envoi en cours...
</div>
</form>
</div>
<div id="report_complete" class="hidden">
Merci de votre aide!
</div>
</div>
<script language="Javascript">
function submitreport(){
  if (document.reporter.message.value.length < 30){
    alert('Erreur, votre message est trop court. Merci d\'expliquer brièvement la ou les raisons pour lesquelles ce profil ne respècte pas les règlements du site.');
    return false;
  }
  else{
    var data = '';
    for (var i = 0; i < document.reporter.length; i++) {
      var input = document.reporter[i];
      if (input.name) {
        data += escape(input.name) + '=' + escape(input.value) + '&';
      }
    }
    document.reporter.soumettre.disabled = true;
    fj_afficher('report_encours');
    postText('/ajax/actions.php', data, report_postprocessing);
    return true;
  }
}
function report_postprocessing(response){
  if (response == 'OK'){
    fj_afficher('report_complete');
    fj_cacher('report_form');
  }
  else if (response == 'DUPLICATE'){
    alert('Vous avez déjà reporté ce profil.');
    fj_cacher('report_encours');
    document.reporter.soumettre.disabled = false;
  }
  else if (response == 'QUOTA'){
    alert('Erreur, vous avez dépassé le nombre de signalements maximal que vous pouvez effectuer en 24h. Merci de réessayer plus tard.');
    fj_cacher('report_encours');
    document.reporter.soumettre.disabled = false;
  }
  else{
    alert('Une erreur s\'est produite lors de votre signalement. Veuillez essayer de nouveau.');
    fj_cacher('report_encours');
    document.reporter.soumettre.disabled = false;
  }
}
function checkdata(){
  if (document.publier.message.value == ''){
    alert('Veuillez saisir votre message avant de cliquer sur envoyer!');
    return false;
  }
  else{
    return true;
  }
}
</script>
