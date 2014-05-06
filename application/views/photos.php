<?php
if($profile->sex == 'm')
	$profile->sex = 'un homme ';
else
	$profile->sex = 'une femme ';

?>
<div id="profileblock">
	<div id="title">
	Photo soumise par <a href="<?php echo base_url("profile/$pseudo"); ?>"><?php echo $pseudo; ?></a>  <?php echo $profile->sex; ?> de <?php echo $profile->age; ?> ans</div>
	<a href="<?php echo base_url("message/$pseudo"); ?>">Envoyez un message privé à <?php echo $pseudo; ?></a><br>
</div>
<div style="text-align: center;">
	<a href="<?php echo base_url("profile/$pseudo"); ?>">
	<img border="0" style="margin-top: 5px; max-height:800px;max-width:900px"  src="<?php echo base_url("uploads/$photo"); ?>"></a><br>
	<a href="<?php echo base_url("message/$profile->pseudo"); ?>">Envoyer un message</a>&nbsp;&nbsp;&nbsp;
	<a href="Javascript:confirmer_action('voterphoto',voteon);">+ 1 Vote photo</a>&nbsp;&nbsp;&nbsp;
	<a href="Javascript:confirmer_action('reporterphoto',voteon);">Photo inappropriée?</a>
	<br>&nbsp;&nbsp;
	
</div>
<div id="photos_profil_nav" style="text-align:center;">
<?php if(is_array($pictures)) {
	if(count($pictures) > 1) {
		foreach($pictures as $pic) {?>
	<a href="<?php echo base_url("photos/$pseudo/$pic->id"); ?>" ><img src="<?php echo base_url("uploads/$pic->thumb_location"); ?>" width="80" height="80"></a>
	<?php } } } ?>
	<br />
	<br />
</div>