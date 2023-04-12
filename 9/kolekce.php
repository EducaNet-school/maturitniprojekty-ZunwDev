<?php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];

foreach ($array as $item) {
    echo $item . " ";
}
class IntCollectBase
{
    private $values = [];

    public function addValue(int $val, $key = null): void
    {
        if ($key == null) {
            array_push($this->values, $val);
        } else {
            $this->values[$key] = $val;
        }
    }
    public function get($key): int
    {
        return $this->values[$key];
    }
}

$col = new IntCollectBase();
$col->addValue(10, 0);
echo $col->get(0);
