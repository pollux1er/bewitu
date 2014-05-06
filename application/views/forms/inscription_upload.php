
<?php if($error == '') { ?>
<div id="standardblock" style="background-color: #E1FFE1; border:1px solid #00FF00;">
	<div id="title">Félicitations!</div>Votre photo a été soumise avec succès à 0:18:26. 
	Cette photo devrait être disponible d'ici 24h. Merci de votre patience.
</div>
<?php } ?>

<div id="standardblock">
<div id="title">Ajouter une photo à votre profil</div>
<div class="error">
<?php echo $error;?>
</div>

<?php echo form_open_multipart('form/inscription_upload_image');?>
&nbsp;<br>
<span class="descriptor">Comment ajouter une photo?</span><br>
1. Veuillez lire les règles concernant les photos<br>
2. Cochez toutes les cases pour confirmer que votre photo respecte les règles<br>
3. Cliquez sur le bouton "Choisir une photo à ajouter"<br>
<noscript>
4. Cliquez sur le bouton "Soumettre cette photo"&lt;br /&gt;
</noscript>
<br />
<span class="descriptor">Règles à suivre concernant les photos:</span><br>
<span class="highlight">Je comprends que mon compte pourrait être supprimé sans aucun préavis si cette photo ne respecte pas l'une ou l'autre des règles suivantes.</span><br>
<input type="checkbox" name="ins_imgcheckbox2" value="1"> -Cette photo ne comporte aucune nudité complète ou partielle.<br>
<input type="checkbox" name="ins_imgcheckbox3" value="1"> -Cette photo n'est pas à caractère sexuel, exhibitionniste, indécent ou obscène.<br>
<input type="checkbox" name="ins_imgcheckbox4" value="1"> -Cette photo n'est pas à caractère aguichant, provocateur ou vulgaire.<br>
<input type="checkbox" name="ins_imgcheckbox5" value="1"> -Cette photo ne montre pas un gros plan sur une poitrine ou derrière.<br>
<input type="checkbox" name="ins_imgcheckbox6" value="1"> -Cette photo ne me montre pas en torse nu, maillot de bain, sous-vêtements, ou lingerie.<br>
<input type="checkbox" name="ins_imgcheckbox7" value="1"> -Cette photo ne me montre pas portant un costume, déguisement, uniforme, ou casque.<br>
<input type="checkbox" name="ins_imgcheckbox8" value="1"> -Je suis absolument seul(e) sur cette photo. Il n'y a personne à côté, ou même loin derrière en arrière plan.<br>
<input type="checkbox" name="ins_imgcheckbox9" value="1"> -Je suis la personne sur cette photo. Cette photo n'est pas une célébrité ou une autre personne que moi-même.<br>
<input type="checkbox" name="ins_imgcheckbox10" value="1"> -Cette photo est récente.<br>
<input type="checkbox" name="ins_imgcheckbox11" value="1"> -Cette photo n'est pas à l'envers ou sur le côté.<br>
<input type="checkbox" name="ins_imgcheckbox12" value="1"> -Cette photo n'est pas un montage photo, ou n'a pas été modifiée dans un quelconque logiciel ou site de retouche d'images.<br>
<input type="checkbox" name="ins_imgcheckbox13" value="1"> -Cette photo n'a pas été récupérée sur le net, dans un magazine ou autre.<br>
<input type="checkbox" name="ins_imgcheckbox14" value="1"> -Mon visage apparaît clairement sur cette photo, il n'est pas masqué, brouillé, ombragé ou distant sur la photo.<br>
<input type="checkbox" name="ins_imgcheckbox15" value="1"> -Je suis en avant plan sur cette photo.<br>
<input type="checkbox" name="ins_imgcheckbox16" value="1"> -Il n'y a aucun texte, adresse web, email, numéro de téléphone, nom, prénom ou pseudo sur cette photo.<br>
<input type="checkbox" name="ins_imgcheckbox17" value="1"> -Cette photo n'affiche aucun message à caractère politique, religieux ou publicitaire.<br>
<input type="checkbox" name="ins_imgcheckbox18" value="1"> -Cette photo n'affiche aucune arme, violence, abus ou exploitation quelconque.<br>
<input type="checkbox" name="ins_imgcheckbox19" value="1"> -J'ai les droits d'utilisation pour cette photo.<br>
<br>
<link href="css/fileuploader.css" rel="stylesheet" type="text/css">


<input type="file" name="userfile" size="20" value="Choisir une photo à ajouter" />

<br /><br />

<input type="submit" value="upload" />
<br /><br />
<a href="<?php echo base_url('/profile/'.$this->session->userdata('pseudo')); ?>">Cliquez ici pour voir votre profil</a>
</div>

