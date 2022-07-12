<?php
declare(strict_types=1);
namespace App\Controller;

class MaterialEdit {
    
    function __construct($materialObj, $materialGroupsObj, $unitsObj){
        $this->materialObj = $materialObj; 
        $this->materialGroupsObj = $materialGroupsObj;
        $this->unitsObj = $unitsObj;
    }

    function editMaterial(string $materialName, string $materialGroup, string $materialUnit)
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
}