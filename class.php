<?php

class Aaa {

    private $question_word = "";
    private $random_pair = [];
    private $false_answers = [];
    private $correct_answer;
    private $answers = [];
    private $attempted_answer = "";
    var $interj = "";
    var $link = '';
    
    function __construct($words) {
        $this->words = $words;
        $this->set_random_pair();
        $this->set_answers();
        $this->set_question_word();
        
    }
    function set_question_word() {
        $this->question_word = key($this->get_random_pair());
    }
    
    function get_question_word(){
        return $this->question_word;
    }

    /**
     * set a random dictionary pair
     * @return type
     */
    function set_random_pair() {
         echo 'sizeof($this->words): ' . sizeof($this->words);
         $this->pre_dump($this->words, "words");
        // pick a random number to use for extracting the array element from the array of words
        $random_offset = rand(0, sizeof($this->words) - 1);
        $this->pre_dump($random_offset, "random_offset");
        //
        // use the random number to extract the pair
        $this->random_pair = array_slice($this->words, $random_offset, 1);
        $this->pre_dump($this->get_random_pair(), "random_pair");
        // remove the randommly picked pair of words out of the array
//        $this->pre_dump($words, "words");
        //unset($this->words[key($this->get_random_pair())]);
//        $this->pre_dump($words, "words");
    }
    
    function get_random_pair() {
        return $this->random_pair;
    }
    
    
    function set_correct_answer() {
//        $this->set_random_pair();
        
        $key = key($this->get_random_pair()); // ok
        $this->pre_dump($key, "set_correct_answer(): key of random pair"); // ok
        
        //$this->pre_dump($this->words, "set_correct_answer(): words");
        
        $this->pre_dump($this->words[$key], "set_correct_answer(): words[key]");
        //echo "correct answer value: " . $this->words[$key];
        $this->correct_asnwer = $this->words[$key];
        //$this->pre_dump($this->get_correct_answer(), "correct answer");
        //$_POST['correct_answer'] = $this->get_correct_answer();
        
    }
    
    function get_correct_answer(){
        //echo "corr ans: " . $this->correct_answer; 
        return $this->correct_answer;
    }
    
    function set_attempted_answer($attempted_answer) {
        $this->attempted_answer = $attempted_answer;
    }
    function get_attempted_answer() {
        return $this->attempted_answer;
    }
    
    function set_false_answers() {
        //echo "in set_false_answers";
        // pick 4 random words to serve as false answers
        $false_answer_keys = array_rand($this->words, 4);
        $this->pre_dump($false_answer_keys, "false_answer_keys");
        echo "<ul>";
        //foreach ($false_answer_keys as $question => $answer) {
        //    echo "<li>" . $answer . "</li> ";
        //}

        foreach ($false_answer_keys as $key) {
            echo "<li>" . $this->words[$key] . "</li> ";
            array_push($this->false_answers, $this->words[$key]);
        }
        echo "</ul>";
        $this->pre_dump($this->false_answers, "false answers");
    }
    
    function get_false_answers() {
        return $this->false_answers;
    }
    
    function pre_dump($stuff, $desc) {
        echo "<hr><pre>";
        echo "$" . $desc . ": ";
        var_dump($stuff);
        echo "</pre>";
    }
    
    function set_answers(){
        $this->set_random_pair();
        $this->set_correct_answer();
        $this->set_false_answers();
        
        $this->answers = array_merge($this->get_false_answers(), (array) $this->get_correct_answer());
        $this->pre_dump($this->answers, "answers");
        shuffle($this->answers);
        $this->pre_dump($this->answers, "answers");
    }
    
    function get_answers(){
        $this->pre_dump($this->answers, "answers");
        return $this->answers;
    }
            
    function set_messages() {
        if (array_key_exists('s', $_POST)) {

        $this->attempted_answer = $_POST['attempted_answer'];
        $this->correct_asnwer = $_POST['correct_answer'];
        echo "You chose: $this->attempted_answer";
        if ($this->attempted_answer == $this->correct_asnwer) {
            $this->interj = "YES!";
            $this->link = ' is ';
        } else {

            $this->interj = "Nope...";
            $this->link = ' is not ';
        }
    }
        
        
    }

}
