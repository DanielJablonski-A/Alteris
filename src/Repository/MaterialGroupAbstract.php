<?php
declare(strict_types=1);
namespace App\Repository;

interface MaterialGroupInterface {
    public function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName);
    public function addMaterialGroup(MaterialGroupAbstract $oneMaterialGroup);
    public function removeMaterialGroup(string $oneMaterialGroup);
    public function getMaterialGroupInfo(string $materialGroupName);
    public function getMaterialGroupExist(string $materialGroupName);
    public function getMaterialsGroupCount();
    public function setMaterialsGroupCount(int $new_count);
}

abstract class MaterialGroupAbstract implements MaterialGroupInterface {
    protected function treeGet(array $tree, string $searchValue, $return=[])
    {
        foreach($tree as $branch => $twig){
            if (is_object($twig)){
                $twigArr = (array)$twig;
            } else {
                $twigArr = $twig;
            }
            if (is_array($twigArr)) {
                $key = array_search($searchValue, $twigArr);
                if ($key){
                    $return = $twig;
                    return $return;
                }
                $return = $this->treeGet($twigArr, $searchValue, $return);
            }
        }
        return $return;
    }
}