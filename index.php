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
	session_unset();
	
	$randNum = GetNextRiddle();
	
	echo "
		<h2>You lose!</h2>
		<br>
		<img src='images/2.gif' class='img-fluid' alt='Responsive image'>
		<br><br>
		<a href='index.php?step=".$randNum."' class='btn btn-info' role='button'>Try Again</a>
	";
}
else if(isset($_SESSION['points']) && $_SESSION['points'] >= 5 && isset($_GET['step']) && $_GET['step'] == -2){
	session_unset();
	
	$randNum = GetNextRiddle();
	
	echo "
		<h2>You win!</h2>
		<br>
		<img src='images/3.jpg' class='img-fluid' alt='Responsive image'>
		<br><br>
		<a href='index.php?step=".$randNum."' class='btn btn-info' role='button'>Try Again</a>
	";
}
else if(isset($_GET['step']) && $_GET['step'] == 1){
	EnsureUniqueRiddle(1);
	$_SESSION['riddlesSeen'][] = 1;
	$_SESSION['answer'] = "potato.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: http://riddles-for-kids.org</p>
		<p>
			I have eyes but I can’t see<br>
			I have skin but I can’t feel anything<br>
			I can be sweet but I’m not a piece of candy<br>
			I can be peeled but I’m not a carrot<br>
			What am I?
		</p>
	";
	
	EchoImages("potato.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 2){
	EnsureUniqueRiddle(2);
	$_SESSION['riddlesSeen'][] = 2;
	$_SESSION['answer'] = "cat1.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: https://www.riddles.nu</p>
		<p>
			I have just one, but with eight to spare<br> 
			I am usually friendly, but I sometimes act like I don't care<br> 
			What am I?
		</p>
	";
	
	EchoImages("cat1.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 3){
	EnsureUniqueRiddle(3);
	$_SESSION['riddlesSeen'][] = 3;
	$_SESSION['answer'] = "banana.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
		<p>
			I am a slightly radioactive leather shoe polisher that is sometimes used to measure scale.<br>
			What am I?
		</p>
	";
	
	EchoImages("banana.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 4){
	EnsureUniqueRiddle(4);
	$_SESSION['riddlesSeen'][] = 4;
	$_SESSION['answer'] = "egg.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
		<p>
			Like a glass box with no entrance<br>
			I crack under pressure<br>
			What am I?
		</p>
	";
	
	EchoImages("egg.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 5){
	EnsureUniqueRiddle(5);
	$_SESSION['riddlesSeen'][] = 5;
	$_SESSION['answer'] = "duck.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
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
	EnsureUniqueRiddle(6);
	$_SESSION['riddlesSeen'][] = 6;
	$_SESSION['answer'] = "pickle.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
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
	EnsureUniqueRiddle(7);
	$_SESSION['riddlesSeen'][] = 7;
	$_SESSION['answer'] = "ribcage.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
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
	EnsureUniqueRiddle(8);
	$_SESSION['riddlesSeen'][] = 8;
	$_SESSION['answer'] = "shirt.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: https://www.riddlewot.com</p>
		<p>
			What has a neck but no head<br>
			Two arms but no hands?
		</p>
	";
	
	EchoImages("shirt.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 9){
	EnsureUniqueRiddle(9);
	$_SESSION['riddlesSeen'][] = 9;
	$_SESSION['answer'] = "hippo.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: u/eimichan from Reddit</p>
		<p>
			Jake skillfully caught the smooth, white ball.<br> 
			He quickly gulped it down.<br>
			No sense in Ching taking it.</br>
			He looked over and Pierre had made the ultimate mistake - he hesitated.<br>
			In this battle for food spheres, hesitation meant losing the game.<br>
			His unstable grip fumbled the ball to Artemis.<br>
			Artemis quickly downs 4 balls and it was all over - no more sustenance until tomorrow.<br>
			Jake knew Pierre would never last long, but Jake would be surprised.<br>
			Jake, Pierre, Ching, and Artemis are all..
		</p>
	";
	
	EchoImages("hippo.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 10){
	EnsureUniqueRiddle(10);
	$_SESSION['riddlesSeen'][] = 10;
	$_SESSION['answer'] = "fish.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: 'The Hobbit' by J.R.R. Tolkien</p>
		<p>
			Alive without breath,<br>
			As cold as death;<br>
			Never thirsty, ever drinking,<br>
			All in mail never clinking. <br>
		</p>
	";
	
	EchoImages("fish.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 11){
	EnsureUniqueRiddle(11);
	$_SESSION['riddlesSeen'][] = 11;
	$_SESSION['answer'] = "sun.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: 'The Hobbit' by J.R.R. Tolkien</p>
		<p>
			An eye in a blue face<br>
			Saw an eye in a green face.<br>
			'That eye is like to this eye'<br>
			Said the first eye,<br>
			'But in low place,<br>
			Not in high place.'
		</p>
	";
	
	EchoImages("sun.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 12){
	EnsureUniqueRiddle(12);
	$_SESSION['riddlesSeen'][] = 12;
	$_SESSION['answer'] = "egg.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: 'The Hobbit' by J.R.R. Tolkien</p>
		<p>
			A box without hinges, key, or lid,<br>
			Yet golden treasure inside is hid.
		</p>
	";
	
	EchoImages("egg.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 13){
	EnsureUniqueRiddle(13);
	$_SESSION['riddlesSeen'][] = 13;
	$_SESSION['answer'] = "teeth.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: 'The Hobbit' by J.R.R. Tolkien</p>
		<p>
			Thirty white horses on a red hill,<br>
			First they champ,<br>
			Then they stamp,<br>
			Then they stand still.
		</p>
	";
	
	EchoImages("teeth.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 14){
	EnsureUniqueRiddle(14);
	$_SESSION['riddlesSeen'][] = 14;
	$_SESSION['answer'] = "mrt.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Tracy Hare Fillar via https://www.scribd.com</p>
		<p>
			Bite on this for a bit of crackle,<br>
			so good it will make you want to cackle.<br>
		</p>
	";
	
	EchoImages("mrt.jpg");
}
else if(isset($_GET['step']) && $_GET['step'] == 15){
	EnsureUniqueRiddle(15);
	$_SESSION['riddlesSeen'][] = 15;
	$_SESSION['answer'] = "thriller.jpeg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
		<p>
			Deep in the night,<br>
			Something comes for you,<br>
			You try to scream,<br>
			But no one will save you.
		</p>
	";
	
	EchoImages("thriller.jpeg");
}
else if(isset($_GET['step']) && $_GET['step'] == 16){
	EnsureUniqueRiddle(16);
	$_SESSION['riddlesSeen'][] = 16;
	$_SESSION['answer'] = "wreckingball.jpg";
	
	echo "
		<h2>Riddle</h2>
		<p>Source: Original</p>
		<p>
			Like a swinging pendulum,<br>
			I came in to break you down,<br>
			So something can be built anew.
		</p>
	";
	
	EchoImages("wreckingball.jpg");
}
else {
	session_unset();
	
	$randNum = GetNextRiddle();
	
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