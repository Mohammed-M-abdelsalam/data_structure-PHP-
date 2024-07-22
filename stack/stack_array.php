<?php 
    class Stack{
        private $arr;
        private $top;
        private $max;
        public function __construct($max){
            $this->arr = [];
            $this->top = -1;
            $this->max = $max;
        }

        public function is_empty(){
            if($this->top < 0){
                return true;
            }else{
                return false;
            }
        }

        public function is_full(){
            if($this->top == $this->max -1){
                return true; 
            }else{
                return false;
            }
        }

        public function count(){
            return $this->top + 1;
        }

        public function push($value){
            if($this->is_full()){
            throw new Exception("The stack is full"); 
            }
            $this->top++;  
            $this->arr[$this->top] = $value;
        }

        public function pop(){
            if($this->is_empty() ){
                throw new Exception("The stack is empty");
            }
            $value = $this->arr[$this->top];
            unset($this->arr[$this->top]);
            $this->top--;
            return $value; 
        }

        public function display(): void{
            if($this->is_empty()){
                throw new Exception("The stack is empty");
            }
            for($i=$this->top; $i>=0; $i--){
                echo $this->arr[$i] . "<br>";
            }
        }

        public function top(){
            if($this->is_empty()){
                throw new Exception("The stack is empty");
            }
            return $this->arr[$this->top];
        }
        
        public function clear(): void{
            $this->arr = [];
            $this->top = -1;
        }

        public function reverse(){
            for($i=count($this->arr)-1; $i>=0; $i--){
                $arr[] = $this->arr[$i];
            }
            $this->arr = $arr;
        }
    }

    try{
        $stack1 = new Stack(5);
        $stack1->push(10);
        $stack1->push(20);
        $stack1->push(30);
        $stack1->push(40);
        $stack1->push(50);
        $stack1->pop();
        $stack1->display();
        echo "<hr>";
        echo $stack1->top();
        echo "<hr>";
        echo $stack1->reverse();
        $stack1->pop();
        echo $stack1->display();
        echo "<hr>";
        $stack1->clear();
        $stack1->display();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
    }


?>