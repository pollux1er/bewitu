<script language="Javascript">
var nbsmilies = 0;
var lastsmilie = '';
function checkdata(){
  if (document.publier.message.value == ''){
    alert('Vous devez remplir tous les champs du formulaire.');
    return false;
  }
  else{
    return true;
  }
}
function moresmilies(){
  window.open('http://www.jecontacte.com/smilies.php','smiliespop','width=530,height=170');
}
function inserer(nom){
  insertAtCursor(document.publier.message, nom);
}
function inserer_smilie(nom){
  if (nbsmilies < 1){
    if (nom != lastsmilie){
      nbsmilies++;
      lastsmilie = nom;
      insertAtCursor(document.publier.message, nom);
    }
  }
}
function insererphoto(nom, prefix){
  var temp = '[photo]' + nom + '[\/photo]';
  insertAtCursor(document.publier.message, temp);
}
function insertAtCursor(myField, myValue) {
  //IE support
  if (document.selection) {
    myField.focus();
    sel = document.selection.createRange();
    sel.text = myValue;
  }
  //MOZILLA/NETSCAPE support
  else if (myField.selectionStart || myField.selectionStart == '0') {
    var startPos = myField.selectionStart;
    var endPos = myField.selectionEnd;
    myField.value = myField.value.substring(0, startPos)
                  + myValue
                  + myField.value.substring(endPos, myField.value.length);
  } else {
    myField.value += myValue;
  }
}
</script>
<div id="profileblock">
<div id="smilies" style="float: right; align: left; width: 175px;">
<a href="Javascript: moresmilies();">Ajouter un smilie</a><br>
<a href="#" onclick="Javascript:write_photo_nav();">Ajouter une photo</a>
</div>
<div id="title">
Envoyer un message</div>
<form method="POST" action="<?php echo base_url("message/$recipient"); ?>" name="publier">
<input type="hidden" name="action" value="message">
<input type="hidden" name="source" value="profil">
À: <input type="text" name="dest" size="25" value="<?php echo $recipient; ?>" readonly /><br>
<textarea name="message" cols="65" rows="10"></textarea><br>
<input type="submit" value="Envoyer message" onclick="return checkdata();">
</form>
<script language="Javascript">
var allpics = new Array();
var imgsrc = new Array();
var titres = new Array();
var descriptions = new Array();
var tags = new Array();
var prefix = new Array();
allpics[0] = '233929363_138982390';
prefix[0] = 'p/o/l/';
</script>
<div id="photos_profil_nav">
</div>
<script language="Javascript">
var startat = 0;
var leftarrow_on = "<a href=\"Javascript:;\" onclick=\"startat--; write_photo_nav(); return true;\"><img src=\"http://www.jecontacte.org/flechegauche.gif\" style=\"border: 0px solid #ffffff;\" /><\/a>\n";
var leftarrow_off = "";
var rightarrow_on = "<a href=\"Javascript:;\" onclick=\"startat++; write_photo_nav(); return true;\"><img src=\"http://www.jecontacte.org/flechedroite.gif\" style=\"border: 0px solid #ffffff;\" /><\/a>\n";
var rightarrow_off = "";
function write_photo_nav(){
  div = document.getElementById('photos_profil_nav');
  leftpart = leftarrow_off;
  rightpart = rightarrow_off;
  if (startat < 0){
    startat = 0;
  }
  if (startat > 0){
    startat = 0;
  }
  var picnum = startat;
  var temp = leftpart;
  for (var x = 0; x < 1; x++){
    if (picnum > 0){
      picnum = 0;
    }
    temp = temp + "<a href=\"Javascript:insererphoto('"+allpics[picnum]+"','"+prefix[picnum]+"');\"><img src=\"http://www.jecontacte.org/v2/"+prefix[picnum]+"sth/"+allpics[picnum]+".jpg\" width=\"80\" height=\"80\" /><\/a>\n";
    picnum++;
  }
  temp = temp + rightpart;
  div.innerHTML = 'Pour ajouter une ou plusieurs photos à votre message, cliquez les images désirées.<br />' + temp;
}
</script>
</div>