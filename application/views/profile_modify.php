<?php 
var_dump($profile); 
?>
<div id="standardblock">
<div id="title">
Modifier votre profil</div>
Pour ajouter des photos, vous devez aller dans la rubrique <a href="<?php echo base_url('form/inscription_upload_image'); ?>">Ajouter photos</a><br>
Les informations que vous indiquez ici apparaitront sur <a href="<?php echo base_url(); ?>profile/<?php echo $this->session->userdata('pseudo'); ?>">votre profil</a><br>
Les questions marquées d'un astérisque* sont obligatoires. Toutes les autres questions sont facultatives.<br>
<!--Pour personnaliser davantage votre profil, vous pouvez également remplir <a href="http://www.jecontacte.com/entrevue.php">votre entrevue</a>-->
<form name="modifier" method="POST">
<input type="hidden" name="action" value="soumettre">
<table class="standardtable" style="margin-top: 5px;">
<tbody><tr>
<td align="right" width="190" valign="top"><span class="descriptor">Genre*:</span></td>
<td align="left">
<input type="radio" name="sex" value="m" <?php if($profile->sex == 'm') echo 'checked'; ?> > Homme 
<input type="radio" name="sex" value="f" <?php if($profile->sex == 'f') echo 'checked'; ?> > Femme</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Orientation sexuelle*:</span></td><td align="left">
<input type="radio" value="female" name="sexuality" <?php if($profile->sexuality == 'female') echo 'checked'; ?>> Une femme<br>
		<input type="radio" value="male" name="sexuality" <?php if($profile->sexuality == 'male') echo 'checked'; ?>> Un homme<br>
		<input type="radio" value="both" name="sexuality" <?php if($profile->sexuality == 'both') echo 'checked'; ?>> Les deux<br>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Ici pour*:</span></td><td align="left">
<input type="radio" value="rs" name="looking_for" <?php if($profile->looking_for == 'rs') echo 'checked'; ?>> Rencontre sérieuse<br>
		<input type="radio" value="re" name="looking_for" <?php if($profile->looking_for == 're') echo 'checked'; ?>> Rencontre éphémère<br>
		<input type="radio" value="ra" name="looking_for" <?php if($profile->looking_for == 'ra') echo 'checked'; ?>> Rencontre amicale<br>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">État civil*:</span></td><td align="left">
<input type="radio" name="civil_status" value="single" <?php if($profile->civil_status == 'single') echo 'checked'; ?>> Célibataire<br>
<input type="radio" name="civil_status" value="couple" <?php if($profile->civil_status == 'couple') echo 'checked'; ?>> En relation<br>
<input type="radio" name="civil_status" value="married" <?php if($profile->civil_status == 'married') echo 'checked'; ?>> Marié(e)<br>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Date d'aniversaire*:</span></td><td align="left"><select name="ins_jour" size="1">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25" selected="">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="ins_mois" size="1">
	<option value="01">Janvier</option>
	<option value="02" selected="">Février</option>
	<option value="03">Mars</option><option value="04">Avril</option>
	<option value="05">Mai</option>
	<option value="06">Juin</option>
	<option value="07">Juillet</option>
	<option value="08">Août</option>
	<option value="09">Septembre</option>
	<option value="10">Octobre</option>
	<option value="11">Novembre</option>
	<option value="12">Décembre</option>
</select>
<select name="ins_annee" size="1">
	<option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984" selected="">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option></select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Type de physique*:</span></td><td align="left"><select name="ins_poids" size="1">
