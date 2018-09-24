<?php
function GetNextPuzzle(){
	$randNum = rand(1, 8);
	
	if(!isset($_SESSION['puzzlesSeen'])){
		return $randNum;
	}
		
	$i = 0;
	while(in_array($randNum, $_SESSION['puzzlesSeen'])){
		$i++;
		if( $i > 8 ){
			$randNum = -1;
			break;
		}
		
		$randNum = ($randNum + 1) % 8;
		
		if($randNum == 0){
			$randNum = 8;
		}
	}
	
	return $randNum;
}

function GetRandomImage($answerImages){
	$images = array(
			"cat1.jpg", "egg.jpg", "earth.jpg", "et.jpg", "1.PNG", "2.gif", "3.jpg", "baby.jpg", "gandalf.jpg",
			"hulk.jpg", "ml.jpg", "pickle.jpg", "ribcage.jpg", "shark.jpg", "sheep.jpg", "kju.jpg", "eagle.jpg",
			"potato.jpg", "hippo.jpg", "pig.jpg", "banana.jpg", "chip.jpg", "duck.jpg", "yoda.jpg", "washington.jpg",
			"shrek.jpg", "shirt.jpg"
		);
	
	$urlEnd = $images[array_rand($images)];
	
	$i = 0;
	while(in_array($urlEnd, $answerImages) && $i < count($images)){
		$urlEnd = $images[$i];
		$i++;
	}
	
	return $urlEnd;
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
						<input type='hidden' name='riddleId' id='riddleId' value='".$_GET['step']."' />
						<input type='hidden' name='response' id='response' value='".$images[$i]."' />
						<input type='image' src='images/".$images[$i]."' class='img-fluid mx-auto d-block' alt='Submit Form'  />
				</form>
			</div>
		";
	}
}

function CheckAnswer($riddleId, $answer){
	
	switch($riddleId){
		case 1:
			if($answer == "potato.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 2:
			if($answer == "cat1.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 3:
			if($answer == "banana.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 4:
			if($answer == "egg.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 5:
			if($answer == "duck.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 6:
			if($answer == "pickle.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 7:
			if($answer == "ribcage.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		case 8:
			if($answer == "shirt.jpg"){
				return true;
			}
			else{
				return false;
			}
			break;
		default:
			return false;
	}
}
?>