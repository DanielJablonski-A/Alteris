<?php
declare(strict_types=1);
namespace App\Repository;

class MaterialGroupsClassSeveral extends MaterialGroupAbstract {
    private string $group_nazwa;
    private array $MaterialsGroupObj = array();
    private int $MaterialsGroupCount;

    public function __construct(string $group_nazwa)
    {
        $this->group_nazwa = $group_nazwa;
        $this->setMaterialsGroupCount(-1);
    }
    
    public function getMaterialsGroupCount():int
    {
        return $this->MaterialsGroupCount;
    }
    public function setMaterialsGroupCount(int $newCount):void
    {
        $this->MaterialsGroupCount = $newCount;
    }
  
    public function getMaterialGroupInfo(string $MaterialGroupToGet) 
    {
        $obj = $this->treeGet($this->MaterialsGroupObj, $MaterialGroupToGet);
        if (!empty($obj) && !empty($obj) && is_object($obj)){
            return $obj;
        } else {
            return FALSE;
      }
    }

    public function getMaterialGroupExist(string $MaterialGroupToGet):bool
    {
        $obj = $this->treeGet($this->MaterialsGroupObj, $MaterialGroupToGet);
        if (!empty($obj) && !empty($obj) && is_object($obj)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
  
    public function getAllMaterialGroup()
    { 
        if ($this->getMaterialsGroupCount() < 1) return FALSE;
          print_r ($this->MaterialsGroupObj);
    }
  
    public function addMaterialGroup(MaterialGroupInterface $oneMaterialGroup):int
    {
        $this->setMaterialsGroupCount($this->getMaterialsGroupCount() + 1);
        $this->MaterialsGroupObj[$this->group_nazwa][$this->getMaterialsGroupCount()] = $oneMaterialGroup;
        return $this->getMaterialsGroupCount();
    }

    public function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName){
        $this->group_nazwa = $newMaterialGroupName;
        if (isset($this->MaterialsGroupObj[$materialGroupName]) && !empty($this->MaterialsGroupObj[$materialGroupName])){
            $this->MaterialsGroupObj[$newMaterialGroupName] = $this->MaterialsGroupObj[$materialGroupName];
            unset($this->MaterialsGroupObj[$materialGroupName]);
        }
        return TRUE;     
    }

    public function removeMaterialGroup(string $materialGroupName):bool
    {   
        return FALSE;
    }
}