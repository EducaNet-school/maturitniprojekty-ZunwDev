<?php
class Auto {
    protected string $typ;
    protected string $znacka;

    public function __construct($typ, $znacka) {
        $this->typ = $typ;
        $this->znacka = $znacka;
    }

    public function vratInfo() {
        return [$this->typ, $this->znacka];
    }
}

class Nakladak extends Auto {
    private int $nosnost;

    public function __construct($typ, $znacka, $nosnost) {
        parent::__construct($typ, $znacka);
        $this->nosnost = $nosnost;
    }

    public function vratInfo() {
        return [$this->typ, $this->znacka, $this->nosnost];
    }
}

class ElektroAuto extends Auto {
    private int $vydrz;

    public function __construct($typ, $znacka, $vydrz) {
        parent::__construct($typ, $znacka);
        $this->vydrz = $vydrz;
    }

    public function vratInfo() {
        return [$this->typ, $this->znacka, $this->vydrz];
    }
}

$arr = [new Auto("normal", "test"), new Nakladak("nakladni", "test1", 500), new Nakladak("nakladni", "test2", 1000), new ElektroAuto("elektro", "test3", 300)];
for ($i = 0; $i < count($arr); $i++) {
    echo '<pre>'; print_r($arr[$i]); echo '</pre>';
}
