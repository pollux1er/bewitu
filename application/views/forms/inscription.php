<div id="standardblock">
<div id="title">
Inscription gratuite : étape 1
</div>
Site de rencontre 100% gratuit!
	<form method="POST" name="inscription">
	<table class="standardtable">
	<tbody>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Choisissez votre pseudo</span></td>
		<td align="left">
			<input type="text" maxlength="20" size="25" value="<?php echo set_value('pseudo'); ?>" name="pseudo">
			<?php echo form_error('pseudo'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Choisissez votre mot de passe</span></td>
		<td align="left"><input type="password" maxlength="20" size="25" value="<?php echo set_value('password'); ?>" name="password">
		<?php echo form_error('password'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Confirmez votre mot de passe</span></td>
		<td align="left"><input type="password" maxlength="20" size="25" value="<?php echo set_value('password2'); ?>" name="password2">
		<?php echo form_error('password2'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Votre email</span></td>
		<td align="left"><input type="text" maxlength="75" size="25" value="<?php echo set_value('email'); ?>" name="email"><br>
		Inscrivez un email valide car une demande de confirmation vous sera envoyée.
		<?php echo form_error('email'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Vous êtes</span></td>
		<td align="left">
			<select name="sex">
				<option value="">Veuillez choisir</option>
				<option value="m" <?php echo set_select('sex', 'm'); ?>>Je suis un homme</option>
				<option value="f" <?php echo set_select('sex', 'f'); ?>>Je suis une femme</option>
			</select>
			<?php echo form_error('sex'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Emplacement</span></td>
		<td align="left">
			<div id="pagedivpaysdropdown">Pays: 
			<input type="hidden" value="<?php echo set_value('pays'); ?>" name="pays"><?php echo $country; ?></div>
			<div id="pagedivregiontext">Région/Province: <input type="text" value="<?php echo set_value('region'); ?>" length="25" name="region" id="region"></div>
			
			<div id="pagedivvilletext">Ville: <input type="text" value="<?php echo set_value('ville'); ?>" length="25" name="ville" id="ville"></div>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Date d'aniversaire</span></td><td align="left">
		<select size="1" name="birthdate-d">
		<option value="01">01</option>
		<option value="02">02</option>
		<option value="03">03</option>
		<option value="04">04</option>
		<option value="05">05</option>
		<option value="06">06</option>
		<option value="07">07</option>
		<option value="08">08</option>
		<option value="09">09</option>
		<option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
		<select size="1" name="birthdate-m">
			<option value="01">Janvier</option>
			<option value="02">Février</option>
			<option value="03">Mars</option>
			<option value="04">Avril</option>
			<option value="05">Mai</option>
			<option value="06">Juin</option>
			<option value="07">Juillet</option>
			<option value="08">Août</option>
			<option value="09">Septembre</option>
			<option value="10">Octobre</option>
			<option value="11">Novembre</option>
			<option value="12">Décembre</option>
		</select>
		<select size="1" name="birthdate-y">
		<option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option></select></td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Votre Titre ou Slogan</span></td>
		<td align="left"><input type="text" maxlength="100" size="50" value="<?php echo set_value('title'); ?>" name="title">
		<?php echo form_error('title'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">À propos de vous</span></td>
		<td align="left"><span class="descriptor">Votre description:</span><br>
		<b>Pas de description vulgaire ou à caractère sexuel</b><br>
		Vous pouvez écrire la raison pour laquelle vous vous inscrivez, ce que vous recherchez, ce que vous faites dans la vie, vos activités, vos qualités, vos rêves, ce que vous aimez ou n'aimez pas etc. Plus vous serez original, plus vous aurez des chances de recevoir des messages et de faire des rencontres.<br>
		<textarea rows="10" cols="75" name="description"><?php echo set_value('description'); ?></textarea>
		<?php echo form_error('description'); ?>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"><span class="descriptor">Cliquez les cases</span><br />
		<?php echo form_error('conditions1'); ?>
		</td><td align="left">
			<input type="checkbox" value="1" name="conditions1" <?php echo set_checkbox('conditions1', '1'); ?> /> J'ai 18 ans ou plus.<br>
			<input type="checkbox" value="1" name="conditions2" <?php echo set_checkbox('conditions2', '1'); ?> /> J'ai lu et accepte les <a target="_blank" href="http://www.bewitu.com/conditions">Termes et conditions</a> d'utilisation et les <a target="_blank" href="http://www.bewitu.com/regles-de-confidentialite">Règles de confidentialité</a><br>
		</td>
	</tr>
	<tr>
		<td width="220" valign="top" align="right"></td>
		<td align="left"><input type="submit" value="Passez à l'étape 2"></td>
	</tr>
	</tbody>
	</table>
	</form>
</div>