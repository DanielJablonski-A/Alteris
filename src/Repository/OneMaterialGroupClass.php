<?php
declare(strict_types=1);
namespace App\Repository;

class OneMaterialGroupClass extends MaterialGroupInterface {
    private $nazwa;

    function __construct($nazwa) {
        $this->nazwa = $nazwa;
    }
    
    function getMaterialGroupInfo($MaterialGroupToGet) {
        if ($this->nazwa == $MaterialGroupToGet){
            return $this->nazwa;
        } else {
            return FALSE;
        }
    }
    function getMaterialGroupExist($getMaterialGroupExist){
        if ($this->nazwa == $getMaterialGroupExist){
            return TRUE;
        } else {
            return FALSE;
        }      
    }
    function editMaterialGroup($materialGroupName, $newMaterialGroupName){
        if ($this->nazwa == $materialGroupName){
            $this->nazwa = $newMaterialGroupName;
            return $newMaterialGroupName;
        } else {
            return FALSE;
        }      
    }
    function getMaterialsGroupCount() {
        return 1;
    }
    function setMaterialsGroupCount($newCount) {
        return FALSE;
    }
    function addMaterialGroup($oneMaterialGroup) {
        return FALSE;
    }
    function removeMaterialGroup($oneMaterialGroup) {
        return FALSE;
    }
}