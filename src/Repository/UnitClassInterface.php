<?php
declare(strict_types=1);
namespace App\Repository;

interface UnitClassInterface{
    public function addUnit(string $newUnitName,string $newUnitShotcut):bool;
    public function editUnit(string $unitName, string $newUnitName, string $newUnitShotcut):bool;
    public function removeUnit(string $newUnit):bool;
}