<?php

print "---- Enter Sentence to verify if it is pangram or not -----\n";
$handle = fopen ("php://stdin","r");
$testSentence = fgets($handle);
$testSentence = trim($testSentence);
$testSentence = strtolower($testSentence);
$allcharacters = count_chars($testSentence,3);
print "---- OUTPUT -----\n";
if(strlen($allcharacters)==27 && preg_match("/[a-z]/i", $allcharacters)){
    print "pangram\n";
}else{
    print "not pangram\n";
}