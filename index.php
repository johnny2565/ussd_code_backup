<?php
// Reads the variables sent via POST
$sessionId   = $_POST["sessionId"];  
$serviceCode = $_POST["serviceCode"]; 
$servicePhone = $_POST["phoneNumber"]; 
$text = $_POST["text"];
$uniqId = $_POST["unid"];

$connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
// if($connection)
// {
   
// }
// else{
//     // echo "Not Excuted";
// }
//This is the first menu screen
if ( $text == "" ) {
$response  = "CON Hi welcome, Please Vote using this app \n";
$response .= "Enter 1 to continue";
}
// Menu for a user who selects '1' from the first menu
// Will be brought to this second menu screen
else if ($text == "1") {
$response  = "CON  Pick an option below \n";
$response .= "1. Generate Unqiue Voter's ID \n";
$response .= "2. Vote \n";
// $response .= "3. Table for 6 \n";
// $response .= "4. Table for 8 \n";
}
//Menu for a user who selects '1' from the second menu above
// Will be brought to this third menu screen
else if ($text == "1*1") {
$response = "CON You are about to generate a Voter's ID  \n";
$response .= "Please Enter 1 to confirm \n";
}
else if ($text == "1*1*1") {
  if(checking($servicePhone) > 0 ){
    $response.='END You have created a voters id before please continue with voting ';
  }else{
    $response.= createNewRecord($servicePhone);
  } 
//  createNewRecord()
}
// I removed this code from  flow ************8
else if ($text == "1*1*1*1") {
$response = "END Your Table reservation for 2 has been booked";
}
// ************
else if ($text == "1*1*1*0") {
$response = "END Exercise your voting right";
}
// Menu for a user who selects "2" from the second menu above
// Will be brought to this fourth menu screen
else if ($text == "1*2") {
$response = "CON Select The Post You Want To Vote For \n";
$response .= "Enter 1 For Departmental President \n";
$response .= "Enter 2 For Departmental Vice President \n";
$response .= "Enter 3 For Departmental Secretary General \n";
$response .= "Enter 4 For Departmental WelFare \n";
$response .= "Enter 5 For Director Of Social \n";
// $response .= "Enter 6 For Director Of Sport \n";
// $response .= "Enter 7 For Director Of Academics \n";
}
// Menu for a user who selects "1" from the fourth menu screen
else if ($text == "1*2*1") {
$response = "CON Below are the departmental Presidential Candidates \n";
$response.= presidentialCandidates();
// $response .= "Enter 1 to Vote Ebuka \n";
// $response .= "Enter 2 to Vote Michael \n";
// $response .= "Enter 3 to Vote James \n";
}

// Begining Of Presidential Vote
    else if($text == "1*2*1*0") //Here if the voter decides to quit
    {
        $response = "END You did not cast any vote";
    }
    elseif ($text == "1*2*1*1")
    {
        $response = "CON Vote Status \n";
        $response.= checkForEligibility($servicePhone);
        $response.= "\n END ";
    }

    elseif ($text == "1*2*1*2")
    {
        $response = "CON Vote Status \n";
        $response.= checkForEligibility($servicePhone);
        $response.= "\n END ";
    }
    
    elseif ($text == "1*2*1*3")
    {
        $response = "CON Vote Status \n";
        $response.= checkForEligibility($servicePhone);
        $response.= "\n END ";
    }

    elseif ($text == "1*2*1*4")
    {
        $response = "CON Vote Status \n";
        $response.= checkForEligibility($servicePhone);
        $response.= "\n END ";
    }

    elseif ($text == "1*2*1*5")
    {
        $response = "CON Vote Status \n";
        $response.= checkForEligibility($servicePhone);
        $response.= "\n END ";
    }
    
// End Of Presidency Vote




//Begining of the vice president vote
else if ($text == "1*2*2") {
  $response = "CON Please select your candidate \n";
  $response.= vicePresidentialCandidates();
  $response.= "END Enter 0 to Exit";
}

else if ($text == "1*2*2*0") {
    // $response = vicePresidentialCandidates();
    $response= "END You did not vote any one";
  }

