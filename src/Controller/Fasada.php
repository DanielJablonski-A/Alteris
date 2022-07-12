<?php
declare(strict_types=1);
namespace App\Controller;

use App\Repository\MaterialClass;
use App\Repository\UnitClass;
use App\Repository\MaterialGroupInterface;
use App\Repository\OneMaterialGroupClass;
use App\Repository\SeveralMaterialGroupsClass;
use \stdClass;
use \UnexpectedValueException;

class Fasada
{
    protected object $materialObj;
    protected object $OneMaterialGroupClass;
    protected object $SeveralMaterialGroupsClass;
    protected object $unitsObj;

    function __construct()
    {
        $this->materialObj = new MaterialClass(); 
        $this->materialGroupsObj = new stdClass();
        $this->unitsObj = new UnitClass();
    }

    public function addTreeObj($treeObj):void
    {
        $this->materialGroupsObj = $treeObj;
    }

    public function addMaterial(string $newMaterialName, string $newMaterialCode, string $materialGroup, string $materialUnit):bool
    {
        $returnsArr[] = $this->unitsObj->getUnitExist($materialUnit);
        $unitObj = $this->unitsObj->getUnitInfo($materialUnit);
        $returnsArr[] = $this->materialGroupsObj->getMaterialGroupExist($materialGroup);
        $groupObj = $this->materialGroupsObj->getMaterialGroupInfo($materialGroup);
        $returnsArr[] = $this->materialObj->addMaterial($newMaterialName, $newMaterialCode, $groupObj, $unitObj);
        if (in_array(FALSE, $returnsArr, TRUE))
        {
            // ROLLBACK
            throw new UnexpectedValueException('Materiał: '.$newMaterialName. ', nie został zapisany.');
        }
        return TRUE;
    }

    public function editMaterial(string $materialName, string $materialGroup, string $materialUnit):bool
    {
        $returnsArr[] = $this->unitsObj->getUnitExist($materialUnit);
        $unitObj = $this->unitsObj->getUnitInfo($materialUnit);
        $returnsArr[] = $this->materialGroupsObj->getMaterialGroupExist($materialGroup);
        $groupObj = $this->materialGroupsObj->getMaterialGroupInfo($materialGroup);
        $returnsArr[] = $this->materialObj->editMaterial($materialName, $groupObj, $unitObj);
        if (in_array(FALSE, $returnsArr, TRUE))
        {
        // ROLLBACK
        throw new UnexpectedValueException('Materiał: '.$materialName. ', nie został zaktualizowany.');
        }
        return TRUE;
    }

    public function removeMaterial(string $MaterialName):void
    {
        $this->materialObj->removeMaterial($MaterialName);
    }

    public function removeMaterialGroup(string $materialGroupName):void
    {
        $this->materialGroupsObj->removeMaterialGroup($materialGroupName);
    }

    public function addUnit(string $newUnit, string $newUnitShotcut):void
    {
        $this->unitsObj->addUnit($newUnit, $newUnitShotcut);
    }

    public function editUnit(string $unitName, string $newUnitName, string $newUnitShotcut):void
    {
        $this->unitsObj->editUnit($unitName, $newUnitName, $newUnitShotcut);
    }


}
