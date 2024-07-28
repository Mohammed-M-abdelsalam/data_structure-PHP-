<?php 
class Node{
    private $value; 
    private $next;

    public function __construct($value){
        $this->value = $value;
    }

    public function get_next(){
        return $this->next;
    }
    public function set_next($next){
        $this->next = $next;
    }

    public function get_value(){
        return $this->value;
    }

    public function delete(){
        $this->value = null;
    }
}

class Stack{
    private $top;
    private $max;
    private $size;

    public function __construct($max){
        $this->top = null;
        $this->size = 0;
        $this->max = $max;
    }

    public function is_empty(){
        return ($this->size == 0) ? true : false;
    }
    
    public function is_full(){
        return ($this->size == $this->max) ? true : false;
    }

    public function push($value){
        if($this->is_full()){
            throw new Exception("the stack is full");
        }
        $new_node = new Node($value); 
        if($this->top == null){
            $this->top = $new_node;
        }else{
            $new_node->set_next($this->top);
            $this->top = $new_node;
        }
        $this->size++;
    }

    public function pop(){
        if($this->is_empty()){
            throw new Exception("the stack is empty");
        }
        $this->top->delete();
        $this->top = $this->top->get_next();
        $this->size--;
    }
    
    public function top(){
        if($this->is_empty()){
            throw new Exception("the stack is empty");
        }
        return $this->top->get_value();
    }

    public function clear(){
        $current = $this->top;
        while($current != null){
            $current->delete();
            $current = $current->get_next();
        }
        $this->top = null;
        $this->size = 0;
    }

    public function reverse(){
        if($this->is_empty()){
            throw new Exception("the stack is empty");
        }
        $first = null;
        $current = $this->top;
        while($current != null){
            $next = $current->get_next();
            $current->set_next($first);
            $first = $current;
            $current = $next;
        }
        $this->top = $first;
    }

    public function display(){
        if($this->is_empty()){
            throw new Exception("the stack is empty");
        }
        $current = $this->top;
        while($current != null){
            echo $current->get_value() . "<br>";
            $current = $current->get_next();
        }
    }
}

try{
    $s = new Stack(5);
    $s->push(10);
    $s->push(20);
    $s->push(30);
    $s->push(40);
    $s->push(50);
    $s->pop();
    $s->push(30);
    echo $s->top();
    echo "<hr>";
    // $s->pop();
    // $s->pop();
    $s->reverse();
    $s->display();
    $s->clear();
    $s->display();
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}

?>