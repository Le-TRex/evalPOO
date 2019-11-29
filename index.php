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
        };
    }
    echo'<br>';

    echo $ariane->action($lucie);
    if ($ariane->isAlive()){
        // 3rd Character (ariane) attaks 2nd Character (lucie)
        $ariane->action($lucie);
        // Check if target is alive
        if (!$lucie->isAlive()) {
            echo '<br>';
            echo "$lucie->pseudo est KO ! ";
            break;
        };
    }
    echo'<br>';
    echo '<br>';
}