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

    public function set_value($value){
        $this->value = $value;
    }
}

class Queue{
    private $front;
    private $rear;
    private $size;
    private $max;

    public function __construct($max){
        $this->front = null;
        $this->rear = null;
        $this->size = 0;
        $this->max = $max;
    }

    public function is_empty(){
        return ($this->size<=0) ? true : false;
    }

    public function is_full(){
        return ($this->size >= $this->max) ? true : false ;
    }

    public function enqueue($value){
        if($this->is_full()){
            throw new Exception("the queue is full");
        }
        $new_node = new Node($value);
        if($this->is_empty()){
            $this->front = $new_node;
            $this->rear = $new_node;
        }else{
            $this->rear->set_next($new_node);
            $this->rear = $new_node;
        }
        $this->size++;
    }

    public function dequeue(){
        if($this->is_empty()){
            throw new Exception("the queue is empry");
        }
        $this->front->set_value(null);
        $this->front = $this->front->get_next();
        $this->size--;
    }

    public function get_front(){
        if($this->is_empty()){
            throw new Exception("the queue is empty");
        }
        return $this->front->get_value();
    }

    public function clear(){
        if($this->is_empty()){
            return;
        }
        $current = $this->front;
        while($current != null){
            $current->set_value(null);
            $current = $current->get_next();
        }
        $this->front = null;
        $this->rear = null;
        $this->size = 0;
    }

    public function display(){
        if($this->is_empty()){
            throw new Exception("the queue is empty");
        }
        $current = $this->front;
        while($current != null){
            echo $current->get_value() . "<br>";
            $current = $current->get_next();
        }
    }
}


try{
    $q = new Queue(5);
    $q->enqueue(10);
    $q->enqueue(20);
    $q->enqueue(30);
    $q->dequeue();
    $q->dequeue();
    $q->enqueue(40);
    $q->enqueue(50);
    $q->enqueue(60);
    $q->enqueue(70);
    echo $q->get_front();
    echo "<hr>";
    $q->display();
    echo "<hr>";
    $q->clear();
    $q->display();
}catch(Exception $e){
    echo "ERROR: " . $e->getMessage();
}

?>