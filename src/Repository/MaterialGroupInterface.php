<?php
declare(strict_types=1);
namespace App\Repository;

abstract class MaterialGroupInterface {

    abstract function getMaterialGroupInfo($materialGroupName);
    abstract function getMaterialGroupExist($materialGroupName);
    abstract function editMaterialGroup($materialGroupName, $newMaterialGroupName);
    abstract function getMaterialsGroupCount();
    abstract function setMaterialsGroupCount($new_count);
    abstract function addMaterialGroup($oneMaterialGroup);
    abstract function removeMaterialGroup($oneMaterialGroup);

    function treeGet($tree, $searchValue, $return=[])
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
