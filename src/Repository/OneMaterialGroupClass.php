<?php
declare(strict_types=1);
namespace App\Repository;

class OneMaterialGroupClass extends MaterialGroupAbstract {
    private $nazwa;

    function __construct(string $nazwa){
        $this->nazwa = $nazwa;
    }
    
    function getMaterialGroupInfo(string $MaterialGroupToGet)
    {
        if ($this->nazwa == $MaterialGroupToGet){
            return $this->nazwa;
        } else {
            return FALSE;
        }
    }
    function getMaterialGroupExist(string $getMaterialGroupExist):bool
    {
        if ($this->nazwa == $getMaterialGroupExist){
            return TRUE;
        } else {
            return FALSE;
        }      
    }
    function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName){
        if ($this->nazwa == $materialGroupName){
            $this->nazwa = $newMaterialGroupName;
            return $newMaterialGroupName;
        } else {
            return FALSE;
        }      
    }
    function getMaterialsGroupCount():bool
    {
        return 1;
    }
    function setMaterialsGroupCount($newCount):bool
    {
        return FALSE;
    }
    function addMaterialGroup($oneMaterialGroup):bool
    {
        return FALSE;
    }
    function removeMaterialGroup($oneMaterialGroup):bool
    {
        return FALSE;
    }
}