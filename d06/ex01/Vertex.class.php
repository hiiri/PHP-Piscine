<?php

require_once 'Color.class.php';

Class Vertex {

    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color; # Color class
    
    public static $verbose = False;

    public function __set( $att, $value ) {
        print( 'Vertex Error : Invalid attempt to set \'' . $att . '\' to \'' . $value . '\'' . PHP_EOL);
    }

    public function __get( $att ) {
        print( 'Vertex Error : Invalid attempt to get \'' . $att . '\'' . PHP_EOL);
    }

    static function doc() {
        return file_get_contents('Vertex.doc.txt');
    }

    public function __construct( array $kwargs ) {  
        if (isset($kwargs['x']) && isset($kwargs['y']) && isset($kwargs['z'])) {
                $this->setX($kwargs['x']);
                $this->setY($kwargs['y']);
                $this->setZ($kwargs['z']);
        } else {
            print('Vertex Error: parameters \'x\', \'y\', \'z\' are required.');
        }
        if (isset($kwargs['w']))
            $this->setW($kwargs['w']);
        else {
            $this->setW(1.0);
        }
        if (isset($kwargs['color']))
            $this->setColor($kwargs['color']);
        else {
            $this->setColor(new Color( array( 
                'red' => 0xff, 'green' => 0xff, 'blue' => 0xff
            )));
        }
        if (self::$verbose)
            print($this->__toString() . ' constructed' . PHP_EOL);
        return;
    }

    public function __destruct() {
        if (self::$verbose)
            print($this->__toString() . ' destructed' . PHP_EOL);
        return;
    }

    public function __toString() {
        $format = 'Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f';
        $string = sprintf($format,  $this->getX(), 
                                    $this->getY(), 
                                    $this->getZ(),
                                    $this->getW());
        if (self::$verbose) {
            return $string . ', ' . $this->getColor() . ' )';
        }
        else {
            return $string . ' )';
        }
    }

    public function getX()      { return $this->_x; }
    public function getY()      { return $this->_y; }
    public function getZ()      { return $this->_z; }
    public function getW()      { return $this->_w; }
    public function getColor()  { return $this->_color; }

    public function setX( $x )          { $this->_x = $x; return; }
    public function setY( $y )          { $this->_y = $y; return; }
    public function setZ( $z )          { $this->_z = $z; return; }
    public function setW( $w )          { $this->_w = $w; return; }
    public function setColor( $color )  { $this->_color = $color; return;}
}

?>