<?php
declare(strict_types=1);
namespace App\Repository;

class MaterialGroupsClassSeveral extends MaterialGroupAbstract {
    private string $group_nazwa;
    private array $MaterialsGroupObj = array();
    private int $MaterialsGroupCount;

    public function __construct(string $group_nazwa)
    {
        $this->setNazwa($group_nazwa);
        $this->setMaterialsGroupCount(-1);
    }

    public function setNazwa(string $group_nazwa):void
    {
        $this->group_nazwa = $group_nazwa;
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
        if (empty($obj)) return FALSE;
        if (is_array($obj))$obj = (object)$obj;
        return $obj;
    }

    public function getMaterialGroupExist(string $MaterialGroupToGet):bool
    {
        $obj = $this->treeGet($this->MaterialsGroupObj, $MaterialGroupToGet);
        if (!empty($obj) && is_object($obj)){
            return TRUE;
        } else {
            return FALSE;
        }
    }
  
    public function addMaterialGroup(MaterialGroupInterface $oneMaterialGroup):int
    {
        $this->setMaterialsGroupCount($this->getMaterialsGroupCount() + 1);
        $this->MaterialsGroupObj[$this->group_nazwa][$this->getMaterialsGroupCount()] = $oneMaterialGroup;
        return $this->getMaterialsGroupCount();
    }

    public function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName):bool{
        if ($this->group_nazwa == $materialGroupName){
            $this->setNazwa($newMaterialGroupName);
            return TRUE;
        } else {
            return FALSE;
        }      
    }

    public function removeMaterialGroup(string $materialGroupName):bool
    {   
        return FALSE;
    }
}