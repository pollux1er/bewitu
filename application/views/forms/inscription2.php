<div id="standardblock">
<div id="title">
Inscription gratuite : étape 2
</div>
<h2>Site de rencontre 100% gratuit!</h2>
	
	<form enctype="multipart/form-data" method="POST" action="" name="inscription">
	
		<table class="standardtable">
		<tbody><tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Vous recherchez :</span></td><td align="left">
		<input type="radio" value="female" name="orientation" <?php echo set_radio('orientation', 'female', true); ?>> Une femme<br>
		<input type="radio" value="male" name="orientation" <?php echo set_radio('orientation', 'male'); ?>> Un homme<br>
		<input type="radio" value="both" name="orientation" <?php echo set_radio('orientation', 'both'); ?>> Les deux<br>
		<?php echo form_error('orientation'); ?>
		</td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Vous êtes ici pour</span></td><td align="left">
		<input type="radio" value="rs" name="but" <?php echo set_radio('but', 'rs', true); ?>> Rencontre sérieuse<br>
		<input type="radio" value="re" name="but" <?php echo set_radio('but', 're'); ?>> Rencontre éphémère<br>
		<input type="radio" value="ra" name="but" <?php echo set_radio('but', 'ra'); ?>> Rencontre amicale<br>
		<?php echo form_error('but'); ?>
		</td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">État civil</span></td><td align="left">
		<input type="radio" value="single" name="civil_status" <?php echo set_radio('etatcivil', 'single', true); ?>> Célibataire<br>
		<input type="radio" value="couple" name="civil_status" <?php echo set_radio('etatcivil', 'couple'); ?>> En relation<br>
		<input type="radio" value="married" name="civil_status" <?php echo set_radio('etatcivil', 'married'); ?>> Marié(e)<br>
		<?php echo form_error('etatcivil'); ?>
		</td>
		</tr>
		
		<script language="Javascript">
		function updatetaille(taille){
		  var metres = parseInt(taille / 100);
		  var cm = taille % 100;
		  document.inscription.metres.value = metres;
		  document.inscription.cm.value = cm;
		}
		</script>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Taille</span></td>
		<td align="left">
		<input type="text" maxlength="2" size="3" value="<?php echo set_value('metres'); ?>" name="metres">m 
		<input type="text" maxlength="2" size="3" value="<?php echo set_value('cm'); ?>" name="cm">cm 
		<select onchange="updatetaille(this.value);" size="1" name="rapidselect">
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
		<option value="188">6' 2"(188 cm)</option>
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
		<td width="150" valign="top" align="right"><span class="descriptor">Physique</span></td><td align="left"><select size="1" name="appearance">
		<option value="">Veuillez choisir</option>
		<option value="Mince" <?php echo set_select('appearance', 'Mince'); ?>> Mince</option>
		<option value="Proportionnel" <?php echo set_select('appearance', 'Proportionnel'); ?>> Proportionnel</option>
		<option value="Athlétique" <?php echo set_select('appearance', 'Athlétique'); ?>> Athlétique</option>
		<option value="Musclé" <?php echo set_select('appearance', 'Musclé'); ?>> Musclé</option>
		<option value="Enrobé" <?php echo set_select('appearance', 'Enrobé'); ?>> Enrobé</option>
		<option value="Taille forte" <?php echo set_select('appearance', 'Taille forte'); ?>> Taille forte</option>
		<option value="Handicapé" <?php echo set_select('appearance', 'Handicapé'); ?>> Handicapé</option>
		</select></td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Passe-temps</span></td><td align="left"><b>Un seul mot clé par case svp</b><br>
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="<?php  ?>" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<br><input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		<input type="text" style="margin-bottom: 5px;" maxlength="255" size="12" value="" name="passetemps[]">
		</td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Poids</span></td><td align="left">
		<input type="text" maxlength="5" size="5" value="<?php echo set_value('weight'); ?>" name="weight"> 
		<input type="radio" checked="checked" value="kg" name="weight_type"> kgs <input type="radio" value="lbs" name="weight_type"> lbs
		</td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Emploi / Travail ou Occupation</span></td>
		<td align="left"><input type="text" maxlength="100" size="50" value="<?php echo set_value('job'); ?>" name="job"></td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Nationalité</span></td><td align="left"><select size="1" name="home_country">
		<option value="">Veuillez choisir</option>
		<option value="1"> Français / Française</option>
		<option value="2">Belge</option>
		<option value="3"> Suisse / Suissesse</option>
		<option value="4"> Canadien / Canadienne</option>
		<option value="5"> Afghan / Afghane	</option>
		<option value="6"> Albanais / Albanaise	</option>
		<option value="7"> Algérien / Algérienne</option>
		<option value="8"> Allemand / Allemande</option>
		<option value="9"> Américain / Américaine</option>
		<option value="10"> Andorran / Andorrane</option>
		<option value="11"> Angolais / Angolaise</option>
		<option value="12"> Argentin / Argentine</option>
		<option value="13"> Arménien / Arménienne</option>
		<option value="14"> Australien / Australienne</option>
		<option value="15"> Autrichien / Autrichienne</option>
		<option value="16"> Azerbaïdjanais / Azerbaïdjanaise</option>
		<option value="17"> Bahamien / Bahamienne</option>
		<option value="18"> Bahreïni / Bahreïnie</option>
		<option value="19"> Bangladais / Bangladaise</option>
		<option value="20"> Barbadien / Barbadienne</option>
		<option value="21"> Bélizien / Bélizienne</option>
		<option value="22"> Béninois / Béninoise</option>
		<option value="23"> Bhoutanais / Bhoutanaise</option>
		<option value="24"> Biélorusse</option>
		<option value="25"> Birman / Birmane
		</option><option value="26"> Bissau-Guinéen / Bissau-Guinéenne
		</option><option value="27"> Bolivien / Bolivienne
		</option><option value="28"> Bosnien / Bosnienne
		</option><option value="29"> Botswanais / Botswanaise
		</option><option value="30"> Brésilien / Brésilienne
		</option><option value="31"> Britannique
		</option><option value="32"> Brunéien / Brunéienne
		</option><option value="33"> Bulgare
		</option><option value="34"> Burkinabè
		</option><option value="35"> Burundais / Burundaise
		</option><option value="36"> Cambodgien / Cambodgienne
		</option><option value="37"> Camerounais / Camerounaise
		</option><option value="38"> Capverdien / Capverdienne
		</option><option value="39"> Centrafricain / Centrafricaine
		</option><option value="40"> Chilien / Chilienne
		</option><option value="41"> Chinois / Chinoise
		</option><option value="42"> Chypriote
		</option><option value="43"> Colombien / Colombienne
		</option><option value="44"> Comorien / Comorienne
		</option><option value="45"> Congolais / Congolaise
		</option><option value="46"> Congolais / Congolaise
		</option><option value="47"> Costaricien / Costaricienne
		</option><option value="48"> Croate
		</option><option value="49"> Cubain / Cubaine
		</option><option value="50"> Dahoméen / Dahoméenne
		</option><option value="51"> Danois / Danoise
		</option><option value="52"> Djiboutien / Djiboutienne
		</option><option value="53"> Dominiquais / Dominiquaise
		</option><option value="54"> Égyptien / Égyptienne
		</option><option value="55"> Émirati / Émiratie
		</option><option value="56"> Équato-Guinéen / Équato-Guinéenne
		</option><option value="57"> Équatorien / Équatorienne
		</option><option value="58"> Érythréen / Érythréenne
		</option><option value="59"> Espagnol / Espagnole
		</option><option value="60"> Est-Timorais / Est-Timoraise
		</option><option value="61"> Estonien / Estonienne
		</option><option value="62"> Éthiopien / Éthiopienne
		</option><option value="63"> Fidjien / Fidjienne
		</option><option value="64"> Finlandais / Finlandaise
		</option><option value="65"> Formosan / Formosane
		</option><option value="66"> Gabonais / Gabonaise
		</option><option value="67"> Gambien / Gambienne
		</option><option value="68"> Géorgien / Géorgienne
		</option><option value="69"> Ghanéen / Ghanéenne
		</option><option value="70"> Gilbertin / Gilbertine
		</option><option value="71"> Grec / Grecque
		</option><option value="72"> Grenadien / Grenadienne
		</option><option value="73"> Guadeloupéen / Guadeloupéenne
		</option><option value="74"> Guatémaltèque
		</option><option value="75"> Guinéen / Guinéenne
		</option><option value="76"> Guyanien / Guyanienne
		</option><option value="77"> Haïtien / Haïtienne
		</option><option value="78"> Hondurien / Hondurienne
		</option><option value="79"> Hongrois / Hongroise
		</option><option value="80"> Indien / Indienne
		</option><option value="81"> Indonésien / Indonésienne
		</option><option value="82"> Irakien / Irakienne
		</option><option value="83"> Iranien / Iranienne
		</option><option value="84"> Irlandais / Irlandaise
		</option><option value="85"> Islandais / Islandaise
		</option><option value="86"> Israélien / Israélienne
		</option><option value="87"> Italien / Italienne
		</option><option value="88"> Ivoirien / Ivoirienne
		</option><option value="89"> Jamaïcain / Jamaïcaine
		</option><option value="90"> Japonais / Japonaise
		</option><option value="91"> Jordanien / Jordanienne
		</option><option value="92"> Kazakh
		</option><option value="93"> Kényan / Kényane
		</option><option value="94"> Kirghiz / Kirghize
		</option><option value="95"> Koweïtien / Koweïtienne
		</option><option value="96"> Laotien / Laotienne
		</option><option value="97"> Letton / Lettone
		</option><option value="98"> Libanais / Libanaise
		</option><option value="99"> Libérien / Libérienne
		</option><option value="100"> Libyen / Libyenne
		</option><option value="101"> Liechtensteinois / Liechtensteinoise
		</option><option value="102"> Lituanien / Lituanienne
		</option><option value="103"> Luxembourgeois / Luxembourgeoise
		</option><option value="104"> Macédonien / Macédonienne
		</option><option value="105"> Malaisien / Malaisienne
		</option><option value="106"> Malawite
		</option><option value="107"> Maldivien / Maldivienne
		</option><option value="108"> Malgache
		</option><option value="109"> Malien / Malienne
		</option><option value="110"> Maltais / Maltaise
		</option><option value="111"> Marocain / Marocaine
		</option><option value="112"> Marshallais / Marshallaise
		</option><option value="113"> Mauricien / Mauricienne
		</option><option value="114"> Mauritanien / Mauritanienne
		</option><option value="115"> Mexicain / Mexicaine
		</option><option value="116"> Micronésien / Micronésienne
		</option><option value="117"> Moldave
		</option><option value="118"> Monégasque
		</option><option value="119"> Mongol / Mongole
		</option><option value="120"> Monténégrin / Monténégrine
		</option><option value="121"> Mozambicain / Mozambicaine
		</option><option value="122"> Myanmarais / Myanmaraise
		</option><option value="123"> Namibien / Namibienne
		</option><option value="124"> Nauruan / Nauruane
		</option><option value="125"> Néerlandais / Néerlandaise
		</option><option value="126"> Néo-Zélandais / Néo-Zélandaise
		</option><option value="127"> Népalais / Népalaise
		</option><option value="128"> Nicaraguayen / Nicaraguayenne
		</option><option value="129"> Nigérian / Nigériane
		</option><option value="130"> Nigérien / Nigérienne
		</option><option value="131"> Niouéen / Niouéenne
		</option><option value="132"> Nord-Coréen / Nord-Coréenne
		</option><option value="133"> Norvégien / Norvégienne
		</option><option value="134"> Omani / Omanie
		</option><option value="135"> Ougandais / Ougandaise
		</option><option value="136"> Ouzbek / Ouzbèke
		</option><option value="137"> Pakistanais / Pakistanaise
		</option><option value="138"> Palauan / Palauane
		</option><option value="139"> Palestinien / Palestinienne
		</option><option value="140"> Panaméen / Panaméenne
		</option><option value="141"> Papouasien / Papouasienne
		</option><option value="142"> Paraguayen / Paraguayenne
		</option><option value="143"> Péruvien / Péruvienne
		</option><option value="144"> Philippin / Philippine
		</option><option value="145"> Polonais / Polonaise
		</option><option value="146"> Portugais / Portugaise
		</option><option value="147"> Qatari / Qatarie
		</option><option value="148"> Roumain / Roumaine
		</option><option value="149"> Russe
		</option><option value="150"> Rwandais / Rwandaise
		</option><option value="151"> Saint-Lucien / Saint-Lucienne
		</option><option value="152"> Saint-Marinais / Saint-Marinaise
		</option><option value="153"> Salomonais / Salomonaise
		</option><option value="154"> Salvadorien / Salvadorienne
		</option><option value="155"> Samoan / Samoane
		</option><option value="156"> Santoméen / Santoméenne
		</option><option value="157"> Saoudien / Saoudienne
		</option><option value="158"> Sénégalais / Sénégalaise
		</option><option value="159"> Serbe
		</option><option value="160"> Seychellois / Seychelloise
		</option><option value="161"> Sierra-Léonais / Sierra-Léonaise
		</option><option value="162"> Singapourien / Singapourienne
		</option><option value="163"> Slovaque
		</option><option value="164"> Slovène
		</option><option value="165"> Somalien / Somalienne
		</option><option value="166"> Sotho
		</option><option value="167"> Soudanais / Soudanaise
		</option><option value="168"> Srilankais / Srilankaise
		</option><option value="169"> Sud-Africain / Sud-Africaine
		</option><option value="170"> Sud-Coréen / Sud-Coréenne
		</option><option value="171"> Suédois / Suédoise
		</option><option value="172"> Surinamais / Surinamaise
		</option><option value="173"> Swazi
		</option><option value="174"> Syrien / Syrienne
		</option><option value="175"> Tadjik / Tadjike
		</option><option value="176"> Taïwanais / Taïwanaise
		</option><option value="177"> Tanzanien / Tanzanienne
		</option><option value="178"> Tchadien / Tchadienne
		</option><option value="179"> Tchèque
		</option><option value="180"> Thaïlandais / Thaïlandaise
		</option><option value="181"> Togolais / Togolaise
		</option><option value="182"> Tonguien / Tonguienne
		</option><option value="183"> Trinidadien / Trinidadienne
		</option><option value="184"> Tunisien / Tunisienne
		</option><option value="185"> Turc / Turque
		</option><option value="186"> Turkmène
		</option><option value="187"> Tuvaluan / Tuvaluane
		</option><option value="188"> Ukrainien / Ukrainienne
		</option><option value="189"> Uruguayen / Uruguayenne
		</option><option value="190"> Vanuatuan / Vanuatuane
		</option><option value="191"> Vénézuélien / Vénézuélienne
		</option><option value="192"> Vietnamien / Vietnamienne
		</option><option value="193"> Voltaïque
		</option><option value="194"> Yéménite
		</option><option value="195"> Yougoslave
		</option><option value="196"> Zaïrois / Zaïroise
		</option><option value="197"> Zambien / Zambienne
		</option><option value="198"> Zimbabwéen / Zimbabwéenne
		</option></select></td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Ethnicité</span></td><td align="left">
		<select size="1" name="ethnicity">
		<option value="">Veuillez choisir</option>
		<option value="Blanc"> Blanc / Caucasien
		</option><option value="Africain"> Noir / Africain
		</option><option value="Arabe"> Arabe / Moyen Orient
		</option><option value="Latino"> Hispanique / Latino
		</option><option value="Asiatique"> Asiatique
		</option><option value="Indien"> Indien
		</option><option value="Métisse"> Métisse / Mélange
		</option><option value="Autre"> Autre
		</option></select></td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Couleur de yeux</span></td><td align="left"><select size="1" name="eye_color">
		<option value="">Veuillez choisir</option>
		<option value="Marrons"> Marrons / Bruns
		</option><option value="Bleus"> Bleus
		</option><option value="Verts"> Verts
		</option><option value="Noirs"> Noirs
		</option></select></td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Couleur de cheveux</span></td><td align="left"><select size="1" name="hair_color">
		<option value="">Veuillez choisir</option>
		<option value="Bruns"> Bruns
		</option><option value="Chatains"> Chatains
		</option><option value="Noirs"> Noirs
		</option><option value="Blonds"> Blonds
		</option><option value="Roux"> Roux
		</option><option value="Gris"> Gris
		</option><option value="Rasé"> Rasé
		</option></select></td>
		</tr>
		<tr>
		<td width="150" valign="top" align="right"><span class="descriptor">Vérification</span></td><td align="left">Veuillez transcrire le code affiché dans l'image ci-dessous.<br>
		
		<?php 
		$captcha['recaptcha'] = $recaptcha;
		echo $this->load->view('recaptcha/recaptcha',$recaptcha); ?>
		<?php echo form_error('recaptcha_response_field'); ?>
		</td>
		</tr>
		
		<tr>
		<td width="150" valign="top" align="right"></td><td align="left"><input type="submit" value="Terminer votre inscription" /></td>
		</tr>
		</tbody>
		</table>
	</form>
	
</div>