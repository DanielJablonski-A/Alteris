<?php
declare(strict_types=1);
namespace App\Repository;

interface MaterialClassInterface{
    public function addMaterial(string $materialName, string $materialCode, MaterialGroupAbstract $groupObj, object $unitObj):bool;
    public function editMaterial(string $materialName, MaterialGroupAbstract $groupObj, object $unitObj):bool;
    public function removeMaterial(string $materialName):bool;
}