// End of vice president vote

else if ($text == "1*2*2*1") {

    $response = "CON Please vote your candidate \n";
    $response.= checkForEligibility2($servicePhone);
    $response.= "\n END";
}

else if ($text == "1*2*2*2") {
    $response = "CON Vote Status \n";
    $response.= checkForEligibility2($servicePhone);
    $response.= "\n END";
    // $response = "END Your Table reservation for 4 has been canceled";
}

else if ($text == "1*2*2*3") {
    $response = "CON Vote Status \n";
    $response.= checkForEligibility2($servicePhone);
    $response.= "\n END";
}

else if ($text == "1*2*2*4") {
    $response = "CON Vote Status \n";
    $response.= checkForEligibility2($servicePhone);
    $response.= "\n END";
}

else if ($text == "1*2*2*5") {
    $response = "CON Vote Status \n";
    $response.= checkForEligibility2($servicePhone);
    $response.= "\n END";
}
// Menu for a user who enters "3" from the second menu above
// Will be brought to this fifth menu screen
else if ($text == "1*2*3") {
$response = "CON Select the Candidate You Want To Vote Secretary \n";
$response .= secretaryCandidates();
$response .= "\n END Enter 0 to Exit";
}

else if ($text == "1*2*3*0") {
    $response = "END You did not cast a vote";
}
// Menu for a user who enters "1" from the fifth menu
else if ($text == "1*2*3*1") {
$response= "CON Vote Status";
$response.=checkForEligibility3($servicePhone);
$response.= "\n End";
}

