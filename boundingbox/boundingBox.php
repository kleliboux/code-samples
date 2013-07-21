<?php
interface iBoundingBox {

	public function getCoords();

	public function mergeWith( iBoundingBox $box );

	public function isEmpty();

	public function equals( iBoundingBox $box, $tol = 0.01 );

}

interface iShape {

	public static function computeBoundingBox( array $shapes );

	public function getBoundingBox();
}

abstract class Shape implements iShape {

	abstract public function getBoundingBox();

	public static function computeBoundingBox( array $shapes )
	{
		$result = new Rectangle();
		foreach( $shapes as $shape )
			$result->mergeWith( $shape->getBoundingBox() );

		return $result;
	}
}

class Rectangle extends Shape implements iBoundingBox {
	protected $coords;

	// Convention : x1 y1 toujours le coin inferieur gauche.
	public function __construct($x1 = NULL, $y1 = NULL, $x2 = NULL, $y2 = NULL) {
		if( is_null($x1) )
			$this->setToEmpty();
		else
			$this->coords = array( min($x1, $x2), min($y1, $y2), max($x1, $x2), max($y1, $y2) );
	}

	public function setToEmpty() {
		$this->coords = array();
	}

	public function isEmpty() {
		return empty($this->coords);
	}

	public function getCoords() {
		return $this->coords;
	}

	public function mergeWith( iBoundingBox $box ) {
		if( $box->isEmpty() )
			return;
		$other = $box->getCoords();
		if( $this->isEmpty() ) {
			$this->coords = $other;
			return;
		}
		if( $this->coords[0] > $other[0] ) $this->coords[0] = $other[0];
		if( $this->coords[1] > $other[1] ) $this->coords[1] = $other[1];
		if( $this->coords[2] < $other[2] ) $this->coords[2] = $other[2];
		if( $this->coords[3] < $other[3] ) $this->coords[3] = $other[3];			
	}

	public function equals( iBoundingBox $box, $tol = 0.01 )
	{
		if( $this->isEmpty() )
			return $box->isEmpty();
		if( $box->isEmpty() )
			return false;

		$me = $this->coords;
		$he = $box->coords;

		return (abs( $me[0] - $he[0]) < $tol)
			&& (abs( $me[1] - $he[1]) < $tol)
			&& (abs( $me[2] - $he[2]) < $tol)
			&& (abs( $me[3] - $he[3]) < $tol);
	}

	public function getBoundingBox() {
		return $this;
	}
}

class Circle extends Shape {
	public $center, $radius;

	public function __construct($x, $y, $r) {
		$this->center = array($x, $y);
		$this->radius = $r;
	}

	public function getBoundingBox() {
		$x = $this->center[0];
		$y = $this->center[1];
		$r = $this->radius;
		return new Rectangle($x-$r, $y-$r, $x+$r, $y+$r);
	}
}

class Triangle extends Shape {
	public $coords;

	public function __construct($x1, $y1, $x2, $y2, $x3, $y3) {
		$this->coords = array($x1, $y1, $x2, $y2, $x3, $y3);
	}

	public function getBoundingBox() {
		$box1 = new Rectangle( $this->coords[0], $this->coords[1], $this->coords[2], $this->coords[3] );
		$box2 = new Rectangle( $this->coords[4], $this->coords[5], $this->coords[2], $this->coords[3] );
		$box1->mergeWith( $box2 );
		return $box1;
	}
}

class Point extends Shape {
	public $coords;

	public function __construct($x1, $y1) {
		$this->coords = array($x1, $y1);
	}

	public function getBoundingBox() {
		return new Rectangle( $this->coords[0], $this->coords[1], $this->coords[0], $this->coords[1] );
	}
}

class Test {
	protected $test = 0;

	protected function check( iBoundingBox $bbox, $coords )
	{
		$this->test++;
		if( !empty($coords) )
			$check = new Rectangle($coords[0], $coords[1], $coords[2], $coords[3]);
		else
			$check = new Rectangle();

		if( $bbox->equals($check) )
			echo "Test ".$this->test." reussi\n";
		else
			echo "Test ".$this->test." ECHEC\n";
	}

	public function run() {

		$pt   = new Point(0, 0);
		$rect = new Rectangle(20, 10, 50, -20);
		$tri  = new Triangle(50, -20, 70, 0, 40, 30);
		$circ = new Circle(80, 20, 50);

		$shapes = array( $pt, $rect, $tri, $circ );
		$bbox = Shape::computeBoundingBox( $shapes );
		$this->check( $bbox, array(0, 70, 130, -30) );

		$shapes = array();
		$bbox = Shape::computeBoundingBox( $shapes );
		$this->check( $bbox, array() );

		$shapes = array($pt);
		$bbox = Shape::computeBoundingBox( $shapes );
		$this->check( $bbox, array(0, 0, 0, 0) );

		$shapes = array($rect, $rect, $rect, $rect);
		$bbox = Shape::computeBoundingBox( $shapes );
		$this->check( $bbox, $rect->getCoords() );

		$shapes = array($tri);
		$bbox = Shape::computeBoundingBox( $shapes );
		$this->check( $bbox, array(40, 30, 70, -20) );
	}
}


$test = new Test();
$test->run();

