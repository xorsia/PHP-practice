<?php
class Aust {
    private $name;
    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    function __destruct()
    {
        echo 'работает деструктор' . "<br>";
    }
}

class Watcher {
    private $el = [];

    /**
     * @return array
     */
    public function setEl($id)
    {
        return $this->el[$id];
    }

    /**
     * @param array $el
     */
    public function getEl(Aust $el)
    {
        $this->el[] = $el;
    }
    public function deleteEl() {
        // очистка ссылки;
        unset($this->el['0']);
    }
}

$a = new Aust();
$a->setName('Name Aust');
echo $a->getName() . "<br>";

$b = new Watcher();
$b->getEl($a);

var_dump($b);
echo "<br>";

$b->deleteEl();

var_dump($b);
echo "<br>";

unset($a);
if (!isset($a)) echo 'нет такой переменной' . "<br>";
else echo 'Есть такая переменная' . "<br>";

