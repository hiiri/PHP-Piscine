<?php

class UnholyFactory {
    private $fighters = [];

    public function absorb( $fighter ) {
        if (isset($fighter->type)) {
            $this->fighters[] = $fighter;
            print( '(Factory absorbed a fighter of type ' . $fighter->type . ')'. PHP_EOL );
        }
        else {
            print( '(Factory can\'t absorb this, it\'s not a fighter)' . PHP_EOL);
        }
    }
    public function fabricate( $requested_type ) {
        foreach ($this->fighters as $fighter)
        {
            if ($fighter->type === $requested_type) {
                print( '(Factory fabricates a fighter of type ' . $fighter->type . ')' . PHP_EOL );
                return $fighter;
            }
        }
        print( '(Factory hasn\'t absorbed any fighter of type ' . $requested_type . ')' . PHP_EOL );
        return null;
    }

}

?>