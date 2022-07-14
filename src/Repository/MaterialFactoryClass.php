<?php
declare(strict_types=1);
namespace App\Repository;

class MaterialFactoryClass implements MaterialFactoryInterface {

    function __construct(MaterialClassInterface $materialObj, MaterialGroupInterface $materialGroupsObj, UnitClassInterface $unitsObj){
        $this->materialObj = $materialObj; 
        $this->materialGroupsObj = $materialGroupsObj;
        $this->unitsObj = $unitsObj;
    }

    public function editMaterial(string $materialName, string $materialGroup, string $materialUnit):bool
    {
        if (!$this->unitsObj->getUnitExist($materialUnit)) return FALSE;
        if (!$this->materialGroupsObj->getMaterialGroupExist($materialGroup)) return FALSE;
        $unitObj = $this->unitsObj->getUnitInfo($materialUnit);
        $groupObj = $this->materialGroupsObj->getMaterialGroupInfo($materialGroup);
        if (!$this->materialObj->editMaterial($materialName, $groupObj, $unitObj))
        {
        // ROLLBACK
        throw new UnexpectedValueException('Materiał: '.$materialName. ', nie został zaktualizowany.');
        }
        return TRUE;
    }

    public function addMaterial(string $newMaterialName, string $newMaterialCode, string $materialGroup, string $materialUnit):bool
    {
        if (!$this->unitsObj->getUnitExist($materialUnit)) return FALSE;
        if (!$this->materialGroupsObj->getMaterialGroupExist($materialGroup)) return FALSE;
        $unitObj = $this->unitsObj->getUnitInfo($materialUnit);
        $groupObj = $this->materialGroupsObj->getMaterialGroupInfo($materialGroup);
        if (!$this->materialObj->addMaterial($newMaterialName, $newMaterialCode, $groupObj, $unitObj))
        {
            // ROLLBACK
            throw new UnexpectedValueException('Materiał: '.$newMaterialName. ', nie został zapisany.');
        }
        return TRUE;
    }

}