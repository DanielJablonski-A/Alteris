<?php
declare(strict_types=1);
namespace App\Repository;

interface MaterialGroupInterface {
    public function setNazwa(string $group_nazwa):void;
    public function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName):bool;
    public function addMaterialGroup(MaterialGroupInterface $oneMaterialGroup):int;
    public function removeMaterialGroup(string $oneMaterialGroup):bool;
    public function getMaterialGroupInfo(string $materialGroupName);
    public function getMaterialGroupExist(string $materialGroupName):bool;
    public function getMaterialsGroupCount():int;
    public function setMaterialsGroupCount(int $new_count):void;
}