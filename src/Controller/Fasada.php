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
    protected $materialObj;
    protected $OneMaterialGroupClass;
    protected $SeveralMaterialGroupsClass;
    protected $unitsObj;

    function __construct()
    {
        $this->materialObj = new MaterialClass(); 
        $this->materialGroupsObj = new stdClass();
        $this->unitsObj = new UnitClass();
    }

    public function addTreeObj($treeObj){
        $this->materialGroupsObj = $treeObj;
    }

    public function addMaterial($newMaterialName, $newMaterialCode, $materialGroup, $materialUnit)
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
    }

    public function editMaterial($materialName, $materialGroup, $materialUnit)
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
    }

    public function removeMaterial($MaterialName)
    {
        $this->materialObj->removeMaterial($MaterialName);
    }

    public function removeMaterialGroup($materialGroupName){
        $this->materialGroupsObj->removeMaterialGroup($materialGroupName);
    }

    public function addUnit($newUnit, $newUnitShotcut)
    {
        $this->unitsObj->addUnit($newUnit, $newUnitShotcut);
    }

    public function editUnit($unitName, $newUnitName, $newUnitShotcut)
    {
        $this->unitsObj->editUnit($unitName, $newUnitName, $newUnitShotcut);
    }


}
