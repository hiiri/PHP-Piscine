<?php

Class Color {
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = False;

    static function doc() {
        return file_get_contents('Color.doc.txt');
    }

    public function add( Color $rhs ) {
        $res = new Color( array (
            'red' => $this->red + $rhs->red,
            'green' => $this->green + $rhs->green, 
            'blue' => $this->blue + $rhs->blue)
        );
        return $res;
    }

    public function sub( Color $rhs ) {
        $res = new Color( array (
            'red' => $this->red - $rhs->red,
            'green' => $this->green - $rhs->green, 
            'blue' => $this->blue - $rhs->blue)
        );
        return $res;
    }

    public function mult( $f ) {
        $res = new Color( array (
            'red' => $this->red * $f,
            'green' => $this->green * $f, 
            'blue' => $this->blue * $f)
        );
        return $res;
    }

    private function rgb_split( $val ) {
        $this->blue = $val & 255;
        $this->green = ($val >> 8) & 255;
        $this->red = ($val >> 16) & 255;
    }

    public function __construct( array $kwargs ) {    
        if (array_key_exists('rgb', $kwargs)) {
            $this->rgb_split(intval($kwargs['rgb']));
        } else if ( array_key_exists('red', $kwargs) && 
                    array_key_exists('green', $kwargs) && 
                    array_key_exists('blue', $kwargs)) {
            $this->red = intval($kwargs['red']);
            $this->green = intval($kwargs['green']);
            $this->blue = intval($kwargs['blue']);
        }
        if (self::$verbose)
            print($this->__toString() . ' constructed.' . PHP_EOL);
        return;
    }

    public function __toString() {
        $pad_r = str_pad($this->red, 3, " ", STR_PAD_LEFT);
        $pad_g = str_pad($this->green, 3, " ", STR_PAD_LEFT);
        $pad_b = str_pad($this->blue, 3, " ", STR_PAD_LEFT);
        return 'Color( red: ' . $pad_r . ', ' .
            'green: ' . $pad_g . ', ' .
            'blue: ' . $pad_b . ' )';
    }

    public function __destruct() {
        if (self::$verbose)
            print($this->__toString() . ' destructed.' . PHP_EOL);
        return;
    }
}

?>