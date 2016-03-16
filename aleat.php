<html>
    <head><title>Générateur de Signatures</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />  
    </head>
    <body>
        <h1>Bienvenue sur mon Générateur de Signatures</h1>
        <h2>La polémique fait rage sur la vérification des signatures de change.org</h2>
        <h3>Il est soi-disant impossible de générer des soutiens à une pétitions puisque les fausses signatures sont supprimées au bout de 48 Max</h3>

<script language="javascript">
function filter_numeric(param_field)
{
  var s = param_field.value;
  var lg = s.length;
  if (lg < 1)
     return true;
  var lastchar = s.charAt(lg - 1);
  if (lastchar < "0" || lastchar > "9" ) {
     // alert("Saisie numérique uniquement" );
     param_field.value = s.substring(0, lg - 1);
     param_field.focus();  
     return false;
  }
  return true;
}
</script> 

<form name="saisie" action="aleat.php" method="post">
<p>
   Quel commentaires? <input type="radio" name="typecomment" value="Sans" /> Sans
   <input type="radio" name="typecomment" value="Pipotron" /> Pipotron
   <input type="radio" name="typecomment" value="Interjections" /> Interjections
   <input type="radio" name="typecomment" value="Liste" /> Liste
   <input type="radio" name="typecomment" checked="checked" value="Mixte" /> Mixte
   <br>
   Tu en veux combien? (12 par défaut - 999 Max) <input id="quantite" name="quantite" type=text value="12" size=3 maxlength=3 onKeyUp="javascript:filter_numeric(this);"> 
 <input type="submit" name="valider" value="OK"/>
</p>

</form>

<?php

if(isset($_POST['valider'])){
  $typecomment=$_POST['typecomment'];
  $quantite=$_POST['quantite'];
  echo 'Tu as choisi : '. $typecomment.', en voici : '.$quantite.'<br><br>';
  }

$iterations = $quantite;

function hasard($t) {
 $n=rand(0,count($t)-1);
 return $t[$n];
 }

function pipo($chaine) {
  $str = $chaine;
  $str = ""
  .hasard(array("Avec",
  "Considérant",
  "Où que nous mène",
  "Eu égard à",
  "Vu",
  "En ce qui concerne",
  "Dans le cas particulier de",
  "Quelle que soit",
  "En vertu de",
  "Du fait de",
  "Attendu",
  "Tant que durera"))
  ."  "
  .hasard(array("la situation",
  "la conjoncture",
  "la difficulté",
  "la crise",
  "l'exaspération",
  "l'impasse",
  "l'impatience",
  "l'extrémité",
  "la complication",
  "la baisse de confiance"))
  ." "
  .hasard(array("présente",
  "actuelle",
  "périodique",
  "récurrente",
  "cyclique",
  "qui nous occupe",
  "qui est la nôtre",
  "induite",
  "régulière",
  "courante",
  "présente",
  "de ces derniers temps"))
  ." "
  .hasard(array("il convient de",
  "il faut",
  "on se doit de",
  "il est préférable de",
  "il serait intéressant de",
  "il ne faut pas négliger de",
  "on ne peut se passer de",
  "il est nécessaire de",
  "il serait bon de",
  "il faut de toute urgence"))
  ." "
  .hasard(array("bien étudier",
  "soigneusement examiner",
  "ne pas négliger",
  "prendre en considération",
  "bien anticiper",
  "bien imaginer",
  "se préoccuper de",
  "s'intéresser à",
  "bien avoir à l'esprit",
  "se remémorer"))
  ." "
  .hasard(array("toutes les",
  "chacune des",
  "la majorité des",
  "toutes les",
  "l'ensemble des",
  "la somme des",
  "la totalité des",
  "la globalité des",
  "toutes les",
  "certaines"))
  ."  "
  .hasard(array("solutions",
  "issues",
  "problématiques",
  "voies",
  "alternatives",
  "améliorations",
  "solutions",
  "issues",
  "problématiques",
  "retouches",
  "corrections",
  "voies",
  "alternatives"))
  ."  "
  .hasard(array("",
  "possibles",
  "imaginables",
  "concevables",
  "de bon sens",
  "envisageables",
  "possibles",
  "s'offrant à change.org",
  "de bon sens"));
  return ($str);
  }

function str_to_noaccent($str)
{
    $url = $str;
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
     
    return ($url);
}

$fichier_prenom = file("liste-prenoms.txt");
$fichier_nom = file("liste-noms.txt");
$fichier_cp = file("liste-cp.txt");
$fichier_mail = file("liste-mail.txt");
$fichier_comments = file("liste-comments.txt");
$fichier_interjections = file("liste-interjections.txt");

$nb_prenom = count($fichier_prenom);
$nb_nom = count($fichier_nom);
$nb_cp = count($fichier_cp);
$nb_mail = count($fichier_mail);
//echo $mail . '<br>';
$nb_comments = count($fichier_comments);
$nb_interjections = count($fichier_interjections);

