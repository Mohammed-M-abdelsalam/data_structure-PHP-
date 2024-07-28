<?php
class Stack{
    private $arr;
    private $top;
    private $size;

    public function __construct(){
        $this->arr = [];
        $this->size = 0;
        $this->top = -1;
    }

    public function is_empty(){
        return ($this->size == 0) ? true : false;
    }

    public function get_top(){
        if($this->is_empty()){
            echo "the stack is empty";
            return;
        }
        return $this->arr[$this->top];
    }

    
    public function push($value){
        $this->top++;
        $this->size++;
        $this->arr[$this->top] = $value;
    }
    
    public function pop(){
        if($this->is_empty()){
            echo "the stack is empty";
            return;
        }
        $this->arr[$this->top] = null;
        $this->top--;
        $this->size--;
        
    }
}
function is_pair($s1, $s2){
    if($s1 == "{" and $s2 == "}"){
        return true;
    }elseif($s1 == "[" and $s2 == "]"){
        return true;
    }elseif($s1 == "(" and $s2 == ")"){
        return true;
    }
    return false;
}


function is_balanced($str){
    
    $stack = new Stack();
    for($i=0; $i<strlen($str); $i++){
        if($str[$i]=="{" or $str[$i]=="[" or $str[$i]=="("){
            $stack->push($str[$i]);
        }elseif($str[$i]=="}" or $str[$i]=="]" or $str[$i]==")"){
            if($stack->is_empty() or !is_pair($stack->get_top(), $str[$i])){
                return false;
            }else{
                $stack->pop();
            }
        }
    }
    return ($stack->is_empty()) ? true : false;
}

var_dump(is_balanced("{{}}[]()"));

?>