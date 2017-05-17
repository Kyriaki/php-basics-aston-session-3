<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam soluta neque omnis similique possimus rerum molestiae, at illum, tempora nisi voluptate minima dolorum obcaecati, eveniet nihil saepe iusto natus magni!</p>

<?php
// variables simples (primitives)
$msg = "ma grosse bite en platre"; //string
$y = 2016; //integer
$active = true; //boolean
$price = 450.20; //double
$config = null; //null

echo gettype($msg);
echo gettype($y);
echo gettype($active);
echo gettype($price);
echo gettype($config);

// variables complexes 
$colors = [$msg, $y, 18];

// tableau associatif
$client = array(
	'id' => 18,
	'firstname' => 'Blaise',
	'name' => 'Pascal',
	'categories' => ['philosophy', 'science', 'history']
	);

echo gettype($colors);

print_r($colors);

echo 'Le client ' . $client["firstname"] . ' ' . $client["name"] . ' est mort en ' . $colors[1];

// constantes
define('AUTHOR', 'Fabien Potencier');
define('APP_VERSION', 1.1);

echo "<p>VERSION ACTUELLE ". APP_VERSION . "</p>";

echo $client['categories'][2]. "<br/>";
$client['categories'][2] = 'geography';
echo $client['categories'][2]. "<br/>";
// opérateurs
$operation = (4*5) % 2;
echo $operation. '<br/>';

$text = "Il a pas dit bonjour ";
$text .= "du coup il s'est fait niquer sa mere";
echo $text . '<br/>';

$operation2 = 14;
$operation2 *= 16;
echo $operation2;

echo ++$operation2;

// opérateurs logiques
if ($active) echo'<p>Le client est actif</p>';

$active = false;
if ($active) {
	echo'<p>Le client est actif</p>';
} else {
	echo'<p>Le client est inactif</p>';
}

// opérateur ternaire
echo($active === true) ? '<p> Actif </p>' : '<p> inactif </p>';

// structures de controle
// boucle
// for
for ($i=0; $i < 10; $i++) { 
	echo "<p> Passage n° $i </p>";	
}

//while
$j = 0;
while ($j < 10) {
	echo "<p> Pouet n° $j </p>";
	$j++;
}

//foreach
$fruits = array('Fraise', 'Pomme', 'Poire');
foreach ($fruits as $fruit) {
	echo "$fruit";
}

$legumes = array('item1'=>'chou', 'item2'=>'navet', 'item3'=>'salsifi');
foreach ($legumes as $item => $legume) {
	echo "<p><strong>$item</strong> : $legume</p>";
}

//structures conditionnelles (if, switch)
$password = 1234;
switch ($password){
	case 0000:
		echo "ESPECE DE PD C'EST PAS LE BON PASS NTM PTN JVAIS TE VIOLER";
		break;
	case 9999:
		echo "TOUJOURS PAS LE BON PASS ESPECE DE SOUS RACE";
		break;
	case 1234:
		echo "GG MEK TA TROUVE ME TE KAN MM NUL LOL";
		break;
	default:
		echo "JE SUIS PER DUUUUUUUUUUUUUUUUUUUUU";
}

//Fonctions

function add($a, $b)
{
	return $a + $b;
}

echo add(15, 15);


?>