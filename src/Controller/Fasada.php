<?php
declare(strict_types=1);
namespace App\Controller;

use App\Repository\MaterialFactory;
use App\Repository\MaterialClass;
use App\Repository\UnitClass;

use \stdClass;
use \UnexpectedValueException;

class Fasada
{
    protected object $materialObj;
    protected object $materialGroupsObj;
    protected object $unitsObj;

    function __construct()
    {
        $this->materialObj = new MaterialClass(); 
        $this->materialGroupsObj = new stdClass();
        $this->unitsObj = new UnitClass();
    }


    /**
    * Dodaje naszą ukończoną strukturę drzewiastą do obiektu, by móc na niej pracować
    * w obrębie obiektu.
    */ 
    public function addTreeObj($treeObj):void
    {
        $this->materialGroupsObj = $treeObj;
    }


    /**
    * Dodaje nowy materiał
    * wysyłam żadanie do fabryki by ta przygotowała mi objekt
    * jaki chcę
    */ 
    public function addMaterial(string $newMaterialName, string $newMaterialCode, string $materialGroup, string $materialUnit):bool
    {
        return (new MaterialFactory($this->materialObj, $this->materialGroupsObj, $this->unitsObj))
            ->create('addMaterial')
            ->addMaterial($newMaterialName, $newMaterialCode, $materialGroup, $materialUnit);
    }


   /**
   * Edytuję materiał
   * wysyłam żadanie do fabryki by ta zedytowała mi objekt
   * jaki chcę
   */ 
    public function editMaterial(string $materialName, string $materialGroup, string $materialUnit):bool
    {
        return (new MaterialFactory($this->materialObj, $this->materialGroupsObj, $this->unitsObj))
            ->create('editMaterial')
            ->editMaterial($materialName, $materialGroup, $materialUnit);
    }


    /**
    * Usuwam materiał który wcześniej mi fabryka przygotowała
    */
    public function removeMaterial(string $MaterialName):void
    {
        $this->materialObj->removeMaterial($MaterialName);
    }


   /**
   * Mogę też usunąć grupe materiałową z drzewa które dodałem tu do obiektu
   */ 
    public function removeMaterialGroup(string $materialGroupName):void
    {
        $this->materialGroupsObj->removeMaterialGroup($materialGroupName);
    }


   /**
   * Dodaje nową miarę do obiektu Unit
   */ 
    public function addUnit(string $newUnit, string $newUnitShotcut):void
    {
        $this->unitsObj->addUnit($newUnit, $newUnitShotcut);
    }


    /**
    * Edytuję miarę w obiekcie Unit
    */ 
    public function editUnit(string $unitName, string $newUnitName, string $newUnitShotcut):void
    {
        $this->unitsObj->editUnit($unitName, $newUnitName, $newUnitShotcut);
    }


}
