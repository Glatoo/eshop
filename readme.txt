Navod na pouzitie:
    Predtym nez zacnes upravovat:
        1. git pull origin develop
        *2. Ak nastane merge conflict:
                Auto-merging readme.txt
                CONFLICT (content): Merge conflict in readme.txt
                Automatic merge failed; fix conflicts and then commit the result.
                Potom musis vojst do daneho suboru a tam si upravis co chces nechat a co nie. Tieto rozdiely su oddelene
                pomocou <<<<<<< dalej rozdiel je oddeleny ====== a koniec zmeny je >>>>>>> tam si vyber co chces
                ponechat a potom tie sipky a rovnasa vymaz
        2. Ak nenastane mozes zacat upravovat
        3. Potom musis pridat zmeny: git add .
        4. Potom spravis commit s odkazom: git commit -m"Sprava sprava spravicka"
        5. Nasledne pushnes zmeny do repozitara: git push origin develop
