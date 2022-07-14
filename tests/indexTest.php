<?php
declare(strict_types=1);
namespace App\tests;

use App\Controller\Fasada;
use App\Repository\MaterialClass;

use App\Repository\UnitClass;
use App\Repository\MaterialGroupInterface;
use App\Repository\MaterialGroupClassOne;
use App\Repository\MaterialGroupsClassSeveral;
use PHPUnit\Framework\TestCase;

final class indexTest extends TestCase {
    public function testcanCreate(){
        // testuje Miary
        $dm = new Fasada();
        self::assertTrue($dm->addUnit('milimetry2', 'mm'));
        self::assertTrue($dm->addUnit('metry', 'm'));
        self::assertTrue($dm->editUnit('milimetry2', 'milimetry', 'mm'));
        
        // testuje Drzewo
        $leaf1 = new MaterialGroupClassOne('roślinne_zle');
        self::assertSame($leaf1->getMaterialGroupInfo('roślinne_zle'), 'roślinne_zle');
        self::assertTrue($leaf1->editMaterialGroup('roślinne_zle', 'roślinne'));
        $branch1 = new MaterialGroupsClassSeveral('naturalne_zle'); 
        self::assertInstanceOf(MaterialGroupInterface::class, $branch1);
        self::assertTrue($branch1->editMaterialGroup('naturalne_zle', 'naturalne'));
        self::assertEquals(0, $branch1->addMaterialGroup($leaf1));
        self::assertEquals(1, $branch1->addMaterialGroup($leaf1));
        $dm->addTreeObj($branch1);

        // testuje Materiał
        self::assertTrue($dm->addMaterial('bawełna', 'kod', 'roślinne', 'mm'));
        self::assertTrue($dm->editMaterial('bawełna', 'roślinne', 'm'));
        self::assertTrue($dm->removeMaterial('bawełna'));
    }
}