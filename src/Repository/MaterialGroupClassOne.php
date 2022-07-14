<?php
declare(strict_types=1);
namespace App\Repository;

class MaterialGroupClassOne extends MaterialGroupAbstract {
    private $nazwa;

    function __construct(string $nazwa){
        $this->setNazwa($nazwa);
    }

    public function setNazwa(string $nazwa):void
    {
        $this->nazwa = $nazwa;
    }
    
    public function getMaterialGroupInfo(string $MaterialGroupToGet)
    {
        if ($this->nazwa == $MaterialGroupToGet){
            return $this->nazwa;
        } else {
            return FALSE;
        }
    }
    public function getMaterialGroupExist(string $getMaterialGroupExist):bool
    {
        if ($this->nazwa == $getMaterialGroupExist){
            return TRUE;
        } else {
            return FALSE;
        }      
    }
    public function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName):bool{
        if ($this->nazwa == $materialGroupName){
            $this->setNazwa($newMaterialGroupName);
            return TRUE;
        } else {
            return FALSE;
        }      
    }
    public function getMaterialsGroupCount():int
    {
        return 1;
    }
    public function setMaterialsGroupCount($newCount):void
    {
    }
    public function addMaterialGroup($oneMaterialGroup):int
    {
        return FALSE;
    }
    public function removeMaterialGroup($oneMaterialGroup):bool
    {
        return FALSE;
    }
}