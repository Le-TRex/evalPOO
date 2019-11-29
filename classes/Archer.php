<?php

class Archer extends Character {
    private $arrows = 15;

    public function __construct ($pseudo) {
        $this->pseudo = $pseudo;
        //$this->wait = false;
    }

    public function action($target){
        //if Ariane is out of arrows
        if ($this->arrows <1) {
            return $this->dagger($target);
        } else if ($this->arrows ==1) {
            //if Ariane has only 1 arrow
            return $this->shoot($target);
        }else if ($this->arrows <=1) {
            //is Ariane has at least 2 arrows
            $rand=rand(1,2);
            if($rand == 1){
                return $this->shoot($target);
            }else if($rand ==2){
                return $this->wait();
            };
        }
    }

    public function dagger($target) {
        $damage = $this->atk;
        $target->setHP($damage);
        $target->isAlive();
        $status = "$this->pseudo attaque $target->pseudo avec une dague. Il reste $target->lifePoint PV à $target->pseudo";
        return $status;
    }

    public function shoot($target) {
        $damage = $this->atk*1.5;
        $target->setHP($damage);
        $target->isAlive();
        $status = "$this->pseudo tire une flèche sur $target->pseudo. Il reste $target->lifePoint PV à $target->pseudo";
    }

    public function wait() {
        $this->wait = true;
        $status = "$this->pseudo attends le prochain tour pour tirer deux flèches";
        return $status;
    }

    public function setHP($damage) {
        $this->lifePoint -= $damage;
        return;
    }
}