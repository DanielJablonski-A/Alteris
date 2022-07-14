<?php
declare(strict_types=1);
namespace App\Repository;

use App\Repository\MaterialClassAbstract;

class MaterialClass extends MaterialClassAbstract {
    private array $MaterialsObjArr = array();

    function __construct() {}

    public function getMaterialInfo($materialName)
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
      return count((array)$this->MaterialsObjArr);
    }

    public function addMaterial(string $newMaterial, string $newMaterialCode, MaterialGroupInterface $groupObj, object $unitObj):bool
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

    public function editMaterial(string $materialName, MaterialGroupInterface $groupObj, object $unitObj):bool
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

    public function removeMaterial(string $materialName):bool
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