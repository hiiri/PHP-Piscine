<?php

require_once 'Vertex.class.php';

Class Vector {

    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    
    public static $verbose = False;

    public function __get( $att ) {
        print( 'Vector Error : Invalid attempt to get \'' . $att . '\'' . PHP_EOL);
    }

    static function doc() {
        return file_get_contents('Vector.doc.txt');
    }

    public function __construct( array $kwargs ) {  
        if (!array_key_exists( 'dest', $kwargs )) {
            print('Vector Error: parameter \'dest\' is required.');
        }
        if (array_key_exists( 'orig', $kwargs ))
            $orig_vertex = $kwargs['orig'];
        else
            $orig_vertex = new Vertex ( array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
        $this->_x = $kwargs['dest']->getX() - $orig_vertex->getX();
        $this->_y = $kwargs['dest']->getY() - $orig_vertex->getY();
        $this->_z = $kwargs['dest']->getZ() - $orig_vertex->getZ();
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
        $format = 'Vector( x:%3.2f, y:%3.2f, z:%3.2f, w:%3.2f )';
        $string = sprintf($format,  $this->getX(), 
                                    $this->getY(), 
                                    $this->getZ(),
                                    $this->getW());
        return $string;
    }

    public function magnitude() {
        return (sqrt($this->getX()**2 + $this->getY()**2 + $this->getZ()**2));
    }

    public function normalize() {
        $magnitude = $this->magnitude();

        $normalizedX = $this->getX() / $magnitude;
        $normalizedY = $this->getY() / $magnitude;
        $normalizedZ = $this->getZ() / $magnitude;
        $vtx = new Vertex( array( 'x' => $normalizedX, 'y' => $normalizedY, 'z' => $normalizedZ ) );
        $normalizedVector = new Vector( array( 'dest' => $vtx) );
        return $normalizedVector;
    }

    public function add( Vector $rhs ) {
        $vtx = new Vertex( array(
            'x' => $this->getX() + $rhs->getX(), 
            'y' => $this->getY() + $rhs->getY(), 
            'z' => $this->getZ() + $rhs->getZ())
        );
        return new Vector( array( 'dest' => $vtx ) );
    }

    public function sub( Vector $rhs ) {
        $vtx = new Vertex( array(
            'x' => $this->getX() - $rhs->getX(), 
            'y' => $this->getY() - $rhs->getY(), 
            'z' => $this->getZ() - $rhs->getZ())
        );
        return new Vector( array( 'dest' => $vtx ) );
    }

    public function opposite() {
        return new Vector( array ( 'dest' => new Vertex( array ( 
            'x' => $this->getX() * -1,
            'y' => $this->getY() * -1,
            'z' => $this->getZ() * -1)))
        );
    }

    public function scalarProduct( $k ) {
        return new Vector( array ( 'dest' => new Vertex( array (
            'x' => $this->getX() * $k,
            'y' => $this->getY() * $k,
            'z' => $this->getZ() * $k)))
        );
    }

    public function dotProduct( Vector $rhs ) {
        return  $this->getX() * $rhs->getX() + 
                $this->getY() * $rhs->getY() + 
                $this->getZ() * $rhs->getZ();
    }

    public function cos( Vector $rhs ) {
        return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude()); 
    }

    public function crossProduct( Vector $rhs ) {
        return new Vector( array ( 'dest' => new Vertex( array (
            'x' => $this->getY() * $rhs->getZ() - $rhs->getY() * $this->getZ(),
            'y' => $this->getZ() * $rhs->getX() - $rhs->getZ() * $this->getX(),
            'z' => $this->getX() * $rhs->getY() - $rhs->getX() * $this->getY())))
        );
    }

    public function getX()      { return $this->_x; }
    public function getY()      { return $this->_y; }
    public function getZ()      { return $this->_z; }
    public function getW()      { return $this->_w; }
}

?>