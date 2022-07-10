<?php
declare(strict_types=1);
namespace App\Repository;

class SeveralMaterialGroupsClass extends MaterialGroupInterface {
    private $group_nazwa;
    private $MaterialsGroupObj = array();
    private $MaterialsGroupCount;
    public function __construct($group_nazwa) {
        $this->group_nazwa = $group_nazwa;
        $this->setMaterialsGroupCount(-1);
    }
    
    public function getMaterialsGroupCount() {
        return $this->MaterialsGroupCount;
    }
    public function setMaterialsGroupCount($newCount) {
        $this->MaterialsGroupCount = $newCount;
    }
  
    public function getMaterialGroupInfo($MaterialGroupToGet) {
        $obj = $this->treeGet($this->MaterialsGroupObj, $MaterialGroupToGet);
        if (!empty($obj) && !empty($obj) && is_object($obj)){
            return $obj;
        } else {
            return FALSE;
      }
    }

    function getMaterialGroupExist($MaterialGroupToGet){
        $obj = $this->treeGet($this->MaterialsGroupObj, $MaterialGroupToGet);
        if (!empty($obj) && !empty($obj) && is_object($obj)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
  
    public function getAllMaterialGroup() { 
        if ($this->getMaterialsGroupCount() < 1) return FALSE;
          print_r ($this->MaterialsGroupObj);
    }
  
    public function addMaterialGroup($oneMaterialGroup) {
        $this->setMaterialsGroupCount($this->getMaterialsGroupCount() + 1);
        $this->MaterialsGroupObj[$this->group_nazwa][$this->getMaterialsGroupCount()] = $oneMaterialGroup;
        return $this->getMaterialsGroupCount();
    }

    public function editMaterialGroup($materialGroupName, $newMaterialGroupName){
        $this->group_nazwa = $newMaterialGroupName;
        if (isset($this->MaterialsGroupObj[$materialGroupName]) && !empty($this->MaterialsGroupObj[$materialGroupName])){
            $this->MaterialsGroupObj[$newMaterialGroupName] = $this->MaterialsGroupObj[$materialGroupName];
            unset($this->MaterialsGroupObj[$materialGroupName]);
        }
        return TRUE;     
    }

    public function removeMaterialGroup($materialGroupName) {   
        return FALSE;
    }
}