<option value="Mince" <?php if($profile->appearance == 'Mince') echo 'selected'; ?>>Mince</option>
<option value="Proportionnel" <?php if($profile->appearance == 'Proportionnel') echo 'selected'; ?>>Proportionnel</option>
<option value="Athlétique" <?php if($profile->appearance == 'Athlétique') echo 'selected'; ?>>Athlétique</option>
<option value="Musclé" <?php if($profile->appearance == 'Musclé') echo 'selected'; ?>>Musclé</option>
<option value="Enrobé" <?php if($profile->appearance == 'Enrobé') echo 'selected'; ?>>Enrobé</option>
<option value="Taille forte" <?php if($profile->appearance == 'Taille forte') echo 'selected'; ?>>Taille forte</option>
<option value="Handicapé" <?php if($profile->appearance == 'Handicapé') echo 'selected'; ?>>Handicapé</option>
</select></td>
</tr>
<script language="Javascript">
function updatetaille(taille){
  var metres = parseInt(taille / 100);
  var cm = taille % 100;
  document.modifier.ins_metres.value = metres;
  document.modifier.ins_cm.value = cm;
}
</script>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Taille*:</span></td>
<td align="left">
<input type="text" name="height_m" value="<?php echo $profile->height_m; ?>" size="3" maxlength="2">m 
<input type="text" name="height_cm" value="<?php echo $profile->height_cm; ?>" size="3" maxlength="2">cm 
<select name="rapidselect" size="1" onchange="updatetaille(this.value);">
<option value="0">Menu de sélection rapide</option>
<option value="152">5' 0" (152 cm)</option>
<option value="155">5' 1" (155 cm)</option>
<option value="157">5' 2" (157 cm)</option>
<option value="160">5' 3" (160 cm)</option>
<option value="163">5' 4" (163 cm)</option>
<option value="165">5' 5" (165 cm)</option>
<option value="168">5' 6" (168 cm)</option>
<option value="170">5' 7" (170 cm)</option>
<option value="173">5' 8" (173 cm)</option>
<option value="175">5' 9" (175 cm)</option>
<option value="178">5' 10" (178 cm)</option>
<option value="180">5' 11" (180 cm)</option>
<option value="183">6' 0" (183 cm)</option>
<option value="185">6' 1" (185 cm)</option>
<option value="188">6' 2" (188 cm)</option>
<option value="191">6' 3" (191 cm)</option>
<option value="193">6' 4" (193 cm)</option>
<option value="196">6' 5" (196 cm)</option>
<option value="198">6' 6" (198 cm)</option>
<option value="201">6' 7" (201 cm)</option>
<option value="203">6' 8" (203 cm)</option>
<option value="206">6' 9" (206 cm)</option>
<option value="208">6' 10" (208 cm)</option>
<option value="211">6' 11" (211 cm)</option>
<option value="213">7' 0" (213 cm)</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Emplacement*:</span></td><td align="left">
<div id="pagedivpaysdropdown">Pays: <?php echo $country; ?></div>
<div id="pagedivregiondropdown" class="hidden">Région/Province: <select id="pageregiondropdown" name="regiondropdown" size="1" onchange="loadxml('region', this.value, 'page')">
<option value="">Veuillez choisir</option>
</select></div>
<div id="pagedivregiontext">Région/Province: <input type="text" id="pageregiontext" name="regiontext" length="25" value="<?php echo $profile->region; ?>"></div>


<div id="pagedivvilletext">Ville: <input type="text" id="pagevilletext" name="villetext" length="25" value="<?php echo $profile->town; ?>"></div>

