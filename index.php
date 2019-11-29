<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$lucie = new Warrior('Lucie');
$anto = new Mage('Anto');
$ariane = new Archer ('Ariane');

// Characters attacking while both alive
while ($lucie->isAlive() && $anto->isAlive() && $ariane->isAlive()) {
    // 1st Character (Lucie) attacks the 2nd (Anto)
    echo $lucie->action($anto);
    // Check if target is alive
    if (!$anto->isAlive()) {
        echo '<br>';
        echo "$anto->pseudo est KO ! ";
        break;
    } else if (!$ariane->isAlive()){
        echo'<br>';
        echo "$ariane->pseudo est KO ! ";
    };
    echo '<br>';

    echo $anto->action($lucie);
    if ($anto->isAlive()){
        // 2nd Character (Anto) attaks 1st Character (Lucie)
        $anto->action($lucie);
        // Check if target is alive
        if (!$lucie->isAlive()) {
            echo '<br>';
            echo "$lucie->pseudo est KO ! ";
            break;
        }else if (!$ariane->isAlive()){
            echo'<br>';
            echo "$ariane->pseudo est KO ! ";
        };
    }
    echo'<br>';
    
    if ($ariane->isAlive()){
        if ($anto->isAlive()){
            //3rd Character (Ariane) attacks a target
            echo $ariane->action($anto);
            // Check if target is alive
            if (!$anto->isAlive()){
                echo '<br>';
                echo "$anto->pseudo est KO ! ";
            };
        } else if ($lucie->isAlive()){
            //3rd Character (Ariane) attacks a target
            echo $ariane->action($lucie);
            // Check if target is alive
            if (!$lucie->isAlive()){
                echo '<br>';
                echo "$lucie->pseudo est KO ! ";
            }
        } else {
            echo "Ariane a transformé tout le monde en passoire !! ";
        }
    }
    echo '<br>';
    echo '<br>';
}