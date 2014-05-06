<div id="standardblock">
<div id="title">
Modérer les nouvelles photos des membres de JeContacte</div>
Merci de nous aider à faire en sorte que JeContacte soit agréable pour toute la communauté. À partir de cette page, vous pouvez voir toutes les nouvelles photos qui ont été ajoutées récemment par l'ensemble des membres de JeContacte. En un seul clique, vous pouvez rapidement nous signaler les photos qui ne respectent pas nos règles. Le membres qui ne respectent pas nos règles ou qui dénoncent des photos qui ne devraient pas être dénoncées, seront éventuellement bannis du site. Donc merci de gérer et de modérer les photos avec sérieux.
<?php 
//var_dump($picture);
if($picture->sex=='m') 
	$picture->sex = 'Homme'; 
else $picture->sex = 'Femme';
?>
<table width="100%">
<tbody><tr>
<td align="center" valign="top" width="350">
<img src="<?php echo base_url("uploads/$picture->picture_location"); ?>" style="max-width:320px" /><br>
<a target="_blank" href="<?php echo base_url("profile/$picture->pseudo"); ?>"><?php echo $picture->pseudo . " ($picture->sex)"; ?></a>
</td>
<td align="left" valign="top"><span class="descriptor">Veuillez choisir la modération qui correspond à cette photo:</span><br><br>

<form method="POST" action="<?php echo base_url("validation/photo"); ?>">
	<input type="submit" value="Approuvée: Cette photo respecte les règles" style="width: 350">
	<input type="hidden" name="id" value="<?php echo $picture->id; ?>">
	<input type="hidden" name="by" value="<?php echo $this->session->userdata('pseudo'); ?>">
</form>
&nbsp;
<form method="POST" action="/modererphotos.php">
<input type="hidden" name="nom" value="1458565335_1341691473">
<input type="hidden" name="action" value="signaler">
<input type="submit" value="Refusée: Cette photo ne respecte pas les règles" style="width: 350">
</form>
&nbsp;
<form method="POST" action="/modererphotos.php">
<input type="hidden" name="nom" value="1458565335_1341691473">
<input type="hidden" name="action" value="signaler">
<input type="submit" value="Refusée: Cette photo ne s'affiche pas" style="width: 350">
</form>
&nbsp;
<form method="POST" action="/modererphotos.php">
<input type="hidden" name="nom" value="1458565335_1341691473">
<input type="hidden" name="action" value="nudite">
<input type="submit" value="Refusée: Cette photo contient de la nudité" style="width: 350">
</form>
&nbsp;
<form method="POST" action="/modererphotos.php">
<input type="hidden" name="nom" value="1458565335_1341691473">
<input type="hidden" name="action" value="signaler">
<input type="submit" value="Refusée: cette photo est vulgaire" style="width: 350">
</form>
&nbsp;
<form method="POST" action="<?php echo base_url("validation/photo"); ?>">
	<input type="submit" value="Je ne sais pas" style="width: 350">
	<input type="hidden" name="id" value="<?php echo $picture->id; ?>">
	<input type="hidden" name="action" value="next">
</form>
&nbsp;<br>
<span class="descriptor">Règles concernant les photos</span><br>
-Nudité partielle ou complète interdite!<br>
-Photo vulgaire, aguichante, indécente, provocante ou choquante interdite!<br>
-Photo montrant une personne en torse nu, maillot de bain, sous-vêtements, lingerie, costume, déguisement, uniforme, ou portant un casque.<br>
-Photo d'une célébrité ou tirée d'un magazine interdite!<br>
-Photo d'une autre personne que vous interdite!<br>
-Photo où on ne vous voit pas clairement interdite!<br>
-Dessin animé quelconque interdit!<br>
-Quelconque objet ou paysage où vous n'apparaissez pas interdit!<br>
-Photo qui affiche l'adresse d'un autre site web interdite!<br>
-Photo qui affiche de la violence interdite!<br>
-Photo qui affiche quoi que ce soit qui pourrait être considéré comme illégal interdite!</td>
</tr>
</tbody></table>
</div>