</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Votre titre ou slogan*:</span></td><td align="left">
<input type="text" name="title" value="<?php echo $profile->title; ?>" size="75" maxlength="100"></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">À propos de vous*:</span></td><td align="left"><b>Pas de description vulgaire ou à caractère sexuel</b><br>
<textarea name="description" cols="65" rows="10"><?php echo $profile->description; ?></textarea></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Passe-temps*:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="hobbies[]" value="musique" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="internet" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="facebook" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="hobbies[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Emploi / Travail ou Occupation*:</span></td><td align="left">
<input type="text" name="job" value="<?php echo $profile->job; ?>" size="75" maxlength="100">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Poids*:</span></td><td align="left">
<input type="text" name="weight" value="<?php echo $profile->weight; ?>" size="5" maxlength="5"> <input type="radio" name="ins_poids_type" value="kg" checked="checked"> kgs <input type="radio" name="ins_poids_type" value="lbs"> lbs
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Nationalité*:</span></td><td align="left"><select name="ins_nationalite2" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Français / Française</option>
<option value="2">Belge</option>
<option value="3">Suisse / Suissesse</option>
<option value="4">Canadien / Canadienne</option>
<option value="5">Afghan / Afghane</option>
<option value="6">Albanais / Albanaise</option>
<option value="7">Algérien / Algérienne</option>
<option value="8">Allemand / Allemande</option>
<option value="9">Américain / Américaine</option>
<option value="10">Andorran / Andorrane</option>
<option value="11">Angolais / Angolaise</option>
<option value="12">Argentin / Argentine</option>
<option value="13">Arménien / Arménienne</option>
<option value="14">Australien / Australienne</option>
<option value="15">Autrichien / Autrichienne</option>
<option value="16">Azerbaïdjanais / Azerbaïdjanaise</option>
<option value="17">Bahamien / Bahamienne</option>
<option value="18">Bahreïni / Bahreïnie</option>
<option value="19">Bangladais / Bangladaise</option>
<option value="20">Barbadien / Barbadienne</option>
<option value="21">Bélizien / Bélizienne</option>
<option value="22">Béninois / Béninoise</option>
<option value="23">Bhoutanais / Bhoutanaise</option>
<option value="24">Biélorusse</option>
<option value="25">Birman / Birmane</option>
<option value="26">Bissau-Guinéen / Bissau-Guinéenne</option>
<option value="27">Bolivien / Bolivienne</option>
<option value="28">Bosnien / Bosnienne</option>
<option value="29">Botswanais / Botswanaise</option>
<option value="30">Brésilien / Brésilienne</option>
<option value="31">Britannique</option>
<option value="32">Brunéien / Brunéienne</option>
<option value="33">Bulgare</option>
<option value="34">Burkinabè</option>
<option value="35">Burundais / Burundaise</option>
<option value="36">Cambodgien / Cambodgienne</option>
<option value="37" selected="">Camerounais / Camerounaise</option>
<option value="38">Capverdien / Capverdienne</option>
<option value="39">Centrafricain / Centrafricaine</option>
<option value="40">Chilien / Chilienne</option>
<option value="41">Chinois / Chinoise</option>
<option value="42">Chypriote</option>
<option value="43">Colombien / Colombienne</option>
<option value="44">Comorien / Comorienne</option>
<option value="45">Congolais / Congolaise</option>
<option value="46">Congolais / Congolaise</option>
<option value="47">Costaricien / Costaricienne</option>
<option value="48">Croate</option>
<option value="49">Cubain / Cubaine</option>
<option value="50">Dahoméen / Dahoméenne</option>
<option value="51">Danois / Danoise</option>
<option value="52">Djiboutien / Djiboutienne</option>
<option value="53">Dominiquais / Dominiquaise</option>
<option value="54">Égyptien / Égyptienne</option>
<option value="55">Émirati / Émiratie</option>
<option value="56">Équato-Guinéen / Équato-Guinéenne</option>
<option value="57">Équatorien / Équatorienne</option>
<option value="58">Érythréen / Érythréenne</option>
<option value="59">Espagnol / Espagnole</option>
<option value="60">Est-Timorais / Est-Timoraise</option>
<option value="61">Estonien / Estonienne</option>
<option value="62">Éthiopien / Éthiopienne</option>
<option value="63">Fidjien / Fidjienne</option>
<option value="64">Finlandais / Finlandaise</option>
<option value="65">Formosan / Formosane</option>
<option value="66">Gabonais / Gabonaise</option>
<option value="67">Gambien / Gambienne</option>
<option value="68">Géorgien / Géorgienne</option>
<option value="69">Ghanéen / Ghanéenne</option>
<option value="70">Gilbertin / Gilbertine</option>
<option value="71">Grec / Grecque</option>
<option value="72">Grenadien / Grenadienne</option>
<option value="73">Guadeloupéen / Guadeloupéenne</option>
<option value="74">Guatémaltèque</option>
<option value="75">Guinéen / Guinéenne</option>
<option value="76">Guyanien / Guyanienne</option>
<option value="77">Haïtien / Haïtienne</option>
<option value="78">Hondurien / Hondurienne</option>
<option value="79">Hongrois / Hongroise</option>
<option value="80">Indien / Indienne</option>
<option value="81">Indonésien / Indonésienne</option>
<option value="82">Irakien / Irakienne</option>
<option value="83">Iranien / Iranienne</option>
<option value="84">Irlandais / Irlandaise</option>
<option value="85">Islandais / Islandaise</option>
<option value="86">Israélien / Israélienne</option>
<option value="87">Italien / Italienne</option>
<option value="88">Ivoirien / Ivoirienne</option>
<option value="89">Jamaïcain / Jamaïcaine</option>
<option value="90">Japonais / Japonaise</option>
<option value="91">Jordanien / Jordanienne</option>
<option value="92">Kazakh</option>
<option value="93">Kényan / Kényane</option>
<option value="94">Kirghiz / Kirghize</option>
<option value="95">Koweïtien / Koweïtienne</option>
<option value="96">Laotien / Laotienne</option>
<option value="97">Letton / Lettone</option>
<option value="98">Libanais / Libanaise</option>
<option value="99">Libérien / Libérienne</option>
<option value="100">Libyen / Libyenne</option>
<option value="101">Liechtensteinois / Liechtensteinoise</option>
<option value="102">Lituanien / Lituanienne</option>
<option value="103">Luxembourgeois / Luxembourgeoise</option>
<option value="104">Macédonien / Macédonienne</option>
<option value="105">Malaisien / Malaisienne</option>
<option value="106">Malawite</option>
<option value="107">Maldivien / Maldivienne</option>
<option value="108">Malgache</option>
<option value="109">Malien / Malienne</option>
<option value="110">Maltais / Maltaise</option>
<option value="111">Marocain / Marocaine</option>
<option value="112">Marshallais / Marshallaise</option>
<option value="113">Mauricien / Mauricienne</option>
<option value="114">Mauritanien / Mauritanienne</option>
<option value="115">Mexicain / Mexicaine</option>
<option value="116">Micronésien / Micronésienne</option>
<option value="117">Moldave</option>
<option value="118">Monégasque</option>
<option value="119">Mongol / Mongole</option>
<option value="120">Monténégrin / Monténégrine</option>
<option value="121">Mozambicain / Mozambicaine</option>
<option value="122">Myanmarais / Myanmaraise</option>
<option value="123">Namibien / Namibienne</option>
<option value="124">Nauruan / Nauruane</option>
<option value="125">Néerlandais / Néerlandaise</option>
<option value="126">Néo-Zélandais / Néo-Zélandaise</option>
<option value="127">Népalais / Népalaise</option>
<option value="128">Nicaraguayen / Nicaraguayenne</option>
<option value="129">Nigérian / Nigériane</option>
<option value="130">Nigérien / Nigérienne</option>
<option value="131">Niouéen / Niouéenne</option>
<option value="132">Nord-Coréen / Nord-Coréenne</option>
<option value="133">Norvégien / Norvégienne</option>
<option value="134">Omani / Omanie</option>
<option value="135">Ougandais / Ougandaise</option>
<option value="136">Ouzbek / Ouzbèke</option>
<option value="137">Pakistanais / Pakistanaise</option>
<option value="138">Palauan / Palauane</option>
<option value="139">Palestinien / Palestinienne</option>
<option value="140">Panaméen / Panaméenne</option>
<option value="141">Papouasien / Papouasienne</option>
<option value="142">Paraguayen / Paraguayenne</option>
<option value="143">Péruvien / Péruvienne</option>
<option value="144">Philippin / Philippine</option>
<option value="145">Polonais / Polonaise</option>
<option value="146">Portugais / Portugaise</option>
<option value="147">Qatari / Qatarie</option>
<option value="148">Roumain / Roumaine</option>
<option value="149">Russe</option>
<option value="150">Rwandais / Rwandaise</option>
<option value="151">Saint-Lucien / Saint-Lucienne</option>
<option value="152">Saint-Marinais / Saint-Marinaise</option>
<option value="153">Salomonais / Salomonaise</option>
<option value="154">Salvadorien / Salvadorienne</option>
<option value="155">Samoan / Samoane</option>
<option value="156">Santoméen / Santoméenne</option>
<option value="157">Saoudien / Saoudienne</option>
<option value="158">Sénégalais / Sénégalaise</option>
<option value="159">Serbe</option>
<option value="160">Seychellois / Seychelloise</option>
<option value="161">Sierra-Léonais / Sierra-Léonaise</option>
<option value="162">Singapourien / Singapourienne</option>
<option value="163">Slovaque</option>
<option value="164">Slovène</option>
<option value="165">Somalien / Somalienne</option>
<option value="166">Sotho</option>
<option value="167">Soudanais / Soudanaise</option>
<option value="168">Srilankais / Srilankaise</option>
<option value="169">Sud-Africain / Sud-Africaine</option>
<option value="170">Sud-Coréen / Sud-Coréenne</option>
<option value="171">Suédois / Suédoise</option>
<option value="172">Surinamais / Surinamaise</option>
<option value="173">Swazi</option>
<option value="174">Syrien / Syrienne</option>
<option value="175">Tadjik / Tadjike</option>
<option value="176">Taïwanais / Taïwanaise</option>
<option value="177">Tanzanien / Tanzanienne</option>
<option value="178">Tchadien / Tchadienne</option>
<option value="179">Tchèque</option>
<option value="180">Thaïlandais / Thaïlandaise</option>
<option value="181">Togolais / Togolaise</option>
<option value="182">Tonguien / Tonguienne</option>
<option value="183">Trinidadien / Trinidadienne</option>
<option value="184">Tunisien / Tunisienne</option>
<option value="185">Turc / Turque</option>
<option value="186">Turkmène</option>
<option value="187">Tuvaluan / Tuvaluane</option>
<option value="188">Ukrainien / Ukrainienne</option>
<option value="189">Uruguayen / Uruguayenne</option>
<option value="190">Vanuatuan / Vanuatuane</option>
<option value="191">Vénézuélien / Vénézuélienne</option>
<option value="192">Vietnamien / Vietnamienne</option>
<option value="193">Voltaïque</option>
<option value="194">Yéménite</option>
<option value="195">Yougoslave</option>
<option value="196">Zaïrois / Zaïroise</option>
<option value="197">Zambien / Zambienne</option>
<option value="198">Zimbabwéen / Zimbabwéenne</option>
</select>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Ethnicité*:</span></td><td align="left"><select name="ins_race" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Blanc / Caucasien</option>
<option value="2" selected="">Noir / Africain</option>
<option value="3">Arabe / Moyen Orient</option>
<option value="4">Hispanique / Latino</option>
<option value="5">Asiatique</option>
<option value="6">Indien</option>
<option value="7">Métisse / Mélange</option>
<option value="8">Autre</option>
</select>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Couleur de yeux*:</span></td><td align="left"><select name="ins_couleuryeux" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Marrons / Bruns</option>
<option value="2">Bleus</option>
<option value="3">Verts</option>
<option value="4" selected="">Noirs</option>
</select>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Couleur de cheveux*:</span></td><td align="left"><select name="ins_couleurcheveux" size="1">
<option value="">Aucune réponse</option>
<option value="1">Bruns</option>
<option value="2">Chatains</option>
<option value="3" selected="">Noirs</option>
<option value="4">Blonds</option>
<option value="5">Roux</option>
<option value="6">Gris</option>
<option value="7">Rasé</option>
</select>
</td>
</tr>

