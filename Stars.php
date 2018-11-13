<?php
//Input Rating

function getStars($rating){

	if (fmod($rating, 1)<0.25){
	  $_SESSION["stars"] = $rating - fmod($rating, 1);
	  $_SESSION["half"] = 0;

	}else if ((fmod($rating, 1)>0.25) and (fmod($rating, 1) <0.75)){
	  $_SESSION["stars"] = $rating - fmod($rating, 1);
	  $_SESSION["half"] = 1;
	  
	} else {
	  $_SESSION["stars"] = $rating - fmod($rating, 1) + 1;
	  $_SESSION["half"] = 0;
	}

	//FIRST
	if ($_SESSION["stars"]>0){
	  //Display FIRST star
	  echo "1\n";
	  $_SESSION["stars"] = $_SESSION["stars"] - 1;

	}else if ($_SESSION["half"]>0){
	  //Display FIRST half
	  echo "half\n";
	  $_SESSION["half"] = $_SESSION["half"] - 1;
	  
	} else {
	  //Display FIRST blank
	  echo "0\n";
	}


	//SECOND
	if ($_SESSION["stars"]>0){
	  //Display SECOND star
	  echo "1\n";
	  $_SESSION["stars"] = $_SESSION["stars"] - 1;

	}else if ($_SESSION["half"]>0){
	  //Display SECOND half
	  echo "half\n";
	  $_SESSION["half"] = $_SESSION["half"] - 1;
	  
	} else {
	  //Display SECOND blank
	  echo "0\n";
	}


	//THIRD
	if ($_SESSION["stars"]>0){
	  //Display THIRD star
	  echo "1\n";
	  $_SESSION["stars"] = $_SESSION["stars"] - 1;

	}else if ($_SESSION["half"]>0){
	  //Display THIRD half
	  echo "half\n";
	  $_SESSION["half"] = $_SESSION["half"] - 1;
	  
	} else {
	  //Display THIRD blank
	  echo "0\n";
	}


	//FOURTH
	if ($_SESSION["stars"]>0){
	  //Display FOURTH star
	  echo "1\n";
	  $_SESSION["stars"] = $_SESSION["stars"] - 1;

	}else if ($_SESSION["half"]>0){
	  //Display FOURTH half
	  echo "half\n";
	  $_SESSION["half"] = $_SESSION["half"] - 1;
	  
	} else {
	  //Display FOURTH blank
	  echo "0\n";
	}


	//FIFTH
	if ($_SESSION["stars"]>0){
	  //Display FIFTH star
	  echo "1\n";
	  $_SESSION["stars"] = $_SESSION["stars"] - 1;

	}else if ($_SESSION["half"]>0){
	  //Display FIFTH half
	  echo "half\n";
	  $_SESSION["half"] = $_SESSION["half"] - 1;
	  
	} else {
	  //Display FIFTH blank
	  echo "0\n";
	}
}
?>