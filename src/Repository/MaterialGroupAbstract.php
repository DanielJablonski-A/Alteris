<?php
declare(strict_types=1);
namespace App\Repository;

abstract class MaterialGroupAbstract {

    abstract function getMaterialGroupInfo(string $materialGroupName);
    abstract function getMaterialGroupExist(string $materialGroupName);
    abstract function editMaterialGroup(string $materialGroupName, string $newMaterialGroupName);
    abstract function getMaterialsGroupCount();
    abstract function setMaterialsGroupCount(int $new_count);
    abstract function addMaterialGroup(MaterialGroupAbstract $oneMaterialGroup);
    abstract function removeMaterialGroup(string $oneMaterialGroup);

    function treeGet(array $tree, string $searchValue, $return=[])
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
