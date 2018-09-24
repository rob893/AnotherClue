<?php

function CheckIfSeenRiddle($riddleId){
	
	if(!isset($_SESSION['riddlesSeen'])){
		return false;
	}
	
	if(in_array($riddleId, $_SESSION['riddlesSeen'])){
		return true;
	}
	else{
		return false;
	}
}

function EnsureUniqueRiddle($riddleId){
	if(CheckIfSeenRiddle($riddleId)){
		header("Location: index.php?step=".GetNextRiddle()."");
	}
}

function GetNextRiddle(){
	$numRiddles = 16;
	$randNum = rand(1, $numRiddles);
		
	$i = 0;
	while(CheckIfSeenRiddle($randNum)){
		$i++;
		if($i > $numRiddles){
			$randNum = -1;
			break;
		}
		
		$randNum = ($randNum + 1) % $numRiddles;
		
		if($randNum == 0){
			$randNum = $numRiddles;
		}
	}
	
	return $randNum;
}

function GetRandomImage($answerImages){
		
	$images = array_values(array_diff(scandir("images/"), array('..', '.', '1.PNG', '2.gif', '3.jpg')));
	
	$image = $images[array_rand($images)];
	
	$i = 0;
	while(in_array($image, $answerImages) && $i < count($images)){
		$image = $images[$i];
		$i++;
	}
	
	return $image;
}

function EchoImages($answerImageFileName){
	
	if(!isset($_GET['step'])){
		echo "No riddle id!";
		return;
	}
	
	$images = [ $answerImageFileName ];
	
	for($i = 0; $i < 11; $i++){
		array_push($images, GetRandomImage($images));
	}
	
	$randImageIndex = rand(0, count($images) - 1);
	$answer = $images[0];
	$images[0] = $images[$randImageIndex];
	$images[$randImageIndex] = $answer;
	
	echo "<h2>Pick an Answer</h2>";
	
	for($i = 0, $j = 0; $i < count($images); $i++, $j++){
		
		if($j == 3){
			$j = 0;
			echo "</div>";
		}
		
		if($i % 3 == 0){
			echo "<div class='row'>";
		}
		
		echo "
			<div class='col-sm align-self-center'>
				<form action='checkAnswer.php' method='post' enctype='multipart/form-data'> 
						<input type='hidden' name='response' id='response' value='".$images[$i]."' />
						<input type='image' src='images/".$images[$i]."' class='img-fluid mx-auto d-block' alt='Submit Form'  />
				</form>
			</div>
		";
	}
}

function CheckAnswer($riddleAnswer, $playerAnswer){
	return $riddleAnswer == $playerAnswer;
}
?>