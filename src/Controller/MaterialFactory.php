<?php declare(strict_types=1);
namespace App\Controller;
use InvalidArgumentException;

use App\Repository\MaterialClass;
use App\Repository\SeveralMaterialGroupsClass;
use App\Repository\UnitClass;
use App\Controller\MaterialAdd;
use App\Controller\MaterialEdit;
 
final class MaterialFactory
{
    function __construct(MaterialClass $materialObj, SeveralMaterialGroupsClass $materialGroupsObj, UnitClass $unitsObj){
        $this->materialObj = $materialObj; 
        $this->materialGroupsObj = $materialGroupsObj;
        $this->unitsObj = $unitsObj;
    }
    public function create($type)
    {
        switch($type){
            case 'addMaterial':
                return new Material($this->materialObj, $this->materialGroupsObj, $this->unitsObj);
                break;

            case 'editMaterial':
                return new Material($this->materialObj, $this->materialGroupsObj, $this->unitsObj);
                break;
                
            default:
                throw new InvalidArgumentException('Ta fabryka tego nie produkuje');
        };
    }
}