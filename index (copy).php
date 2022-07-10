<?php
header ("Content-type: text/plain");

function writeln($line_in) {
    echo $line_in."\n";
}

abstract class OnTheMaterialGroupShelf {
    abstract function getMaterialGroupInfo($previousMaterialGroup);
    abstract function getMaterialsGroupCount();
    abstract function setMaterialsGroupCount($new_count);
    abstract function addMaterialGroup($oneMaterialGroup);
    abstract function removeMaterialGroup($oneMaterialGroup);
}

class OneMaterialGroup extends OnTheMaterialGroupShelf {
    private $nazwa;
    function __construct($nazwa) {
      $this->nazwa = $nazwa;
    }
    function getMaterialGroupInfo($MaterialGroupToGet) {
      if (1 == $MaterialGroupToGet) {
        return $this->nazwa;
      } else {
        return FALSE;
      }
    }
    function getMaterialsGroupCount() {
      return 1;
    }
    function setMaterialsGroupCount($newCount) {
      return FALSE;
    }
    function addMaterialGroup($oneMaterialGroup) {
      return FALSE;
    }
    function removeMaterialGroup($oneMaterialGroup) {
      return FALSE;
    }
}

class SeveralMaterialGroups extends OnTheMaterialGroupShelf {
    private $group_nazwa;
    private $MaterialsGroupObj = array();
    private $MaterialsGroupCount;
    public function __construct($group_nazwa) {
        $this->group_nazwa = $group_nazwa;
        $this->setMaterialsGroupCount(0);
    }
    public function getMaterialsGroupCount() {
        return $this->MaterialsGroupCount;
    }
    public function setMaterialsGroupCount($newCount) {
        $this->MaterialsGroupCount = $newCount;
    }

    public function getMaterialGroupInfo($MaterialGroupToGet) {   
      if ($MaterialGroupToGet <= $this->MaterialsGroupCount) {
        return $this->MaterialsGroupObj[$MaterialGroupToGet]->getMaterialGroupInfo(1);
      } else {
        return FALSE;
      }
    }

    public function getAllMaterialGroup() { 
        if ($this->getMaterialsGroupCount() < 1) return FALSE;
          print_r ($this->MaterialsGroupObj);
      }

    public function addMaterialGroup($oneMaterialGroup) {
      $this->setMaterialsGroupCount($this->getMaterialsGroupCount() + 1);
      $this->MaterialsGroupObj[$this->group_nazwa][$this->getMaterialsGroupCount()] = $oneMaterialGroup;
      return $this->getMaterialsGroupCount();
    }
    public function removeMaterialGroup($oneMaterialGroup) {
      $counter = 0;
      while (++$counter <= $this->getMaterialsGroupCount()) {
        if ($oneMaterialGroup->getMaterialGroupInfo(1) == $this->MaterialsGroupObj[$this->group_nazwa][$counter]->getMaterialGroupInfo(1)) {
          for ($x = $counter; $x < $this->getMaterialsGroupCount(); $x++) {
            $this->MaterialsGroupObj[$this->group_nazwa][$x] = $this->MaterialsGroupObj[$this->group_nazwa][$x + 1];
          }
          $this->setMaterialsGroupCount($this->getMaterialsGroupCount() - 1);
        }
      }
      return $this->getMaterialsGroupCount();
    }
}

//Tworze sobie dowolnie grupy i podgrupy Materiałów:
$last_group1 = new OneMaterialGroup('roślinne');
$last_group2 = new OneMaterialGroup('zwierzęce');

$MiddleGroup1 = new SeveralMaterialGroups('naturalne');
$MiddleGroup1->addMaterialGroup($last_group1);
$MiddleGroup1->addMaterialGroup($last_group2);

$last_group1 = new OneMaterialGroup('sztuczne');
$last_group2 = new OneMaterialGroup('syntetyczne');
$last_group3 = new OneMaterialGroup('nieorganiczne');

$MiddleGroup2 = new SeveralMaterialGroups('chemiczne');
$MiddleGroup2->addMaterialGroup($last_group1);
$MiddleGroup2->addMaterialGroup($last_group2);
$MiddleGroup2->addMaterialGroup($last_group3);

$MasterGroup = new SeveralMaterialGroups('włókna');
$MasterGroup->addMaterialGroup($MiddleGroup1);
$MasterGroup->addMaterialGroup($MiddleGroup2);
// wyświetlam
$MasterGroup->getAllMaterialGroup();



