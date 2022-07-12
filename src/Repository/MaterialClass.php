<?php
declare(strict_types=1);
namespace App\Repository;

abstract class MaterialAbstract {
    abstract function getMaterialInfo(string $materialName);
    abstract function getMaterialCount();
    abstract function addMaterial(string $materialName, string $materialCode, OneMaterialGroupClass $groupObj, object $unitObj);
    abstract function editMaterial(string $materialName, OneMaterialGroupClass $groupObj, object $unitObj);
    abstract function removeMaterial(string $materialName);

    function get_obj_key_by_name(array $array, string $materialName){
        if (empty($array)) return FALSE;
        return array_search($materialName, array_column(json_decode(json_encode($array),TRUE), 'nazwa'));
    }
}

class MaterialClass extends MaterialAbstract {
    private array $MaterialsObjArr = array();

    function __construct() {}

    function getMaterialInfo($materialName)
    {
        // może istnieć tylko jeden materiał o nazwie
        $key = $this->get_obj_key_by_name($this->MaterialsObjArr, $materialName);
        if (is_int($key)){
            return $this->MaterialsObjArr[$key];
        } else {
            return FALSE;
        }
    }
    function getMaterialCount():int
    {
      return count((array)$this->MaterialsObjArr);;
    }

    function addMaterial(string $newMaterial, string $newMaterialCode, OneMaterialGroupClass $groupObj, object $unitObj):bool
    {
        if (empty($newMaterial)) return FALSE;
        if (empty($newMaterialCode)) return FALSE;
        if ($this->getMaterialInfo($newMaterial)) return FALSE;
        $this->MaterialsObjArr[] = (object)array('nazwa' => $newMaterial, 
                                                 'kod' => $newMaterialCode,
                                                 'materialGroupObj' => $groupObj,
                                                 'unitObj' => $unitObj
                                                );
        return TRUE;
    }

    function editMaterial(string $materialName, OneMaterialGroupClass $groupObj, object $unitObj):bool
    {
        if (empty($materialName)) return FALSE;
        $materialObj = $this->getMaterialInfo($materialName);
        if (!$materialObj) return FALSE;
        if (!$this->removeMaterial($materialName)) return FALSE;
        $this->MaterialsObjArr[] = (object)array('nazwa' => $materialName, 
                                                 'kod' => $materialObj->kod,
                                                 'materialGroupObj' => $groupObj,
                                                 'unitObj' => $unitObj
                                                );
        return TRUE;
    }

    function removeMaterial(string $materialName):bool
    {
        $key = $this->get_obj_key_by_name($this->MaterialsObjArr, $materialName);
        if (is_int($key)){
            unset($this->MaterialsObjArr[$key]);
            return TRUE;
        } else {
            return FALSE;
        }        
    }
}