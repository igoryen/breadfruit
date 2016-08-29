<?php
include 'class.php';
$app_name = "Breadfruit";

//function pre_dump($stuff, $desc) {
//    echo "<hr><pre>";
//    echo "$" . $desc . ": ";
//    var_dump($stuff);
//    echo "</pre>";
//}

//pre_dump($_POST, "POST");

$words = [
        "apple" => "яблоко",
        "pear" => "груша",
        "melon" => "дыня",
        "grape" => "виноград",
        "watermelon" => "арбуз",
        "blueberry" => "голубика",
        "cucumber" => "огурец"
];

$aaa = new Aaa($words);

//$aaa->words = [
//    "apple" => "яблоко",
//    "pear" => "груша",
//    "melon" => "дыня",
//    "grape" => "виноград",
//    "watermelon" => "арбуз",
//    "blueberry" => "голубика",
//    "cucumber" => "огурец"
//];

// pre_dump($aaa->words, "words");
//echo sizeof($aaa->words);

// pick a random number to use for extracting the array element from the array of words
//$random_offset = rand(0, sizeof($aaa->words) - 1);
//pre_dump($random_offset, "random_offset");

// use the random number to extract the pair
//$random_pair = array_slice($aaa->words, $random_offset, 1);
//pre_dump($aaa->words, "words");
//pre_dump($random_pair, "chosen_pair");
//echo "<br>" . sizeof($aaa->words) . " words left<br>";

//$question_word = key($random_pair);
//pre_dump($question_word, "question_word");


//echo " chosen pair's key - " . key($random_pair) . ' ';

//$correct_asnwer = $aaa->words[key($random_pair)];
//$_POST['correct_answer'] = $correct_asnwer;
//pre_dump($correct_asnwer, "correct answer");




// remove the randommly picked word out of the array
//unset($aaa->words[$random_pair]);

//echo " chosen pair's key - " . key($random_pair) . ' ';
//unset($aaa->words[key($random_pair)]);
//pre_dump($aaa->words, "words");

// pick 4 random words to serve as false answers
//$false_answer_keys = array_rand($aaa->words, 4);
//pre_dump($false_answer_keys, "false_answer_keys");
//echo "<ul>";
////foreach ($false_answer_keys as $question => $answer) {
////    echo "<li>" . $answer . "</li> ";
////}
//$false_answers = [];
//
//foreach ($false_answer_keys as $key) {
//    echo "<li>" . $aaa->words[$key] . "</li> ";
//    array_push($false_answers, $aaa->words[$key]);
//}
//echo "</ul>";

//pre_dump($false_answers, "false answers");

//$answers = array_merge($false_answers, (array) $correct_asnwer);
//pre_dump($answers, "answers");
//shuffle($answers);
//pre_dump($answers, "answers");

//if (array_key_exists('s', $_POST)) {
//
//    $attempted_answer = $_POST['attempted_answer'];
//    $correct_asnwer = $_POST['correct_answer'];
//    echo "You chose: $attempted_answer";
//    if ($attempted_answer == $correct_asnwer) {
//        $interj = "YES!";
//        $link = ' is ';
//    } else {
//        
//        $interj = "Nope...";
//        $link = ' is not ';
//    }
//}
?>

<html>
    <head>
        <title><?php echo $app_name; ?></title>
        <style>
            body {
                background-color: whitesmoke;
                font-family: sans-serif, "Consolas";
                margin: 2%;
            }
            .a_container {
                background-color: lavender;
                margin: 2%;
            }
            #item {
                background-color: lightcyan;
                margin: 2%;
                padding: 2%;
            }
            .word {
                font-size: 2em;
                text-align: center;
            }
            #answers {
                background-color: floralwhite;
                margin: 2%;
                padding: 2%;
            }
            #submitting {
                background-color: floralwhite;
                color: gray;
                font-weight: bold;
                margin: 2%;
                padding: 2%;
                
            }
            .question {
                color: red;
                font-size: larger;
            }
            .attempt {
                color: blue;
                font-size: larger;
            }
            .correct {
                color: green;
                font-size: larger;
            }
        </style>
    </head>
    <body>
        <h3><?php echo $app_name; ?></h3>
        <div class="a_container">
            <div id="item">
                item
                <div class="word"><?php echo $aaa->get_question_word(); ?></div>
            </div>
            <div id="answers">
                <form action="" method="POST">
                    <?php foreach ($aaa->get_answers() as $a) { ?>
                        <input type="radio" name="attempted_answer" value="<?php echo $a; ?>"><?php echo $a; ?><br />
                    <?php } ?>

                    <input type="submit" name="s" value="Next"/> 
                </form>
            </div>
            <?php $_POST['correct_answer'] = $aaa->get_correct_answer(); ?>
            
            <div id="submitting">
                <span class="interj"><?php echo $aaa->interj; ?></span>
                <span class="question">"<?php echo $aaa->get_question_word(); ?>"</span>
                <span><?php echo $aaa->link; ?></span>
                <span class="attempt">"<?php echo $aaa->get_attempted_answer(); ?>".</span>
                The correct answer is  <span class="correct">"<?php echo $aaa->get_correct_answer(); ?>".</span>
            </div>


        </div>


    </body>

</html>


