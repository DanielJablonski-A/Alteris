<?php
declare(strict_types=1);
namespace App\Repository;

abstract class UnitClassAbstract implements UnitClassInterface {
    abstract function getUnitInfo(string $unitName);
    abstract function getUnitExist(string $unitShotcut);
    abstract function getUnitCount();

    protected function get_obj_key_by_name(array $array, string $unitName){
        if (empty($unitName)) return FALSE;
        if (empty($array)) return FALSE;
        return array_search($unitName, array_column(json_decode(json_encode($array),TRUE), 'nazwa'));
    }

    protected function get_obj_key_by_shortcut(array $array, string $unitName){
      if (empty($unitName)) return FALSE;
      if (empty($array)) return FALSE;
      return array_search($unitName, array_column(json_decode(json_encode($array),TRUE), 'skrot'));
  }
}