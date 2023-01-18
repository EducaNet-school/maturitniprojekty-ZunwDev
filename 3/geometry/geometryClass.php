<?php

class Shape
{
    protected $a;
    protected $b;
    protected $c;

    public function __construct($a = NAN, $b = NAN, $c = NAN)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
}

class Square extends Shape
{
    public function __construct($a)
    {
        parent::__construct($a);
    }

    public function area()
    {
        return $this->a ^ 3;
    }

    public function perimeter()
    {
        return $this->a * $this->a;
    }

    public function output()
    {
        return "Area: " . $this->area() . " cm2<br>" . "Perimeter: " . $this->perimeter() . " cm";
    }
}

class Rect extends Shape
{
    public function __construct($a, $b)
    {
        parent::__construct($a, $b);
    }

    public function area()
    {
        return $this->a * $this->b;
    }

    public function perimeter()
    {
        return 2 * $this->a + 2 * $this->b;
    }

    public function output()
    {
        return "Area: " . $this->area() . " cm2<br>" . "Perimeter: " . $this->perimeter() . " cm";
    }
}

class Triangle extends Shape
{
    public function __construct($a, $b, $c)
    {
        parent::__construct($a, $b, $c);
    }

    public function area()
    {
        if ($this->a == $this->b && $this->c > $this->a || $this->c > $this->b) {
            $s = ($this->a + $this->b + $this->c) / 2;
            $area = sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
            return $area;
        }
        if (($this->a == $this->b) && ($this->b == $this->c)) {
            return (sqrt(3) / 4) * ($this->a ** 2);
        }
    }

    public function perimeter()
    {
        if ($this->a == $this->b && $this->c > $this->a || $this->c > $this->b) {
            return 2 * $this->a + $this->c;
        }
        if (($this->a == $this->b) && ($this->b == $this->c)) {
            return 3 * $this->a;
        }
    }

    public function output()
    {
        return "Area: " . $this->area() . " cm2<br>" . "Perimeter: " . $this->perimeter() . " cm";
    }
}

if (isset($_POST['a']) || isset($_POST['b']) || isset($_POST['c'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    switch ($_POST["shape"]) {
        case "square":
            echo "<b>Square</b><br>";
            $sq = new Square($a);
            echo $sq->output();
            break;
        case "rectangle":
            echo "<b>Rectangle</b><br>";
            $sq = new Rect($a, $b);
            echo $sq->output();
            break;
        case "triangle":
            echo ($a == $b && $a < $c || $b < $c) ? "<b>Isosceles Triangle</b><br>" : "<b>Equilateral Triangle</b><br>";
            $sq = new Triangle($a, $b, $c);
            echo $sq->output();
            break;
    }
}
