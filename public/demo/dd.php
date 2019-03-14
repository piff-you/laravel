<?php


/*class A{
    public function funA() {
        return 'A';
    }
}

class B{
    public function funB() {
        $a = new A();
        echo $a->funA();
        return 'b';
    }
}

class C{
    public function funcC(){
        $b = new B();
        echo $b->funB();
        return 'c';
    }
}

$c = new C();

echo $c->funcC();*/


class A{
    public function funA() {
        return 'A';
    }
}

class B{
    public function funB(A $a) {
        echo $a->funA();
        return 'b';
    }
}

class C{
    public function funcC(A $a,B $b){
        echo $b->funB($a);
        return 'c';
    }
}

$a = new A();
$b = new B();

$c = new C();
echo $c->funcC($a,$b);