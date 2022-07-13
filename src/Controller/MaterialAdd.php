<?php
declare(strict_types=1);
namespace App\Controller;
use App\Repository\MaterialClass;
use App\Repository\SeveralMaterialGroupsClass;
use App\Repository\UnitClass;

class MaterialAdd implements MaterialAddInterface {

    function __construct(MaterialClass $materialObj, SeveralMaterialGroupsClass $materialGroupsObj, UnitClass $unitsObj){
        $this->materialObj = $materialObj; 
        $this->materialGroupsObj = $materialGroupsObj;
        $this->unitsObj = $unitsObj;
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

}