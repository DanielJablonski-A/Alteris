<?php
declare(strict_types=1);
namespace App\Repository;

abstract class MaterialClassAbstract implements MaterialClassInterface {
    abstract protected function getMaterialInfo(string $materialName);
    abstract protected function getMaterialCount();

    function get_obj_key_by_name(array $array, string $materialName){
        if (empty($array)) return FALSE;
        return array_search($materialName, array_column(json_decode(json_encode($array),TRUE), 'nazwa'));
    }
}