<?php
declare(strict_types=1);
namespace App\Repository;

abstract class UnitAbstract {
    abstract function getUnitInfo(string $unitName);
    abstract function getUnitExist(string $unitShotcut);
    abstract function getUnitCount();
    abstract function addUnit(string $newUnitName,string $newUnitShotcut);
    abstract function editUnit(string $unitName, string $newUnitName, string $newUnitShotcut);
    abstract function removeUnit(string $newUnit);

    function get_obj_key_by_name(array $array, string $unitName){
        if (empty($unitName)) return FALSE;
        if (empty($array)) return FALSE;
        return array_search($unitName, array_column(json_decode(json_encode($array),TRUE), 'nazwa'));
    }

    function get_obj_key_by_shortcut(array $array, string $unitName){
      if (empty($unitName)) return FALSE;
      if (empty($array)) return FALSE;
      return array_search($unitName, array_column(json_decode(json_encode($array),TRUE), 'skrot'));
  }
}

class UnitClass extends UnitAbstract {
    private $UnitsObjArr = array();

    function __construct() {}

    function getUnitInfo(string $unitName){
        // może istnieć tylko jedna miara o nazwie
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (!is_int($key)) $key = $this->get_obj_key_by_shortcut($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            return $this->UnitsObjArr[$key];
        } else {
            return FALSE;
        }
    }

    function getUnitExist(string $unitName):bool{
      $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
      if (!is_int($key)) $key = $this->get_obj_key_by_shortcut($this->UnitsObjArr, $unitName);
      if (is_int($key)){
          return TRUE;
      } else {
          return FALSE;
      }
  }

    function getUnitCount():int
    {
      return count((array)$this->UnitsObjArr);
    }

    function addUnit(string $newUnit, string $newUnitShortcut):bool
    {
        if (empty($newUnitShortcut)) return FALSE;
        if ($this->getUnitInfo($newUnit)) return FALSE;
        $this->UnitsObjArr[] =  (object)array('nazwa' => $newUnit, 'skrot' => $newUnitShortcut);
        return TRUE;
    }
    function editUnit(string $unitName, string $newUnitName = '', string $newUnitShotcut = '')
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
    function removeUnit(string $unitName):bool
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

