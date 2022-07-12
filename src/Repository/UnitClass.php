<?php
declare(strict_types=1);
namespace App\Repository;

use App\Repository\UnitClassAbstract;

class UnitClass extends UnitClassAbstract {
    private $UnitsObjArr = array();

    function __construct() {}

    public function getUnitInfo(string $unitName){
        // może istnieć tylko jedna miara o nazwie
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (!is_int($key)) $key = $this->get_obj_key_by_shortcut($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            return $this->UnitsObjArr[$key];
        } else {
            return FALSE;
        }
    }

    public function getUnitExist(string $unitName):bool{
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (!is_int($key)) $key = $this->get_obj_key_by_shortcut($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getUnitCount():int
    {
      return count((array)$this->UnitsObjArr);
    }

    public function addUnit(string $newUnit, string $newUnitShortcut):bool
    {
        if (empty($newUnitShortcut)) return FALSE;
        if ($this->getUnitInfo($newUnit)) return FALSE;
        $this->UnitsObjArr[] =  (object)array('nazwa' => $newUnit, 'skrot' => $newUnitShortcut);
        return TRUE;
    }
    public function editUnit(string $unitName, string $newUnitName = '', string $newUnitShotcut = '')
    {
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            $arr = (array)$this->UnitsObjArr[$key];
            if (!empty($newUnitName)) $arr['nazwa'] = $newUnitName;
            if (!empty($newUnitShotcut)) $arr['skrot'] = $newUnitShotcut;
            $this->UnitsObjArr[$key] =  (object)$arr;
        } else {
            return FALSE;
        }        
    }
    public function removeUnit(string $unitName):bool
    {
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            unset($this->UnitsObjArr[$key]);
            return TRUE;
        } else {
            return FALSE;
        }        
    }
}

