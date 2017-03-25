<?php

print "---- Enter Number of Test Cases to run -----\n";
$handle = fopen ("php://stdin","r");
$testcases = fgets($handle);
$testcount = trim($testcases); 

print "---- Enter Length if Digits for Decent Number -----\n";
$i = 0;
while($i<$testcount){
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
    $testCases[] = $line;
    $i++;  
}

//$length = 11;
$characters = array(5,3);

//$testCases = array(1,3,5,11);

function findSequence($characters, $length, $str){
    global $result;    
    for($i=0; $i < count($characters); $i++){
        $newStr = $str."".$characters[$i];
        if(strlen($newStr)==$length){            
            $fivecount = substr_count($newStr,5);
            $threecount = substr_count($newStr,3);
            if($fivecount%3==0 && $threecount%5==0){               
                $result[] = $newStr;
            }           
        }        
        else{
           findSequence($characters, $length, $newStr);          
        }
    }
}

print "---- OUTPUT -----\n";
global $result;
foreach($testCases as $length){
  $result = array();
  findSequence($characters,$length,"");
  
  if(count($result)>0)
    print_r($result[0]);
  else
    print "-1";  
  
    print "\n";
}

