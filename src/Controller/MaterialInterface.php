<?php
declare(strict_types=1);
namespace App\Controller;

interface MaterialInterface{
    public function editMaterial(string $materialName, string $materialGroup, string $materialUnit):bool;
    public function addMaterial(string $newMaterialName, string $newMaterialCode, string $materialGroup, string $materialUnit):bool;
}