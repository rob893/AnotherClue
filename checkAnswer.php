<?php
require_once('header.php');

if(isset($_POST['response']) && isset($_SESSION['answer'])){
	
	if(!CheckAnswer($_SESSION['answer'], $_POST['response'])){
		header("Location: index.php?step=-1");
		return;
	}
	
	unset($_SESSION['answer']);
	
	if(!isset($_SESSION['points'])){
		$_SESSION['points'] = 1;
	}
	else{
		$_SESSION['points']++;
	}
	
	$randNum = GetNextRiddle();
	
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
	echo "Something went wrong while checking answer!";
}

require_once('footer.php');
?>