<?php
require_once('header.php');


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