// initialise et prend un nombre aleatoire entre 0 et $i:
srand((double)microtime()*1000000);

if ($iterations) {
  echo "<table>";
  echo "<tbody>";
  echo '<td><b> Prénom </b></td><td><b> Nom </b></td><td><b> Email </b></td><td><b> CP </b></td><td><b> Commentaire </b></td>';
  }
for ($x = 1; $x <= $iterations; $x++) {
  echo "<tr>";
  $id_prenom = rand(1,$nb_prenom)-1;
  $id_nom = rand(1,$nb_nom)-1;
  $id_cp = rand(1,$nb_cp)-1;
  $id_mail = rand(1,$nb_mail)-1;
  $id_comments = rand(1,$nb_comments)-1;
  $id_interjections = rand(1,$nb_interjections)-1;

  $first_name = ucfirst(trim($fichier_prenom[$id_prenom]));
  $last_name = preg_replace("/[\s_]/", "-",trim($fichier_nom[$id_nom]));
  //echo $id_mail . ' ';
  //echo $fichier_mail[$id_mail] . ' ';
  $email = str_to_noaccent(strtolower($first_name.'.'.$last_name)).'@'.$fichier_mail[$id_mail];
  $postal_code = trim($fichier_cp[$id_cp]);

  if ($typecomment == 'Sans') $comments = ""; else
  if ($typecomment == 'Pipotron') $comments = pipo ($comments); else
  if ($typecomment == 'Interjections') $comments = ucfirst(strtolower(trim($fichier_interjections[$id_interjections]))); else
  if ($typecomment == 'Liste') $comments = ucfirst(strtolower(trim($fichier_comments[$id_comments]))); else
  if ($x % 2 != 0) $comments = ""; else
    if ($x % 3 != 0) $comments = pipo ($comments); else
       if ($x % 4 != 0) $comments = ucfirst(strtolower(trim($fichier_comments[$id_comments]))); else
	 $comments = ucfirst(strtolower(trim($fichier_interjections[$id_interjections]))); 

  //echo ''.ucfirst($fichier_prenom[$id_prenom]).'<BR>';
  //echo ''.$first_name.' '.$last_name.' '.$email.' '.$postal_code.' '.$comments.'<br>';
  echo '<td>'.$first_name.'</td><td>'.$last_name.'</td><td>'.$email.'</td><td>'.$postal_code.'</td><td>'.$comments.'</td>';
  echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";

if ($iterations) echo "
<br><br>
Ensuite, un petit script avec <a href='http://imacros.net/'>iMacros</a>
ou en PlugIn dans un navigateur... et le tour est joué...<br>
Sceptique? : rdv sur ma pétition, <a
href='https://www.change.org/p/la-presse-contre-l-utilisation-de-change-org'>contre
l'utilisation de change.org</a><br>
<br>
En 250 tentatives, j'y ai enregistré automatiquement jusqu'à 20
soutiens toujours visibles après 48H...
(<a href='https://pbs.twimg.com/media/Cdlo63pWAAEMj2m.jpg'>voir copie
d'écran</a>) et même si la majorité des
tentatives d'injection ont été supprimées par les vérifications de
change.org on est loin des 0,01% d'erreurs ou 100% de signatures
valides vantés par change.org.<br>
<br>
Suite à 2 tweets du 16 mars 2016, (<a
href='https://twitter.com/ochamberaud/status/709713779223826432'>t1</a>,
<a href='https://twitter.com/ochamberaud/status/709719134439870464'>t2</a>)
adressés, entres autres à&nbsp; <a
href='https://twitter.com/benjdesgachons'
class='twitter-atreply pretty-link js-nav' dir='ltr'
data-mentioned-user-id='87219352'><s>@</s>benjdesgachons</a>,
Directeur de <a href='https://twitter.com/ChangeFrance'
class='tweet-url twitter-atreply pretty-link' dir='ltr'
data-mentioned-user-id='0' rel='nofollow'><s>@</s>ChangeFrance</a>,
les 20 signatures ont été supprimées... En bloc... Dans le lot... il y
en avait au moins une valide, la mienne. <br>
<br>
La 'preuve' a donc disparu, mais j'ai pu en faire sur aussi sur <a
href='https://www.change.org/p/loi-travail-non-merci-myriamelkhomri-loitravailnonmerci'>'Loi
travail : non, merci !'</a>? Et là... Bonne chance pour les retrouver
parmis les signatures valides...<br>
<br>
Le code est à la disposition de qui le souhaite:<br>
&nbsp;- change.org pour améliorer ses robots ;-)<br>
&nbsp;- la presse pour justifier les doutes émis sur légitimité de
cette pétition, désormais la plus 'signée' en France.<br>
<br>
CQFD!<br>
<br>
Olivier.<br>
<br>
";

?>

</body></html>
