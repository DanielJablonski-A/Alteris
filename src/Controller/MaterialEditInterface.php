<?php
declare(strict_types=1);
namespace App\Controller;

interface MaterialEditInterface{
    public function editMaterial(string $materialName, string $materialGroup, string $materialUnit):bool;
}