<script src="js/user_fileuploader.js" type="text/javascript"></script>
<script>
function verifconditions(){
  if (!document.ajouter.ins_imgcheckbox2.checked || !document.ajouter.ins_imgcheckbox3.checked || !document.ajouter.ins_imgcheckbox4.checked || !document.ajouter.ins_imgcheckbox5.checked || !document.ajouter.ins_imgcheckbox6.checked || !document.ajouter.ins_imgcheckbox7.checked || !document.ajouter.ins_imgcheckbox8.checked || !document.ajouter.ins_imgcheckbox9.checked || !document.ajouter.ins_imgcheckbox10.checked || !document.ajouter.ins_imgcheckbox11.checked || !document.ajouter.ins_imgcheckbox12.checked || !document.ajouter.ins_imgcheckbox13.checked || !document.ajouter.ins_imgcheckbox14.checked || !document.ajouter.ins_imgcheckbox15.checked || !document.ajouter.ins_imgcheckbox16.checked || !document.ajouter.ins_imgcheckbox17.checked || !document.ajouter.ins_imgcheckbox18.checked || !document.ajouter.ins_imgcheckbox19.checked){
    alert('Vous n\'avez pas accepté les conditions d\'utilisation avant de soumettre votre photo.');
    return false;
  }
  return true;
}

function confirmation(picid){
  if(confirm("Êtes-vous certain de vouloir supprimer cette photo?")){
    window.location.href = '<?php echo base_url('form/delete_picture'); ?>' +'/'+ picid;
  }
}     
</script>
<?php if(count($pictures) > 0) { 
	foreach($pictures as $pic) {
?>
<style>
#container {
    position: relative;
}
div.overlay {
    opacity: .7;
    background-color: black;
    position: absolute;
    left: 0; top: 0; height: 122px; width: 122px;
}
</style>
<table class="forumtable">
	<tbody>
		<tr>
		<?php if(!$pic->approved) { ?>
			<td align="center" width="110" valign="top">
				<input type="hidden" name="allpics[<?php echo $pic->id; ?>]" value="1">
				En attente...<br>
				<div id="container">
					<div class="overlay"></div>
					<img src="<?php echo base_url("uploads/$pic->raw_name"."_thumb.jpg");?>">
				</div>
				<br>
				<a href="<?php echo base_url('form/deletepicture/' . $pic->id); ?>" onclick="confirmation(<?php echo $pic->id; ?>); return false;">
				Effacer la photo</a>
			</td>
			<td align="left">
			<strong>Félicitations, votre photo a été soumise avec succès le <?php echo $pic->added_on ?></strong><br>
			Cette photo devrait être disponible d'ici 24h. Merci de votre patience.<br><br>
			Notez que nous nous réservons le droit de supprimer toute photo qui n'est pas en conformité avec nos règles. Nous nous réservons également le droit de supprimer un profil qui contient des photos non conformes avec nos conditions d'utilisation. Si vous croyez que votre photo pourrait ne pas être en conformité avec nos règles, merci de cliquer sur "Effacer la photo" juste en dessous du carré noir.</td>
		<?php } else { ?>
			<td align="center" width="110" valign="top">
				<input type="hidden" name="allpics[<?php echo $pic->id; ?>]" value="1">
				<?php if($pic->approved == 0) { echo "En attente..."; } else { echo "Approuvee"; } ?><br>
				<div id="container">
					<?php if($pic->approved == 0) { ?><div class="overlay"></div><?php } ?>
					<img src="<?php echo base_url("uploads/$pic->raw_name"."_thumb.jpg");?>">
				</div>
				<br>
				<a href="<?php echo base_url('form/deletepicture/' . $pic->id); ?>" onclick="confirmation(<?php echo $pic->id; ?>); return false;">
				Effacer la photo</a>
			</td>
			<td align="left">
			<strong>Félicitations, votre photo a été approuvee le <?php echo $pic->approved_on ?> par <?php echo $pic->approved_by ?></strong><br>
			Cette photo fait maintenant parti de votre profile. Merci.<br><br>
			Notez que nous nous réservons le droit de supprimer toute photo qui se fait signaler par un membre si celle ci n'est pas en conformité avec nos règles. Vous pouvez si vous le desirez, la mettre comme photo par defaut de votre profil.
			<br><br><br><br><br>
				<a href="<?php echo base_url('/' . $pic->id); ?>">Photo par defaut de votre profil</a>
			</td>
	<?php } ?>
	</tr>
	</tbody>
</table>
<?php 
	}
} ?>
</form>