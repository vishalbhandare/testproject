<?php

print "---- Enter Number of Test Cases to run -----\n";
$handle = fopen ("php://stdin","r");
    $testcases = fgets($handle);
    $testcount = trim($testcases); 
print "---- Enter Sentence to verify if it is funny or not -----\n";
$i = 0;
while($i<$testcount){
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $testCases[] = $line;
    $i++;  
}


foreach($testCases as $texttoCheck){
    $texttoCheck = trim($texttoCheck);
    $funny = true;    
    for($i=0,$j=strlen($texttoCheck)-1;$i+1 <= $j;$i++,$j--){       
        if(
           abs(ord($texttoCheck[$i+1]) - ord($texttoCheck[$i]))
                !=
           abs(ord($texttoCheck[$j-1]) - ord($texttoCheck[$j]))
          ){ // if No Ascii Difference matching then not funny
            $funny = false;
           break;
        }        
    }
    if($funny){
        print "funny\n";
    }else{
        print "not funny\n";
    }    
}
