<?php
//Input Rating
$rating = 4.74;
$stars = 0;
$half = 0;

if (fmod($rating, 1)<0.25){
  $stars = $rating - fmod($rating, 1);
  $half = 0;

}else if ((fmod($rating, 1)>0.25) and (fmod($rating, 1) <0.75)){
  $stars = $rating - fmod($rating, 1);
  $half = 1;
  
} else {
  $stars = $rating - fmod($rating, 1) + 1;
  $half = 0;
}

?>