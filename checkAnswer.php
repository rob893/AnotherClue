<?php
require_once('header.php');

if(isset($_POST['riddleId']) && isset($_POST['response'])){
	
	if(!CheckAnswer($_POST['riddleId'], $_POST['response'])){
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
else{
	echo "Something went wrong!";
}

require_once('footer.php');
?>