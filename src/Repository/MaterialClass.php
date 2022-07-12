<?php
declare(strict_types=1);
namespace App\Repository;

abstract class MaterialAbstract {
    abstract function getMaterialInfo(string $materialName);
    abstract function getMaterialCount();
    abstract function addMaterial(string $materialName, string $materialCode, object $groupObj, UnitAbstract $unitObj);
    abstract function editMaterial(string $materialName, MaterialGroupInterface $groupObj, UnitAbstract $unitObj);
    abstract function removeMaterial(string $materialName);

    function get_obj_key_by_name($obj, $materialName){
        if (empty($obj)) return FALSE;
        return array_search($materialName, array_column(json_decode(json_encode($obj),TRUE), 'nazwa'));
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
            return $materialName;
        } else {
            return FALSE;
        }
    }
    function getMaterialCount():int
    {
      return count((array)$this->MaterialsObjArr);;
    }

    function addMaterial($newMaterial, $newMaterialCode, $groupObj, $unitObj) {
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

    function editMaterial($materialName, $groupObj, $unitObj):bool
    {
        if (empty($materialName)) return FALSE;
        if (!$this->getMaterialInfo($materialName)) return FALSE;
        if (!$this->removeMaterial($materialName)) return FALSE;
        $this->MaterialsObjArr[] = (object)array('nazwa' => $materialName, 
                                                 'materialGroupObj' => $groupObj,
                                                 'unitObj' => $unitObj
                                                );
        return TRUE;
    }

    function removeMaterial($materialName):bool
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