//   $MaterialGroupsCount = $MaterialGroups->removeMaterialGroup($firstMaterialGroup);
//   writeln($MaterialGroups->getMaterialsGroupCount());










abstract class UnitAbstract {
    abstract function getUnitInfo($unitName);
    abstract function getUnitCount();
    abstract function addUnit($newUnit, $newUnitShotcut);
    abstract function removeUnit($newUnit);

    function get_obj_key_by_name($obj, $unitName){
        if (empty($unitName)) return FALSE;
        if (empty($obj)) return FALSE;
        return array_search($unitName, array_column(json_decode(json_encode($obj),TRUE), 'nazwa'));
    }
}

class Unit extends UnitAbstract {
    private $UnitsObjArr = array();

    function __construct() {}

    function getUnitInfo($unitName){
        // może istnieć tylko jeden materiał o nazwie
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            return $unitName;
        } else {
            return FALSE;
        }
    }
    function getUnitCount() {
      return count((array)$this->UnitsObjArr);;
    }

    function addUnit($newUnit, $newUnitShotcut) {
        if (empty($newUnitShotcut)) return FALSE;
        if ($this->getUnitInfo($newUnit)) return FALSE;
        $this->UnitsObjArr[] =  (object)array('nazwa' => $newUnit, 'skrot' => $newUnitShotcut);
        return TRUE;
    }
    function removeUnit($unitName) {
        $key = $this->get_obj_key_by_name($this->UnitsObjArr, $unitName);
        if (is_int($key)){
            unset($this->UnitsObjArr[$key]);
        } else {
            return FALSE;
        }        
    }
}

$unit = new Unit();
$unit->addUnit('milimetry', 'mm');
$unit->addUnit('centymetry', 'cm');
$unit->addUnit('metry', 'm');
print_r ($unit);












abstract class MaterialAbstract {
    abstract function getMaterialInfo($materialName);
    abstract function getMaterialCount();
    abstract function addMaterial($materialName, $materialCode);
    abstract function removeMaterial($materialName);

    function get_obj_key_by_name($obj, $materialName){
        if (empty($obj)) return FALSE;
        return array_search($materialName, array_column(json_decode(json_encode($obj),TRUE), 'nazwa'));
    }
}

class Material extends MaterialAbstract {
    private $MaterialsObjArr = array();

    function __construct() {}

    function getMaterialInfo($materialName){
        // może istnieć tylko jeden materiał o nazwie
        $key = $this->get_obj_key_by_name($this->MaterialsObjArr, $materialName);
        if (is_int($key)){
            return $materialName;
        } else {
            return FALSE;
        }
    }
    function getMaterialCount() {
      return count((array)$this->MaterialsObjArr);;
    }

    function addMaterial($newMaterial, $newMaterialCode) {
        if (empty($newMaterialCode)) return FALSE;
        if ($this->getMaterialInfo($newMaterial)) return FALSE;
        $this->MaterialsObjArr[] = (object)array('nazwa' => $newMaterial, 'kod' => $newMaterialCode);
        return TRUE;
    }
    function removeMaterial($materialName) {
        $key = $this->get_obj_key_by_name($this->MaterialsObjArr, $materialName);
        if (is_int($key)){
            unset($this->MaterialsObjArr[$key]);
        } else {
            return FALSE;
        }        
    }
}

$material = new Material();
$material->addMaterial('bawełna', 'kod', 'roślinne', 'cm');
$material->addMaterial('bawełna', 'kod2', 'roślinne', 'cm');
$material->addMaterial('len', 'kod3', 'roślinne', 'm');
$material->addMaterial('wełna', 'kod4', 'zwierzęce', 'm');
$material->addMaterial('jedwab', 'kod5', 'zwierzęce', 'm');
$material->addMaterial('tkanina wiskozowa', 'kod6', 'sztuczne', 'mmmm');
$material->addMaterial('stylon', 'kod7', 'syntetyczne', 'm');
$material->addMaterial('elana', 'kod8', 'syntetyczne', 'm');
$material->addMaterial('włókno szklane', 'kod9', 'nieorganiczne', 'm');
$material->addMaterial('włókno azbestowe', 'kod10', 'nieorganiczne', 'mm');
$material->addMaterial('włókno węglowe', 'kod11', 'nieorganiczne', 'm');
$material->removeMaterial('bawełna');
print_r ($material);

?>