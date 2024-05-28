<?php
interface Transport {
    public function move();
}

abstract class Bus implements Transport {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function move() {
        echo "Bus $this->name is moving. ";
    }

    abstract public function stop();
}

class BigBus extends Bus {
    public function stop() {
        echo "BigBus $this->name stopped on BigBus stop";
    }
}

class Marshrutka extends Bus {
    public function stop() {
        echo "Marshrutka $this->name stopped at marshrutka stop";
    }
}

class Tralik extends Bus {
    public function stop() {
        echo "Tralik $this->name stopped at tralik stop";
    }
}

class Passenger {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function sitInTransport(Transport $transport) {
        echo "$this->name sits inside of transport";
    }
}

class Student extends Passenger {
    public function study() {
        echo "$this->name is studying";
    }
}

class Babka extends Passenger {
    public function work() {
        echo "$this->name exists";
    }
}

class Programist extends Passenger {
    // Програміст програмує
    public function code() {
        echo "$this->name is suffering";
    }
}

class BusStop {
    private $name;

    // Конструктор
    public function __construct($name) {
        $this->name = $name;
    }

    public function callStop(Transport $transport) {
        echo "Bus stop $this->name calls stop";
        $transport->stop();
    }
}

class Konechka extends BusStop {
    public function callStop(Transport $transport) {
        parent::callStop($transport);
        echo "Konechka!";
    }
}

class SimpleStop extends BusStop {
    // Реалізація методу callStop для SimpleStop
    public function callStop(Transport $transport) {
        parent::callStop($transport);
        echo "Simple stop! ";
    }
}

$bigBus = new BigBus('274');
$marshrutka = new Marshrutka('55');
$tralik = new Tralik('10');

$student = new Student('Dimon');
$babka = new Babka('Motrya');
$programist = new Programist('Sanya');

$konechkaStop = new Konechka('Konechka');
$simpleStop = new SimpleStop('Simple');

$student-> sitInTransport($bigBus);
$babka->sitInTransport($marshrutka);
$programist->sitInTransport($tralik);

$bigBus->move();
$marsh = 0;