<!--
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Intérêts:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_interets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Quelles qualités recherchez vous chez un partenaire?</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Comment définiriez-vous votre personnalité en un seul mot?</span></td><td align="left"><input type="text" name="ins_personnalite" value="" size="25" maxlength="50"></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Comment définiriez-vous votre style vestimentaire en un seul mot?</span></td><td align="left"><input type="text" name="ins_style" value="" size="25" maxlength="50"></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Religion:</span></td><td align="left"><select name="ins_religion2" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Agnostique</option>
<option value="2">Athé(e)</option>
<option value="3">Baptiste</option>
<option value="4">Bouddhiste</option>
<option value="5">Catholique</option>
<option value="6">Chrétien(ne)</option>
<option value="7">Hindou</option>
<option value="8">Juif(ve)</option>
<option value="9">Musulman(e)</option>
<option value="10">Non pratiquant(e)</option>
<option value="11">Protestant(e)</option>
<option value="12">Spirituel(le)</option>
<option value="13">Spirituel(le) mais non pratiquant(e)</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Préférence politique</span></td><td align="left"><input type="text" name="ins_politique" value="" size="25" maxlength="50"></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Avez-vous un quelconque handicap?</span></td><td align="left"><select name="ins_handicap2" size="1">
<option value="0">Non</option>
<option value="1">J'ai un quelconque handicap</option>
<option value="2">Je suis en chaise roulante</option>
<option value="3">Je suis sourd(e)</option>
<option value="4">Je suis muet(te)</option>
<option value="5">Je suis aveugle</option>
<option value="6">Je suis amputé(e)</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Avez-vous une quelconque maladie?</span></td><td align="left"><select name="ins_maladie2" size="1">
<option value="0">Non</option>
<option value="1">J'ai une quelconque maladie</option>
<option value="2">J'ai des allergies</option>
<option value="3">J'ai une maladie cardiovasculaire</option>
<option value="4">Je suis asthmatique</option>
<option value="5">Je suis diabétique</option>
<option value="6">J'ai un cancer</option>
<option value="7">J'ai le parkinson</option>
<option value="8">Je suis séropositif(ve)</option>
<option value="9">J'ai le sida</option>
<option value="10">Je suis alcoolique</option>
<option value="11">Je suis obèse</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">À quelle école ou université avez-vous étudié?</span></td><td align="left"><input type="text" name="ins_ecole" value="" size="75" maxlength="100"></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Quelles études avez-vous faites?</span></td><td align="left"><input type="text" name="ins_etudes" value="" size="75" maxlength="100"></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Quelles sont vos plus grandes qualités?</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_qualites[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Etes-vous divorcé?</span></td><td align="left"><select name="ins_divorce" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Non</option>
<option value="2">Oui je suis divorcé</option>
<option value="3">Divorcé plusieurs fois</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Etes-vous veuf(ve)?</span></td><td align="left"><select name="ins_veuf" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Non</option>
<option value="2">Oui je suis veuf(ve)</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Est-ce que vous désirez vous marier?</span></td><td align="left"><select name="ins_desiremarier" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Oui, je désire me marier</option>
<option value="2">Non, je ne désire pas me marier</option>
<option value="3">Indécis</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Est-ce que vous avez des enfants?</span></td><td align="left"><select name="ins_enfants" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Non</option>
<option value="2">Oui, je suis parent</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Est-ce que vous désirez avoir des enfants?</span></td><td align="left"><select name="ins_veutenfants" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Non</option>
<option value="2">Indécis</option>
<option value="3">Oui</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Est-ce que vous fumez?</span></td><td align="left"><select name="ins_fume" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Non-fumeur(euse)</option>
<option value="2">À l'occasion/Socialement</option>
<option value="4">Fumeur(euse)</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Est-ce que vous consommez de l'alcool?</span></td><td align="left"><select name="ins_alcool" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Jamais</option>
<option value="2">À l'occasion/Socialement</option>
<option value="4">Régulièrement</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Vous avez un animal de compagnie?</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_animal[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Musique favorite:</span></td>
<td>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<br><select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
<select name="ins_musique2[]" size="1" style="margin-bottom: 5px;">
<option value="0">Aucune réponse</option>
<option value="1">Alternative</option>
<option value="2">Blues</option>
<option value="3">Classique</option>
<option value="4">Country</option>
<option value="5">Dance</option>
<option value="6">Électronique</option>
<option value="7">Hip Hop</option>
<option value="8">Indépendante</option>
<option value="9">Jazz</option>
<option value="10">Metal</option>
<option value="11">Musique francaise</option>
<option value="12">Pop</option>
<option value="13">RnB</option>
<option value="14">Rap</option>
<option value="15">Reggae</option>
<option value="16">Rock</option>
<option value="17">Soul</option>
<option value="18">Techno</option>
</select>
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Films favoris:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_films[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Livres favoris:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_livres[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Voyages que vous avez faits:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Voyages que vous désirez faire:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_voyages2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Émissions TV favorites:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_seriestv[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Mets favoris:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_mets[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Sports que vous pratiquez:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Sports que vous regardez:</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_sports2[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Salaire annuel:</span></td><td align="left"><select name="ins_salaire" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Moins de 5000</option>
<option value="2">5000 à 10,000</option>
<option value="3">10,000 à 15,000</option>
<option value="4">15,000 à 20,000</option>
<option value="5">20,000 à 25,000</option>
<option value="6">25,000 à 30,000</option>
<option value="7">30,000 à 40,000</option>
<option value="8">40,000 à 50,000</option>
<option value="9">50,000 à 60,000</option>
<option value="10">60,000 à 70,000</option>
<option value="11">70,000 à 100,000</option>
<option value="12">100,000 à 150,000</option>
<option value="13">150,000 à 200,000</option>
<option value="14">200,000 à 500,000</option>
<option value="15">500,000 à 1,000,000</option>
<option value="16">1,000,000 +</option>
</select></td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Quels sont vos pires défauts?</span></td>
<td>
Un seul mot par case<br>
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<br><input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
<input type="text" name="ins_defauts[]" value="" size="10" maxlength="255" style="margin-bottom: 5px;">
</td>
</tr>
<tr>
<td align="right" width="190" valign="top"><span class="descriptor">Est-ce que vous déménageriez par amour?</span></td><td align="left"><select name="ins_demenager" size="1">
<option value="0">Aucune réponse</option>
<option value="1">Non</option>
<option value="2">Oui, mais dans mon pays</option>
<option value="3">Oui, peu importe le pays</option>
</select></td>
</tr>
-->
<tr>
<td align="right" width="190" valign="top"></td><td align="left"><input type="submit" value="Soumettre"></td>
</tr>
</tbody></table>
</form>
</div>