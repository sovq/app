<?php namespace r;

// Helper class
class BinaryOp extends ValuedQuery
{
    public function __construct($termType, ValuedQuery $value, $other) {
        if (!(is_object($other) && is_subclass_of($other, "\\r\\Query")))
            $other = nativeToDatum($other);
        $this->value = $value;
        $this->other = $other;
        $this->termType = $termType;
    }

    public function getPBTerm() {
        $term = new pb\Term();
        $term->set_type($this->termType);
        $term->set_args(0, $this->value->getPBTerm());
        $term->set_args(1, $this->other->getPBTerm());
        return $term;
    }
    
    private $termType;
    private $value;
    private $other;
}

class Add extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_ADD, $value, $other);
    }
}
class Sub extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_SUB, $value, $other);
    }
}
class Mul extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_MUL, $value, $other);
    }
}
class Div extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_DIV, $value, $other);
    }
}
class Mod extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_MOD, $value, $other);
    }
}
class RAnd extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_ALL, $value, $other);
    }
}
class ROr extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_ANY, $value, $other);
    }
}
class Eq extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_EQ, $value, $other);
    }
}
class Ne extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_NE, $value, $other);
    }
}
class Gt extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_GT, $value, $other);
    }
}
class Ge extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_GE, $value, $other);
    }
}
class Lt extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_LT, $value, $other);
    }
}
class Le extends BinaryOp {
    public function __construct(ValuedQuery $value, $other) {
        parent::__construct(pb\Term_TermType::PB_LE, $value, $other);
    }
}

class Not extends ValuedQuery
{
    public function __construct(ValuedQuery $value) {
        $this->value = $value;
    }

    public function getPBTerm() {
        $term = new pb\Term();
        $term->set_type(pb\Term_TermType::PB_NOT);
        $term->set_args(0, $this->value->getPBTerm());
        return $term;
    }
    
    private $value;
}

?>
