<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
	<title><?php echo $title; ?></title>
	<?php
		$d1 = '';
		if(isset($profile)) { 
			if($profile->sexuality == 'hetero' && $profile->sex == 'Homme ')
				$d1 = 'Homme cherche Femme, ';
			else
				$d1 = 'Femme cherche Homme, ';
		}
		if(isset($description))
			$texte = $d1 . $description;
		else
			$texte = "Site de rencontre gratuit! | BeWitU.com";
		
		if(isset($keywords))
			$keywords = $keywords;
		else
			$keywords = "rencontre gratuite, site rencontre, rencontre célibataires, cherche homme, cherche femme, recherche amour, rencontre en ligne";
			
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => $texte),
				array('name' => 'keywords', 'content' => $keywords),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);

		echo meta($meta); 
	?>
	
	<META NAME="CLASSIFICATION" CONTENT="rencontre, celibataire, homme cherche femme, amour, amitie, couple, relation, ame soeur">
	<?php //echo meta('description', 'Site de rencontre 100% gratuit!'); ?>
	<?php echo link_tag('css/main.css'); ?>
	<link REL="SHORTCUT ICON" HREF="<?php echo base_url();?>favicon.ico" type="image/x-icon" />
</head>


<body id="jecontact"><div id="pagecontainer">
<div id="menublock">
	<h1><strong><span id="logo"><a href="<?php echo base_url();?>"><span class="partie1">Be</span><span class="partie2">wit</span><span class="partie3">U</span></a></span>
	</strong></h1><div></div><h1><strong><span id="logotext"><a class="link1" href="<?php echo base_url();?>">Site de rencontre gratuit.</a>
	</span>
	</strong></h1><div id="logopresentation">
	BeWitU.com est un site de rencontre gratuit pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés, ou simplement pour un dial sur le chat et forums de discussions! Le fonctionnement est simple: vous créez votre petite annonce, puis vous contactez les célibataires avec qui vous avez une affinité amoureuse ou amicale. Si vous êtes une personne qui cherche le véritable amour de sa vie, une relation sérieuse, la drague, la séduction ou une simple amitié, ce site s'adresse à vous. N'oubliez pas que ce site de rencontre est vraiment 100% gratuit, donc vous n'avez rien à perdre!
	</div>
</div>

<?php if(isset($validation)) {
	if(!$validation) {?>
<div id="standardblock" style="background-color: #FFE1E1; border:1px solid #FF0000;">
	<div id="title">
	<?php echo $this->session->userdata('pseudo'); ?>, votre email n'est pas encore confirme!
	</div>
	Si vous validez votre email, vous pourrez ecrire aux membres et augmenterez considérablement vos chances de faire de nouvelles rencontres.<br>
	Si vous n'avez toujours pas recu le mail d'activation, cliquez ici : <a href="<?php echo base_url('form/revalidate'); ?>">Renvoyer l'email d'activation</a>
</div>
<?php } } ?>

<div id="menublock">
	<div id="title">
	Votre Menu</div>
	<div id="menulinks">
	<a href="<?php echo base_url(); ?>">Accueil</a>	<span class="separator"> | </span>
	<a href="<?php echo base_url('form/inscription'); ?>">Inscription Gratuite</a><span class="separator"> | </span>
	<a href="<?php echo base_url('form/login'); ?>">Se connecter</a><span class="separator"> | </span>
	<a href="<?php echo base_url('form/inscription'); ?>">Messages Privés</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Votre profil</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Ils ont vu votre profil</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Ils ont voté pour vous</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Vos favoris</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Vos amis</a>
	
	
	<br>
	<a href="<?php echo base_url(); ?>">Témoignages</a><span class="separator"> |</span>
	<a href="<?php echo base_url('form/inscription_upload_image');?>">Ajouter photos</a>
	<span class="separator"> |</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Modifier votre profil</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Votre entrevue</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url(); ?>">Forum</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('validation/photo'); ?>">Modérer photos</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('aide'); ?>">Aide</a>
	<span class="separator">|</span>
	<a href="<?php echo base_url('form/inscription'); ?>">Editer votre compte</a>
	</div>
</div>

<div id="menublock">
<h2><span id="title">Recherche rencontre</span></h2>
<div id="menulinks">
<p>
<a href="<?php echo base_url('users/list_latest');?>">Nouveaux inscrits</a>
<span class="separator">&nbsp;|</span>
<a href="<?php echo base_url('users/list_latest/women');?>">Cherche Femme</a>
<span class="separator">&nbsp;|</span>
<a href="<?php echo base_url('users/list_latest/men');?>">Cherche Homme</a>
<span class="separator">&nbsp;|</span>
<a href="<?php echo base_url();?>">Top look femmes</a>
<span class="separator">&nbsp;|</span>
<a href="<?php echo base_url();?>">Top look hommes</a>
<br>(<span title="6 316 Membres et 1 893 Invités"><?php echo $online ?></span>) <a href="<?php echo base_url();?>usagers/en-ligne-pour-rencontre/1.html">En ligne</a>
<span class="separator">&nbsp;|</span>
(72 449) <a href="<?php echo base_url();?>">Connectés dernières 24h</a>
<span class="separator">&nbsp;|</span>
(<?php echo $all; ?> membres)
<span class="separator">&nbsp;|</span>
<a href="<?php echo base_url();?>">Recherche avancée</a>
</p>
<p>
</p><form class="recherche" action="<?php echo base_url();?>" method="POST" name="recherche">
<input type="hidden" value="chercher" name="action">
Recherche

<select name="rech_genre">
<option value="1">Homme</option>
<option selected="selected" value="2">Femme</option>
</select>
<span class="separator2">&nbsp;</span>

Âge:
<select name="rech_agemin">
<option selected="selected" value="18">18</option>
<option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option></select>

À

<select name="rech_agemax">
<option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option selected="selected" value="99">99</option>
</select>
<span class="separator2">&nbsp;</span>
Avec photo: <select size="1" name="rech_avatar">
<option value="1">Avec photo</option>
<option value="">Peu importe</option>
</select>
<span class="separator2">&nbsp;</span>
<span id="menudivpaysdropdown">Pays: <select onchange="loadxml('pays', this.value, 'menu')" size="1" name="paysdropdown" id="menupaysdropdown">
<option value="">Peu importe</option>
<option value="FR">France</option><option value="BE">Belgique</option><option value="CH">Suisse</option><option value="CA">Canada</option><option value="plusdepays">Plus de pays</option></select></span>
<span class="hidden" id="menudivregiondropdown">Région/Province: <select size="1" name="regiondropdown" id="menuregiondropdown">
<option value="">Peu importe</option>
</select></span>
<span class="hidden" id="menudivregiontext">Région/Province: <input type="text" value="" length="25" name="regiontext" id="menuregiontext"></span>
<!-- -->
<span class="hidden" id="menudivdepartementdropdown"></span>
<span class="hidden" id="menudivvilledropdown"></span>
<span class="hidden" id="menudivvilletext"></span>
<!-- -->
<span class="hidden" id="menudivattente">Mise à jour du formulaire...</span>
<input type="submit" value="Recherchez!">
</form>
<p></p>
</div>
</div>