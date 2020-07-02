<?php

class Tyrion extends Lannister {
    public function sleepWith( $person ) {
        if ($person instanceof Jaime)
            echo 'Not even if I\'m drunk !' . PHP_EOL;
        else if ($person instanceof Sansa)
            echo 'Let\'s do this.' . PHP_EOL;
        else if ($person instanceof Cersei)
        echo 'Not even if I\'m drunk !' . PHP_EOL;
    }
}

?>