<?php 
class Node{
    private $value;
    private $next;
    private $previous;

    public function __construct($value){
        $this->value = $value;
        $this->next = null;
        $this->previous = null;
    }

    public function get_value(){
        return $this->value;
    }
    public function get_next(){
        return $this->next;

    }
    public function set_next($next){
        $this->next = $next;
    }
    public function get_previous(){
        return $this->previous;

    }
    public function set_previous($previous){
        $this->previous = $previous;
    }

    public function delete(){
        $this->value = null;
    }
}

class LinkedList{
    private $head;
    private $tail;
    private $size;
    public function __construct(){
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    public function is_empty(){
        return ($this->size == 0) ? true : false;
    }

    public function push_front($value){
        $node = new Node($value);
        if($this->is_empty()):
            $this->head = $node;
            $this->tail = $node;
        else:
            $node->set_next($this->head);
            $this->head->set_previous($node);
            $this->head = $node;
        endif;
        $this->size++;
    }

    public function push_back($value){
        $node = new Node($value);
        if($this->is_empty()){
            $this->head = $node;
            $this->tail = $node;
        }else{
            $node->set_previous($this->tail);
            $this->tail->set_next($node);
            $this->tail = $node;   
        }
        $this->size++;
    }

    public function pop_back(){
        if($this->is_empty()){
            throw new Exception("the list is empty");
        }
        $tail_node = $this->tail;
        if($this->tail->get_previous() == null){
            $this->head = null;
            $this->tail = null;
        }else{
            $this->tail = $this->tail->get_previous();
            $this->tail->set_next(null);
        }
        $tail_node->delete();
        $this->size--;
    }
    
    public function pop_front(){
        if($this->is_empty()){
            throw new Exception("the list is empty");
        }
        $head_node = $this->head;
        if($this->head->get_next() == null){
            $this->head = null;
            $this->tail = null;
        }else{
            $this->head = $this->head->get_next();
            $this->head->set_previous(null);
        }
        $head_node->delete();
        $this->size--;
    }
    
    public function insert_after($value, $after){
        if($this->is_empty()){
            throw new Exception("the list is empty");
        }
        $current = $this->head;
        while($current->get_value() != $after and $current != null){
            $current = $current->get_next();
        }
        if($current == null){
            throw new Exception("Value not found in the list");
        }
        $node = new Node($value);
        $node->set_next($current->get_next());
        $node->set_previous($current);
        if($current->get_next() == null){
            $this->tail = $node;
        }else{
            $current->get_next()->set_previous($node);
        }
        $current->set_next($node);
        $this->size++;
    }

    public function display() {
        $current = $this->head;
        while ($current != null) {
            echo $current->get_value() . "<br>";
            $current = $current->get_next();
        }
    }

}

try{

    $ll = new LinkedList();
    // 30 20 10
    $ll->push_front(10);
    $ll->push_front(20);
    $ll->push_front(30);
    $ll->insert_after(100, 10);
    $ll->insert_after(9, 100);
    $ll->pop_front();
    $ll->pop_back();
    $ll->pop_back();
    $ll->display();
}catch(Exception $e){
    echo "Error: " . $e;
}

?>
