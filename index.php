<?php
declare(strict_types=1);
header ("Content-type: text/plain");
require 'vendor/autoload.php';

use App\Controller\Fasada;
use App\Repository\MaterialClass;
use App\Repository\UnitClass;
use App\Repository\MaterialGroupClassOne;
use App\Repository\MaterialGroupsClassSeveral;

$dm = new Fasada();

// dodaje,edytuje miary
$dm->addUnit('milimetry', 'mm');
$dm->addUnit('centymetry', 'cm');
$dm->addUnit('metry2', 'm10');
$dm->editUnit('metry2', 'metry', 'm');



// tworze sobie dowolnie grupy i podgrupy Materiałów:
// można się bawić dowolnie, najażniejsze by przekazać do objektu $dm finalne drzewo
$leaf1 = new MaterialGroupClassOne('roślinne_zle');
$leaf1->editMaterialGroup('roślinne_zle', 'roślinne'); // edytuje leaf
$leaf1->getMaterialGroupExist('roślinne');
$leaf2 = new MaterialGroupClassOne('zwierzęce');
$branch1 = new MaterialGroupsClassSeveral('naturalne_zle'); 
$branch1->editMaterialGroup('naturalne_zle', 'naturalne'); // edytuje gałąź
$branch1->addMaterialGroup($leaf1);
$branch1->addMaterialGroup($leaf2);
$leaf1 = new MaterialGroupClassOne('sztuczne');
$leaf2 = new MaterialGroupClassOne('syntetyczne');
$leaf3 = new MaterialGroupClassOne('nieorganiczne');
$branch2 = new MaterialGroupsClassSeveral('chemiczne');
$branch2->addMaterialGroup($leaf1);
$branch2->addMaterialGroup($leaf2);
$branch2->addMaterialGroup($leaf3);
$tree = new MaterialGroupsClassSeveral('włókna');
$tree->addMaterialGroup($branch1);
$tree->addMaterialGroup($branch2);
//print_r($tree->getMaterialGroupInfo('chemiczne')); //pkt.8 odkomentować
$dm->addTreeObj($tree);


// dodaje, usuwam materiał
$dm->addMaterial('bawełna', 'kod', 'zwierzęce', 'm');
//$dm->addMaterial('bawełna', 'kod2', 'roślinne', 'cm'); // błąd może być tylko jedna bawełna
$dm->addMaterial('len', 'kod3', 'roślinne', 'mm');
$dm->editMaterial('len', 'roślinne', 'm'); // zmiana danych
$dm->addMaterial('wełna', 'kod4', 'zwierzęce', 'm');
$dm->addMaterial('jedwab', 'kod5', 'zwierzęce', 'm');
//$dm->addMaterial('tkanina wiskozowa', 'kod6', 'sztuczne', 'mmmm'); // błąd nie prawidłowa wartość miary
$dm->addMaterial('stylon', 'kod7', 'syntetyczne', 'm');
$dm->addMaterial('elana', 'kod8', 'syntetyczne', 'm');
$dm->addMaterial('włókno szklane', 'kod9', 'nieorganiczne', 'm');
$dm->addMaterial('włókno azbestowe', 'kod10', 'nieorganiczne', 'mm');
$dm->addMaterial('włókno węglowe', 'kod11', 'nieorganiczne', 'm');
$dm->removeMaterial('bawełna'); // usuwanie

print_r ($dm);