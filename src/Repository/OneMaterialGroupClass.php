<?php
declare(strict_types=1);
namespace App\Repository;

class OneMaterialGroupClass extends MaterialGroupAbstract {
    private $nazwa;

    function __construct(string $nazwa){
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
    public function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName){
        if ($this->nazwa == $materialGroupName){
            $this->nazwa = $newMaterialGroupName;
            return $newMaterialGroupName;
        } else {
            return FALSE;
        }      
    }
    public function getMaterialsGroupCount():bool
    {
        return 1;
    }
    public function setMaterialsGroupCount($newCount):bool
    {
        return FALSE;
    }
    public function addMaterialGroup($oneMaterialGroup):bool
    {
        return FALSE;
    }
    public function removeMaterialGroup($oneMaterialGroup):bool
    {
        return FALSE;
    }
}