<?php

class NightsWatch implements IFighter {
    private $members = array();
    
    public function recruit( $person ) {
        $this->members[] = $person;
    }

    public function fight() {
        foreach ($this->members as $member)
            if ($member instanceof IFighter)
                $member->fight();
    }
    
}

?>