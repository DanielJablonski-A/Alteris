<?php
declare(strict_types=1);
namespace App\Controller;

use App\Repository\MaterialClass;
use App\Repository\UnitClass;

use \stdClass;
use \UnexpectedValueException;

class Fasada
{
    protected object $materialObj;
    protected object $materialGroupsObj;
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
        return (new MaterialFactory($this->materialObj, $this->materialGroupsObj, $this->unitsObj))
            ->create('addMaterial')
            ->addMaterial($newMaterialName, $newMaterialCode, $materialGroup, $materialUnit);
    }

    public function editMaterial(string $materialName, string $materialGroup, string $materialUnit):bool
    {
        return (new MaterialFactory($this->materialObj, $this->materialGroupsObj, $this->unitsObj))
            ->create('editMaterial')
            ->editMaterial($materialName, $materialGroup, $materialUnit);
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