else if ($text == "1*2*3*2") {
    $response= "CON Vote Status";
    $response.=checkForEligibility3($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*3*3") {
    $response= "CON Vote Status";
    $response.=checkForEligibility3($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*3*4") {
    $response= "CON Vote Status";
    $response.=checkForEligibility3($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*3*5") {
    $response= "CON Vote Status";
    $response.=checkForEligibility3($servicePhone);
    $response.= "\n End";
}



else if ($text == "1*2*4") {
    $response= "CON Select the candidate you want to vote";
    $response.= welfareCandidate();
    $response.= "\n End";
}

else if ($text == "1*2*4*0") {
    $response= "CON You did not cast a vote ";
    // $response.= welfareCandidate();
    $response.= "\n End";
}

else if ($text == "1*2*4*1") {
    $response= "CON Vote Status";
    $response.=checkForEligibility4($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*4*2") {
    $response= "CON Vote Status";
    $response.=checkForEligibility4($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*4*3") {
    $response= "CON Vote Status";
    $response.=checkForEligibility4($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*4*4") {
    $response= "CON Vote Status";
    $response.=checkForEligibility4($servicePhone);
    $response.= "\n End";
}

else if ($text == "1*2*4*5") {
    $response= "CON  Vote Status";
    $response.=checkForEligibility4($servicePhone);
    $response.= "\n End";
}


else if($text == "1*2*5"){
   $response="CON Select the candidate you want to vote for:";
   $response.= socialCandidate();
   $response.="\n END "; 
}

else if($text == "1*2*5*0"){
    $response ="\n END  You did not cast a vote"; 
 }

 else if($text == "1*2*5*1"){
    $response="CON Vote Status";
    $response.= checkForEligibility5($servicePhone);
    $response.="\n END "; 
 }

 else if($text == "1*2*5*2"){
    $response="CON Vote Status";
    $response.= checkForEligibility5($servicePhone);
    $response.="\n END "; 
 }

 else if($text == "1*2*5*3"){
    $response="CON Vote Status";
    $response.= checkForEligibility5($servicePhone);
    $response.="\n END "; 
 }

 else if($text == "1*2*5*4"){
    $response="CON Vote Status";
    $response.= checkForEligibility5($servicePhone);
    $response.="\n END "; 
 }
 else if($text == "1*2*5*5"){
    $response="CON Vote Status";
    $response.= checkForEligibility5($servicePhone);
    $response.="\n END "; 
 }



    
    
    
    

else if ($text == "1*3*1*1") {
$response = "END Your Table reservation for 6 has been booked";
}
else if ($text == "1*3*1*0") {
$response = "END Your Table reservation for 6 has been canceled";
}
// Menu for a user who enters "4" from the second menu above
// Will be brought to this sixth menu screen
else if ($text == "1*4") {
$response = "CON You are about to book a table for 8 \n";
$response .= "Please Enter 1 to confirm \n";
}
// Menu for a user who enters "1" from the sixth menu
else if ($text == "1*4*1") {
$response = "CON Table for 8 cost -N- 250,000.00 \n";
$response .= "Enter 1 to continue \n";
$response .= "Enter 0 to cancel";
}
else if ($text == "1*4*1*1") {
$response = "END Your Table reservation for 8 has been booked";
}
else if ($text == "1*4*1*0") {
$response = "END Your Table reservation for 8 has been canceled";
}
//echo response
header('Content-type: text/plain');
echo $response;



function generateToken()
{
    $time = time();
    $sub = substr($time, 5);
    return $sub;
    
}

function insertGeneratedToken($token,$phonenumber)
{
    pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $code = "INSERT INTO voter(token, phonenumber) values ('$token', '$phonenumber' )";
    $gen_token = pg_query($code);
    // Populating the voted
    $voted = "INSERT INTO voted(token,post1, post2, post3, post4, post5, post6, post7 ) values ('$token', '', '', '', '', '', '', '')";
    pg_query($voted); 

    if($gen_token){
        return true;
    }else{
        return false;
    }
}

function createNewRecord($phonenumber) {
        // pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
        $response = "CON Please Keep it Safe \n";
        $response.= " Your Voters ID is ".generateToken();
        $resObtained = insertGeneratedToken(generateToken(),$phonenumber);  
        $response .= "\n Enter 0 Exit to ";
        return $response;
        
     
}

function presidentialCandidates() {
    $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $collect_aspirants = " SELECT * FROM aspirants WHERE position NOT IN ('secretary', 'welfare', 'social', 'sport') ";
    $result = pg_query($connection, $collect_aspirants);
    $count = 1;
    while($row = pg_fetch_array($result)){
        
        if(strtolower($row['position']) !="president" )
        {
            continue;
        }
        else
        {
            $response .= " Enter ".$count." to vote  ".$row['fullname']."<br/>";
        }
        ++$count;

    }
 
    $response .= "\n Enter 0 to Exit  ";
    return $response;
    
 
}


function vicePresidentialCandidates() {
    $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $collect_aspirants = " SELECT * FROM aspirants WHERE position NOT IN ('secretary', 'welfare', 'social', 'sport') ";
    $result = pg_query($connection, $collect_aspirants);
    $count = 1;
    while($row = pg_fetch_array($result)){
        
        if(strtolower($row['position']) !="vice president" )
        {
            continue;
        }
        else
        {
            $response.= " Enter ".$count." to vote  ".$row['fullname']."<br/>";
        }

        ++$count;
    }
 
    // $response.= "\n Enter 0 to Exit  ";
    return $response;
    
 
}


function secretaryCandidates() {
    $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $collect_aspirants = " SELECT * FROM aspirants WHERE position NOT IN ('secretary', 'welfare', 'social', 'sport') ";
    $result = pg_query($connection, $collect_aspirants);
    $count = 1;
    while($row = pg_fetch_array($result)){
        
        if(strtolower($row['position']) !="secretary" )
        {
            continue;
        }
        else
        {
            $response.= " Enter ".$count." to vote  ".$row['fullname']."<br/>";
        }

        ++$count;
    }
 
    // $response.= "\n Enter 0 to Exit  ";
    return $response;
    
 
}

function welfareCandidate()
{
    $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $collect_aspirants = " SELECT * FROM aspirants WHERE position NOT IN ('secretary', 'welfare', 'social', 'sport') ";
    $result = pg_query($connection, $collect_aspirants);
    $count = 1;
    while($row = pg_fetch_array($result)){
        
        if(strtolower($row['position']) !="welfare" )
        {
            continue;
        }
        else
        {
            $response.= " Enter ".$count." to vote  ".$row['fullname']."<br/>";
        }

        ++$count;
    }
 
    // $response.= "\n Enter 0 to Exit  ";
    return $response;

}

function socialCandidate()
{

    $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $collect_aspirants = " SELECT * FROM aspirants WHERE position NOT IN ('secretary', 'welfare', 'social', 'sport') ";
    $result = pg_query($connection, $collect_aspirants);
    $count = 1;
    while($row = pg_fetch_array($result)){
        
        if(strtolower($row['position']) !="social" )
        {
            continue;
        }
        else
        {
            $response.= " Enter ".$count." to vote  ".$row['fullname']."<br/>";
        }

        ++$count;
    }
 
    // $response.= "\n Enter 0 to Exit  ";
    return $response;


}



function checking($servicePhone)
{
    $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    $check = " SELECT * FROM voter WHERE phonenumber = '$servicePhone' ";
    $phonenumberFound = pg_query($connection, $check);
    $result = pg_num_rows($phonenumberFound);
    return $result;
}



function checkForEligibility($phonenumber)
    {
        // $phonenumber = '+2348125125489';
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
        $checkE = "SELECT token FROM voter WHERE phonenumber = '$phonenumber' ";  
        $checkDB = pg_query($connection, $checkE);
        $numrow = pg_fetch_array($checkDB);
        // $all_result = pg_num_array($result);
        // print_r($numrow)."<br/>";
        // return $numrow["token"];

        if($numrow["token"] > 0)
        {
            $response.= castVote($numrow["token"]); 
            // $response = $numrow["token"]; 
            return $response;
        }
        else{
            $response.='Please go and generate a unique ID first';
            return $response;

        }
    }

    function castVote($token){
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    
        //Check if voted for before
        $chkVoted =  "SELECT  post1 FROM voted WHERE token = '$token' ";  
        $query = pg_query($connection,$chkVoted);
        $numrow = pg_fetch_array($query);
        // return $numrow["post1"]."".$numrow["token"];
        if($numrow["post1"] == "" )
        {
            $update = "UPDATE voted SET post1= '1' WHERE token = '$token' ";
            $action = pg_query($connection,$update);
            $result = pg_affected_rows($action);
            $actionRes = $result;
            $res= 'You have Successfully Voted';
            return $res;
             
        }
        else{
            $res="It seems you have voted before";
            return $res;
        }

    }

    // Casting Two

    function checkForEligibility2($phonenumber)
    {
        // $phonenumber = '+2348125125489';
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
        $checkE = "SELECT token FROM voter WHERE phonenumber = '$phonenumber' ";  
        $checkDB = pg_query($connection, $checkE);
        $numrow = pg_fetch_array($checkDB);
        // $all_result = pg_num_array($result);
        // print_r($numrow)."<br/>";
        // return $numrow["token"];

        if($numrow["token"] > 0)
        {
            $response.= castVote2($numrow["token"]); 
            // $response = $numrow["token"]; 
            return $response;
        }
        else{
            $response.='Please go and generate a unique ID first';
            return $response;

        }
    }



    function castVote2($token)
    {
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    
        //Check if voted for before
        $chkVoted =  "SELECT  post2 FROM voted WHERE token = '$token' ";  
        $query = pg_query($connection,$chkVoted);
        $numrow = pg_fetch_array($query);
        // return $numrow["post1"]."".$numrow["token"];
        if($numrow["post2"] == "" )
        {
            $update = "UPDATE voted SET post2= '1' WHERE token = '$token' ";
            $action = pg_query($connection,$update);
            $result = pg_affected_rows($action);
            $actionRes = $result;
            $res= 'You have Successfully Voted';
            return $res;
             
        }
        else{
            $res="It seems you have voted before";
            return $res;
        }

    }

    function checkForEligibility3($phonenumber)
    {
        // $phonenumber = '+2348125125489';
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
        $checkE = "SELECT token FROM voter WHERE phonenumber = '$phonenumber' ";  
        $checkDB = pg_query($connection, $checkE);
        $numrow = pg_fetch_array($checkDB);
        // $all_result = pg_num_array($result);
        // print_r($numrow)."<br/>";
        // return $numrow["token"];

        if($numrow["token"] > 0)
        {
            $response.= castVote3($numrow["token"]); 
            // $response = $numrow["token"]; 
            return $response;
        }
        else{
            $response.='Please go and generate a unique ID first';
            return $response;

        }
    }



    function castVote3($token)
    {
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    
        //Check if voted for before
        $chkVoted =  "SELECT  post3 FROM voted WHERE token = '$token' ";  
        $query = pg_query($connection,$chkVoted);
        $numrow = pg_fetch_array($query);
        // return $numrow["post1"]."".$numrow["token"];
        if($numrow["post3"] == "" )
        {
            $update = "UPDATE voted SET post3 = '1' WHERE token = '$token' ";
            $action = pg_query($connection,$update);
            $result = pg_affected_rows($action);
            $actionRes = $result;
            $res= 'You have Successfully Voted';
            return $res;
             
        }
        else{
            $res="It seems you have voted before";
            return $res;
        }

    }


    function checkForEligibility4($phonenumber)
    {
        // $phonenumber = '+2348125125489';
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
        $checkE = "SELECT token FROM voter WHERE phonenumber = '$phonenumber' ";  
        $checkDB = pg_query($connection, $checkE);
        $numrow = pg_fetch_array($checkDB);
        // $all_result = pg_num_array($result);
        // print_r($numrow)."<br/>";
        // return $numrow["token"];

        if($numrow["token"] > 0)
        {
            $response.= castVote4($numrow["token"]); 
            // $response = $numrow["token"]; 
            return $response;
        }
        else{
            $response.='Please go and generate a unique ID first';
            return $response;

        }
    }



    function castVote4($token)
    {
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    
        //Check if voted for before
        $chkVoted =  "SELECT  post4 FROM voted WHERE token = '$token' ";  
        $query = pg_query($connection,$chkVoted);
        $numrow = pg_fetch_array($query);
        // return $numrow["post1"]."".$numrow["token"];
        if($numrow["post4"] == "" )
        {
            $update = "UPDATE voted SET post4 = '1' WHERE token = '$token' ";
            $action = pg_query($connection,$update);
            $result = pg_affected_rows($action);
            $actionRes = $result;
            $res= 'You have Successfully Voted';
            return $res;
             
        }
        else{
            $res="It seems you have voted before";
            return $res;
        }

    }


    function checkForEligibility5($phonenumber)
    {
        // $phonenumber = '+2348125125489';
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
        $checkE = "SELECT token FROM voter WHERE phonenumber = '$phonenumber' ";  
        $checkDB = pg_query($connection, $checkE);
        $numrow = pg_fetch_array($checkDB);
        // $all_result = pg_num_array($result);
        // print_r($numrow)."<br/>";
        // return $numrow["token"];

        if($numrow["token"] > 0)
        {
            $response.= castVote5($numrow["token"]); 
            // $response = $numrow["token"]; 
            return $response;
        }
        else{
            $response.='Please go and generate a unique ID first';
            return $response;

        }
    }



    function castVote5($token)
    {
        $connection = pg_connect("host=ec2-3-213-228-206.compute-1.amazonaws.com dbname=dekg3d43m01ak4 user=ungxjvmznyohtl password=618aa5ddefd4ea83f6709974f292f2fd0e2138c5d31b054a6821e9c801424977");
    
        //Check if voted for before
        $chkVoted =  "SELECT  post5 FROM voted WHERE token = '$token' ";  
        $query = pg_query($connection,$chkVoted);
        $numrow = pg_fetch_array($query);
        // return $numrow["post1"]."".$numrow["token"];
        if($numrow["post5"] == "" )
        {
            $update = "UPDATE voted SET post5 = '1' WHERE token = '$token' ";
            $action = pg_query($connection,$update);
            $result = pg_affected_rows($action);
            $actionRes = $result;
            $res= 'You have Successfully Voted';
            return $res;
             
        }
        else{
            $res="It seems you have voted before";
            return $res;
        }

    }




?>


