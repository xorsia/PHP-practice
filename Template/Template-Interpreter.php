<?php
abstract class Expression {
    private static $keycount = 0;
    private $key;

    // Метод interpret получит разную реализацию:
    // в конкретных классах он будет записывать данные с класса в класс-хранилище InterpreterContext,
    // в абс. классе он будет вызывать такие же методы, только в дочерних;
    abstract function interpret (InterpreterContext $context) ;

    // Стандартная реализация метода. М. присваивает уникальный номер;
    function getKey() {
        if (!isset($this->key)) {
            self::$keycount++;
            $this->key = self::$keycount;
        }
        return $this->key;
    }
}

class LiteralExpression extends Expression {
    private $value;
    function __construct($value) {
        $this->value = $value;
    }
    function interpret(InterpreterContext $context) {
        $context->replace($this, $this->value);
    }
}

class VariableExpression extends Expression {
    private $name;
    private $val;
    function __construct($name, $val = null) {
        $this->name = $name;
        $this->val = $val;
    }
    function interpret(InterpreterContext $context) {
        if (!is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }
    function setValue($value) {
        $this->val = $value;
    }
    function getKey() {
        return $this->name;
    }
}

abstract class OperatorExpression extends Expression {
    protected $l_op;
    protected $r_op;
    function __construct(Expression $l_op, Expression $r_op) {
        $this->l_op = $l_op;
        $this->r_op = $r_op;
    }
    function interpret(InterpreterContext $context) {
        $this->l_op->interpret($context);
        $this->r_op->interpret($context);
        $result_l = $context->lookup($this->l_op);
        $result_r = $context->lookup($this->r_op);
        $this->doInterpret($context, $result_l, $result_r);
    }
    protected abstract function doInterpret(InterpreterContext $context, $result_l, $result_r);
}

class EqualsExpression extends OperatorExpression {
    protected  function doInterpret(InterpreterContext $context, $result_l, $result_r) {
        $context->replace($this, $result_l == $result_r);
    }
}

class BooleanOrExpression extends OperatorExpression {
    protected  function doInterpret(InterpreterContext $context, $result_l, $result_r) {
        $context->replace($this, $result_l || $result_r);
    }
}

class BooleanAndExpression extends OperatorExpression {
    protected  function doInterpret(InterpreterContext $context, $result_l, $result_r) {
        $context->replace($this, $result_l && $result_r);
    }
}

class InterpreterContext {
    public $expressionstore = array();

    // Метод записи данных в массив;
    function replace(Expression $exp, $value) {
        $this->expressionstore[$exp->getKey()] = $value;
    }

    // Метод чтения данных с массива;
    function lookup(Expression $exp) {
        return $this->expressionstore[$exp->getKey()];
    }
}

// Созд. объект хранилище;
$context = new InterpreterContext();
$input = new VariableExpression('input');
// Будет создана иерархия объектов, но метод interpret еще не запущен и нету расчетов по иерархии классв;
$statement = new BooleanOrExpression(
    new EqualsExpression($input, new LiteralExpression('5')),
    new EqualsExpression($input, new LiteralExpression('8'))
);
$input->setValue('5');
$statement->interpret($context);
if($context->lookup($statement)) {
    echo 'Соответствует';
} else {
    echo 'Не соответствует';
}
echo "<br>";
var_dump($context->expressionstore);
echo "<br>";
var_dump($statement->getKey());