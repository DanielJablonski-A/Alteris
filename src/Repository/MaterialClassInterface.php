<?php
declare(strict_types=1);
namespace App\Repository;

interface MaterialClassInterface{
    public function addMaterial(string $materialName, string $materialCode, MaterialGroupInterface $groupObj, object $unitObj):bool;
    public function editMaterial(string $materialName, MaterialGroupInterface $groupObj, object $unitObj):bool;
    public function removeMaterial(string $materialName):bool;
}