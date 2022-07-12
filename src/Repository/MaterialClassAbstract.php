<?php
declare(strict_types=1);
namespace App\Repository;

interface MaterialInterface{
    public function addMaterial(string $materialName, string $materialCode, OneMaterialGroupClass $groupObj, object $unitObj);
    public function editMaterial(string $materialName, OneMaterialGroupClass $groupObj, object $unitObj);
    public function removeMaterial(string $materialName);
}

abstract class MaterialClassAbstract implements MaterialInterface {
    abstract protected function getMaterialInfo(string $materialName);
    abstract protected function getMaterialCount();

    function get_obj_key_by_name(array $array, string $materialName){
        if (empty($array)) return FALSE;
        return array_search($materialName, array_column(json_decode(json_encode($array),TRUE), 'nazwa'));
    }
}