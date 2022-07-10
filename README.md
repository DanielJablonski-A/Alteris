# Alteris
HomeWork

W pliku index.php znajdują się wszystkie komendy z listy todo.
Nie jasne dla mnie jest punkt 8, dlatego raczej pewnie nie jest u mnie zaimplementowany.
Brak testów jednostkowych, zostawiam je na ten poniedziałek.


Obecny rezultat programu:
App\Controller\Fasada Object
(
    [materialObj:protected] => App\Repository\MaterialClass Object
        (
            [MaterialsObjArr:App\Repository\MaterialClass:private] => Array
                (
                    [2] => stdClass Object
                        (
                            [nazwa] => len
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => roślinne
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                    [3] => stdClass Object
                        (
                            [nazwa] => wełna
                            [kod] => kod4
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => zwierzęce
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                    [4] => stdClass Object
                        (
                            [nazwa] => jedwab
                            [kod] => kod5
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => zwierzęce
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                    [5] => stdClass Object
                        (
                            [nazwa] => stylon
                            [kod] => kod7
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => syntetyczne
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                    [6] => stdClass Object
                        (
                            [nazwa] => elana
                            [kod] => kod8
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => syntetyczne
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                    [7] => stdClass Object
                        (
                            [nazwa] => włókno szklane
                            [kod] => kod9
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => nieorganiczne
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                    [8] => stdClass Object
                        (
                            [nazwa] => włókno azbestowe
                            [kod] => kod10
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => nieorganiczne
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => milimetry
                                    [skrot] => mm
                                )

                        )

                    [9] => stdClass Object
                        (
                            [nazwa] => włókno węglowe
                            [kod] => kod11
                            [materialGroupObj] => App\Repository\OneMaterialGroupClass Object
                                (
                                    [nazwa:App\Repository\OneMaterialGroupClass:private] => nieorganiczne
                                )

                            [unitObj] => stdClass Object
                                (
                                    [nazwa] => metry
                                    [skrot] => m
                                )

                        )

                )

        )

    [OneMaterialGroupClass:protected] => 
    [SeveralMaterialGroupsClass:protected] => 
    [unitsObj:protected] => App\Repository\UnitClass Object
        (
            [UnitsObjArr:App\Repository\UnitClass:private] => Array
                (
                    [0] => stdClass Object
                        (
                            [nazwa] => milimetry
                            [skrot] => mm
                        )

                    [1] => stdClass Object
                        (
                            [nazwa] => centymetry
                            [skrot] => cm
                        )

                    [2] => stdClass Object
                        (
                            [nazwa] => metry
                            [skrot] => m
                        )

                )

        )

    [materialGroupsObj] => App\Repository\SeveralMaterialGroupsClass Object
        (
            [group_nazwa:App\Repository\SeveralMaterialGroupsClass:private] => włókna
            [MaterialsGroupObj:App\Repository\SeveralMaterialGroupsClass:private] => Array
                (
                    [włókna] => Array
                        (
                            [0] => App\Repository\SeveralMaterialGroupsClass Object
                                (
                                    [group_nazwa:App\Repository\SeveralMaterialGroupsClass:private] => naturalne
                                    [MaterialsGroupObj:App\Repository\SeveralMaterialGroupsClass:private] => Array
                                        (
                                            [naturalne] => Array
                                                (
                                                    [0] => App\Repository\OneMaterialGroupClass Object
                                                        (
                                                            [nazwa:App\Repository\OneMaterialGroupClass:private] => roślinne
                                                        )

                                                    [1] => App\Repository\OneMaterialGroupClass Object
                                                        (
                                                            [nazwa:App\Repository\OneMaterialGroupClass:private] => zwierzęce
                                                        )

                                                )

                                        )

                                    [MaterialsGroupCount:App\Repository\SeveralMaterialGroupsClass:private] => 1
                                )

                            [1] => App\Repository\SeveralMaterialGroupsClass Object
                                (
                                    [group_nazwa:App\Repository\SeveralMaterialGroupsClass:private] => chemiczne
                                    [MaterialsGroupObj:App\Repository\SeveralMaterialGroupsClass:private] => Array
                                        (
                                            [chemiczne] => Array
                                                (
                                                    [0] => App\Repository\OneMaterialGroupClass Object
                                                        (
                                                            [nazwa:App\Repository\OneMaterialGroupClass:private] => sztuczne
                                                        )

                                                    [1] => App\Repository\OneMaterialGroupClass Object
                                                        (
                                                            [nazwa:App\Repository\OneMaterialGroupClass:private] => syntetyczne
                                                        )

                                                    [2] => App\Repository\OneMaterialGroupClass Object
                                                        (
                                                            [nazwa:App\Repository\OneMaterialGroupClass:private] => nieorganiczne
                                                        )

                                                )

                                        )

                                    [MaterialsGroupCount:App\Repository\SeveralMaterialGroupsClass:private] => 2
                                )

                        )

                )

            [MaterialsGroupCount:App\Repository\SeveralMaterialGroupsClass:private] => 1
        )

)
