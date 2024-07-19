<?php 
class Queue{

    private $arr;
    private $front;
    private $rear;
    private $size;
    private $max;

    public function __construct($max){
        $this->max = abs($max);
        $this->size = 0;
        $this->front = 0;
        $this->rear = -1;
    }

    public function is_empty(){
        if($this->size == 0):
            return true;
        else:
            return false;
        endif;
    }

    public function is_full(){
        return ($this->size == $this->max) ? true : false;
    }

    public function get_size(){
        return $this->size;
    }

    public function enqueue($value){
        if($this->is_full()){
            throw new Exception("the queue is full");
        }
        $this->rear = (1 + $this->rear) % $this->max;
        $this->arr[$this->rear] = $value;
        $this->size++;
    }

    public function dequeue(){
        if($this->is_empty()){
            throw new Exception("the queue is empty");
        }
        unset($this->arr[$this->front]);
        $this->front = (1 + $this->front) % $this->max;
        $this->size--;
    }
    
    public function get_front(){
        if($this->is_empty()){
            throw new Exception("the queue is empty");
        }
        return $this->arr[$this->front];
    }
    
    public function display(){
        if($this->is_empty()){
            throw new Exception("the queue is empty");
        }
        $i = $this->front;
        while($i != $this->rear){
            echo $this->arr[$i] . "<br>";
            $i=($i+1)%$this->max;
        }
        echo $this->arr[$this->rear] . "<br>";
    }

    public function clear(){
        $this->arr = [];
        $this->size = 0;
    }
}

$q = new Queue(3);
try{
    $q->enqueue(1);
    $q->enqueue(2);
    $q->enqueue(3);
    $q->dequeue();
    $q->display();
    $q->clear();
    echo "<hr>";
    echo $q->get_size();
}catch(Exception $e){
    echo "Error: " . $e;
}

?>