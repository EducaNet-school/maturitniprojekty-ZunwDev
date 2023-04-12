<?php
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

class IntCollection implements Countable, Iterator, ArrayAccess
{
    private $values = [];
    private $position = 0;

    public function __construct(array $values = [])
    {
        foreach ($values as $value) {
            $this->offsetSet(null, $value);
        }
    }

    public function count(): int
    {
        return count($this->values);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->values[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->values[$this->position]);
    }

    public function offsetSet($offset, $value): void
    {
        if (!is_int($value)) {
            throw new InvalidArgumentException("Musí být číslo");
        }
        if ($offset === null) {
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->values[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->values[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->values[$offset]) ? $this->values[$offset] : null;
    }
}


/* $col = new IntCollectBase();
$col->addValue(10, 0);
echo $col->get(0); */

$array = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$col2 = new IntCollection($array);
foreach ($col2 as $item) {
    echo $item . " ";
}
