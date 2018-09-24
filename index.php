<?php
require_once('header.php');
session_start();

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
		
		if($i == $randImageIndex){
			echo "
				<div class='col-sm align-self-center'>
					<form action='#' method='post' enctype='multipart/form-data'> 
						<input type='hidden' name='submit' id='submit' value='1' />
						<input type='image' src='images/".$images[$i]."' class='img-fluid mx-auto d-block' alt='Submit Form'  />
					</form>
				</div>
			";
		}
		else {
			echo "
				<div class='col-sm align-self-center'>
					<form action='#' method='post' enctype='multipart/form-data'> 
							<input type='hidden' name='submit' id='submit' value='0' />
							<input type='image' src='images/".$images[$i]."' class='img-fluid mx-auto d-block' alt='Submit Form'  />
					</form>
				</div>
			";
		}
	}
}

if(isset($_POST['submit'])){
	
	if($_POST['submit'] != 1){
		header("Location: index.php?step=-1");
		return;
	}
	
	if(!isset($_SESSION['points'])){
		$_SESSION['points'] = 1;
	}
	else{
		$_SESSION['points']++;
	}
	
	$randNum = GetNextPuzzle();
	
	if($_SESSION['points'] >= 5){
		$randNum = -2;
	}
	
	if($randNum == -1){
		echo "<p>Soemthing went wrong!</p>";
		return;
	}
	
	header("Location: index.php?step=".$randNum."");
	return;
}

if(isset($_SESSION['points']) && $_SESSION['points'] < 5 && isset($_GET['step']) && $_GET['step'] != -1){
	$pointsLeft = 5 - $_SESSION['points'];
	echo "
		<h1>Correct!</h1>
		<h2>Score</h2>
	";
	
	if($_SESSION['points'] == 1){
		echo "<p>You have ".$_SESSION['points']." point! Get ".$pointsLeft." more points to win!</p>";
	}
	else if($_SESSION['points'] == 4){
		echo "<p>You have ".$_SESSION['points']." points! Get ".$pointsLeft." more point to win!</p>";
	}
	else{
		echo "<p>You have ".$_SESSION['points']." points! Get ".$pointsLeft." more points to win!</p>";
	}
}

if(isset($_GET['step']) && $_GET['step'] == -1){
	$_SESSION['points'] = 0;
	unset($_SESSION['points']);
	unset($_SESSION['puzzlesSeen']);
	
	$randNum = GetNextPuzzle();
	
	echo "
		<h2>You lose!</h2>
		<br>
		<img src='images/2.gif' class='img-fluid' alt='Responsive image'>
		<br><br>
		<a href='index.php?step=".$randNum."' class='btn btn-info' role='button'>Try Again</a>
	";
}
else if(isset($_SESSION['points']) && $_SESSION['points'] >= 5 && isset($_GET['step']) && $_GET['step'] == -2){
	$_SESSION['points'] = 0;
	unset($_SESSION['points']);
	unset($_SESSION['puzzlesSeen']);
	
	$randNum = GetNextPuzzle();
	
	echo "
		<h2>You win!</h2>
		<br>
		<img src='images/3.jpg' class='img-fluid' alt='Responsive image'>
		<br><br>
		<a href='index.php?step=".$randNum."' class='btn btn-info' role='button'>Try Again</a>
	";
}
else if(isset($_GET['step']) && $_GET['step'] == 1){
	$_SESSION['puzzlesSeen'][] = 1;
	
	echo "
		<h2>Riddle</h2>
		<p>
			I have eyes but I can’t see<br>
			I have skin but I can’t feel anything<br>
			I can be sweet but I’m not a piece of candy<br>
			I can be baked but I’m not a cake<br>
			I can be peeled but I’m not a carrot<br>
			What am I?
		</p>
	";
	
	EchoImages("potato.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 2){
	$_SESSION['puzzlesSeen'][] = 2;
	
	echo "
		<h2>Riddle</h2>
		<p>
			I have just one, but with eight to spare<br> 
			I am usually friendly, but I sometimes act like I don't care<br> 
			What am I?
		</p>
	";
	
	EchoImages("cat1.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 3){
	$_SESSION['puzzlesSeen'][] = 3;
	
	echo "
		<h2>Riddle</h2>
		<p>
			I am a slightly radioactive leather shoe polisher that is sometimes used to measure scale.<br>
			What am I?
		</p>
	";
	
	EchoImages("banana.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 4){
	$_SESSION['puzzlesSeen'][] = 4;
	
	echo "
		<h2>Riddle</h2>
		<p>
			Like a glass box with no entrance<br>
			I crack under pressure<br>
			What am I?
		</p>
	";
	
	EchoImages("egg.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 5){
	$_SESSION['puzzlesSeen'][] = 5;
	
	echo "
		<h2>Riddle</h2>
		<p>
			I am not bread, an apple, or a very small rock<br>
			Nor am I a church, grape gravy, or lead<br>
			If someone weighs the same as me, they must be made of wood<br>
			What am I?
		</p>
	";
	
	EchoImages("duck.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 6){
	$_SESSION['puzzlesSeen'][] = 6;
	
	echo "
		<h2>Riddle</h2>
		<p>
			I start life sweet but end life salty<br>
			I can give a cat a scare when I appear behind them<br>
			I am both a noun and a verb<br>
			What am I?
			
		</p>
	";
	
	EchoImages("pickle.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 7){
	$_SESSION['puzzlesSeen'][] = 7;
	
	echo "
		<h2>Riddle</h2>
		<p>
			I protect what is dear to me<br>
			I break when pushed passed my limits<br>
			I may be strong, but without support I am nothing<br>
			What am I?
		</p>
	";
	
	EchoImages("ribcage.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 8){
	$_SESSION['puzzlesSeen'][] = 8;
	
	echo "
		<h2>Riddle</h2>
		<p>
			What has a neck but no head<br>
			Two arms but no hands?
		</p>
	";
	
	EchoImages("shirt.jpg");
	
}
else {
	unset($_SESSION['points']);
	unset($_SESSION['puzzlesSeen']);
	
	$randNum = GetNextPuzzle();
	
	?>
	<h2>It's Another Clue!</h2>
	<h3>The Nicolas Cage Riddle Game</h3>
	<p>
		Welcome to It's Another Clue! This is a riddle game with the added benefit of being graced by Nicolas Cage's face!<br>
		The objective of the game is simple. Solve five riddles in a row and win! However, if you get one wrong, you must start over!<br>
		May Nicolas Cage be with you!
	</p>
	<img src="images/1.PNG" class="img-fluid" alt="Responsive image">
	<br>
	<br>
	<a href='index.php?step=<?php echo $randNum; ?>' class='btn btn-info' role='button'>Start!</a>

	<?php

}

require_once('footer.php');
?>