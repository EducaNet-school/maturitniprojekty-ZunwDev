<style>
    table {
        border-collapse: collapse;
        width: 100%;
        table-layout: auto;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<?php

class Student
{
    private static $id = 0;
    private $studentId;
    private $username;
    private $note;
    private $del;

    function __construct($name)
    {
        $this->studentId = ++self::$id;
        $this->username = $name;
        $this->note = "";
        $this->del = "";
    }

    public function getName()
    {
        return $this->username;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function getDel()
    {
        return $this->del;
    }

    function takeNote()
    {
        if ($this->studentId % 3 == 0 && $this->studentId % 5 == 0) {
            $this->note = "EDUCANET";
            $this->del = "3 a 5";
        } else if ($this->studentId % 3 == 0) {
            $this->note = "EDUCA";
            $this->del = "3";
        } else if ($this->studentId % 5 == 0) {
            $this->note = "NET";
            $this->del = 5;
        }
    }
}

$students = array(
    new Student("a"),
    new Student("b"),
    new Student("c"),
    new Student("d"),
    new Student("e"),
    new Student("f"),
    new Student("g"),
    new Student("h"),
    new Student("i"),
    new Student("j"),
    new Student("k"),
    new Student("l"),
    new Student("m"),
    new Student("n"),
    new Student("o"),
    new Student("p"),
    new Student("q"),
    new Student("r"),
    new Student("s"),
    new Student("t"),
    new Student("u"),
);
echo "<table>";
echo "<tr><th>Jmeno</th><th>Note</th><th>Delitel</th></tr>";
foreach ($students as $student) {
    try {
        $student->takeNote();
        echo "<tr><td>" . $student->getName() . "</td><td>" . $student->getNote() . "</td><td>" .  $student->getDel() . "</td></tr>";
    } catch (Exception $e) {
        throw new Exception("Něco je špatně");
    }
}
echo "</table>";
