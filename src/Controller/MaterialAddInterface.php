<?php
declare(strict_types=1);
namespace App\Controller;

interface MaterialAddInterface{
    public function addMaterial(string $newMaterialName, string $newMaterialCode, string $materialGroup, string $materialUnit):bool;
}