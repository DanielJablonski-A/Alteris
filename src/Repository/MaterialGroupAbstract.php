<?php
declare(strict_types=1);
namespace App\Repository;

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