<?php declare(strict_types=1);
namespace App\Repository;
use InvalidArgumentException;
 
final class MaterialFactory
{
    function __construct(MaterialClass $materialObj, MaterialGroupInterface $materialGroupsObj, UnitClassInterface $unitsObj){
        $this->materialObj = $materialObj; 
        $this->materialGroupsObj = $materialGroupsObj;
        $this->unitsObj = $unitsObj;
    }
    public function create($type):MaterialFactoryInterface
    {
        switch($type){
            case 'addMaterial':
                return new MaterialFactoryClass($this->materialObj, $this->materialGroupsObj, $this->unitsObj);
                break;

            case 'editMaterial':
                return new MaterialFactoryClass($this->materialObj, $this->materialGroupsObj, $this->unitsObj);
                break;
                
            default:
                throw new InvalidArgumentException('Ta fabryka tego nie produkuje');
        };
    }
}