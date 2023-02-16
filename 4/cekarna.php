<?php
class Pacient
{
    private $jmeno;
    private $prijmeni;
    private $vek;
    private $ockovani;

    public function __construct($jmeno, $prijmeni, $vek, $ockovani)
    {
        $this->jmeno = $jmeno;
        $this->prijmeni = $prijmeni;
        $this->vek = $vek;
        $this->ockovani = $ockovani;
    }

    public function getJmeno()
    {
        return $this->jmeno;
    }

    public function getPrijmeni()
    {
        return $this->prijmeni;
    }

    public function getVek()
    {
        return $this->vek;
    }

    public function getockovani()
    {
        return $this->ockovani;
    }
}

class Cekarna
{
    private $pacienti = [];

    public function prichodDoCekarny(Pacient $pacient)
    {
        array_push($this->pacienti, $pacient);
        return $pacient->getJmeno() . " " . $pacient->getPrijmeni();
    }

    public function prichodDoAmbulance()
    {
        $pacientiNaockovani = array_filter($this->pacienti, function ($p) {
            return $p->getockovani();
        });

        if (count($pacientiNaockovani) > 0) {
            $prvniPacientNaockovani = array_shift($pacientiNaockovani);
            $index = array_search($prvniPacientNaockovani, $this->pacienti);
            array_splice($this->pacienti, $index, 1);
            return $prvniPacientNaockovani->getJmeno() . " " . $prvniPacientNaockovani->getPrijmeni();
        }

        $mladsiPacienti = array_filter($this->pacienti, function ($p) {
            return $p->getVek() < 5;
        });

        if (count($mladsiPacienti) > 0) {
            $prvniMladsiPacient = array_shift($mladsiPacienti);
            $index = array_search($prvniMladsiPacient, $this->pacienti);
            array_splice($this->pacienti, $index, 1);
            return $prvniMladsiPacient->getJmeno() . " " . $prvniMladsiPacient->getPrijmeni();
        }

        $prvniPacient = array_shift($this->pacienti);
        return $prvniPacient->getJmeno() . " " . $prvniPacient->getPrijmeni();
    }

    public function pocetCekajicich()
    {
        return count($this->pacienti);
    }
}

$cekarna = new Cekarna();

$pacient1 = new Pacient("Jan", "Novak", 8, true);
$cekarna->prichodDoCekarny($pacient1);

$pacient2 = new Pacient("Eva", "Novakova", 3, false);
$cekarna->prichodDoCekarny($pacient2);

$pacient3 = new Pacient("Tomas", "Svoboda", 10, false);
$cekarna->prichodDoCekarny($pacient3);

$pacient4 = new Pacient("Martina", "Hrdinova", 5, false);
$cekarna->prichodDoCekarny($pacient4);

echo "<pre>";
echo "Pocet cekajicich pacientu: " . $cekarna->pocetCekajicich() . "\n";

echo "Prichod do ambulance: " . $cekarna->prichodDoAmbulance() . "\n";
echo "Pocet cekajicich pacientu: " . $cekarna->pocetCekajicich() . "\n";

echo "Prichod do ambulance: " . $cekarna->prichodDoAmbulance() . "\n";
echo "Pocet cekajicich pacientu: " . $cekarna->pocetCekajicich() . "\n";

echo "Prichod do ambulance: " . $cekarna->prichodDoAmbulance() . "\n";
echo "Pocet cekajicich pacientu: " . $cekarna->pocetCekajicich() . "\n";
echo "</pre>";
