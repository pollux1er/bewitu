<div id="quickprofilelarge">
	<h1><strong><span id="title">Nouveaux inscrits pour rencontre</span></strong></h1>
	<a href="<?php echo base_url(); ?>">Nouvelles femmes pour rencontre</a> | 
	<a href="<?php echo base_url(); ?>">Nouveaux hommes pour rencontre</a>
</div>
<?php
//var_dump($members);
foreach($members as $member) {
	if($member->sex == 'm')
		$member->sex = 'Homme ';
	else $member->sex = 'Femme ';
	
	if($member->civil_status == 'single')
		$member->civil_status = 'célibataire ';
	else if ($member->civil_status == 'couple')
		$member->civil_status = 'en couple ';
	else
		$member->civil_status = 'marié ';
	
	if($member->sexuality == 'male')
		$member->sexuality = 'homme ';
	else if ($member->sexuality == 'female')
		$member->sexuality = 'femme ';
	else
		$member->sexuality = 'homme ou femme ';
	
	if($member->looking_for == 'rs')
		$member->looking_for = 'rencontre serieuse ';
	else if ($member->looking_for == 'ra')
		$member->looking_for = 'rencontre amicale ';
	else
		$member->looking_for = 'rencontre ephemere ';
?>
<div id="quickprofilelarge">
<table style="width: 100%;"><tbody><tr><td style="text-align: left; vertical-align: top; width: 130px;">
<div id="quickprofilepic">
<p><a href="<?php echo base_url("profile/$member->pseudo"); ?>">
<img src="<?php echo base_url("uploads/$member->thumb_location"); ?>" width="120" height=""></a></p>
</div>
</td><td style="text-align: left; vertical-align: top;"><p><b><?php echo $member->title; ?></b></p>
<p><em><a href="<?php echo base_url("profile/$member->pseudo"); ?>"><?php echo $member->pseudo; ?></a> <?php echo $member->sex; ?> <?php echo $member->civil_status; ?> de <?php echo $member->age; ?> ans cherche <?php echo $member->sexuality; ?> pour <?php echo $member->looking_for; ?></em></p>
<p><?php echo $member->description; ?></p>
<p><a href="http://www.jecontacte.com/envoyer.php?type=message&amp;dest=NegroMignon&amp;source=profil">Envoyer message</a></p>
<p>Rencontre <a href="#"><?php echo $member->town; ?></a>, <a href="#"><?php echo $member->region; ?></a>, <a href="#"><?php echo $member->country; ?></a>
</p>
</td></tr></tbody></table>
<div id="filler">
</div>
</div>
<?php
}
?>