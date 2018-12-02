#Emulates Multiple Ratings
gen_total_rating <- function(amount){
  
  for (i in 1:amount){
    rate <- vector()
    rate[i] <- gen_avg_rating()
  }
  return(rate)
}



#Generates Weighted Average
gen_avg_rating <- function(){
    
  rate <- gen_single_rating()
  
  rating_avg = 0.4*(rate[1]+rate[2])/2 + 0.3*(rate[3]+rate[4]+rate[5]+rate[6])/2

  
  return (rating_avg)
  
}


#Generates Singe Set of Ratings
gen_single_rating <- function(){
  
  rate <- vector()
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 64){
    rate[1] <- 5
  }
  else if (stat_gen > 23){
    rate[1] <- 4
  }
  else if (stat_gen > 16){
    rate[1] <- 3
  }
  else if (stat_gen > 11){
    rate[1] <- 2
  }
  else if (stat_gen > 11){
    rate[1] <- 2
  }
  else{
    rate[1] <- 1
  }
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 64){
    rate[2] = 5
  }
  else if (stat_gen > 23){
    rate[2] = 4
  }
  else if (stat_gen > 16){
    rate[2] = 3
  }
  else if (stat_gen > 11){
    rate[2] = 2
  }
  else if (stat_gen > 11){
    rate[2] = 2
  }
  else{
    rate[2] = 1
  }
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 64){
    rate[3] = 5
  }
  else if (stat_gen > 23){
    rate[3] = 4
  }
  else if (stat_gen > 16){
    rate[3] = 3
  }
  else if (stat_gen > 11){
    rate[3] = 2
  }
  else if (stat_gen > 11){
    rate[3] = 2
  }
  else{
    rate[3] = 1
  }
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 64){
    rate[4] = 5
  }
  else if (stat_gen > 23){
    rate[4] = 4
  }
  else if (stat_gen > 16){
    rate[4] = 3
  }
  else if (stat_gen > 11){
    rate[4] = 2
  }
  else if (stat_gen > 11){
    rate[4] = 2
  }
  else{
    rate[4] = 1
  }
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 64){
    rate[5] = 5
  }
  else if (stat_gen > 23){
    rate[5] = 4
  }
  else if (stat_gen > 16){
    rate[5] = 3
  }
  else if (stat_gen > 11){
    rate[5] = 2
  }
  else if (stat_gen > 11){
    rate[5] = 2
  }
  else{
    rate[5] = 1
  }
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 64){
    rate[6] = 5
  }
  else if (stat_gen > 23){
    rate[6] = 4
  }
  else if (stat_gen > 16){
    rate[6] = 3
  }
  else if (stat_gen > 11){
    rate[6] = 2
  }
  else if (stat_gen > 11){
    rate[6] = 2
  }
  else{
    rate[6] = 1
  }
  return (rate)
}