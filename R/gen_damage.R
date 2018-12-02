#Generates Statements Regarding Damages
gen_dmg_statement <- function(){
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 10){
    dmg <- NULL
  }
  else if (stat_gen > 7){
    dmg <- "Property was punctured/bent/abrased."
  }
  else if (stat_gen > 5){
    dmg <- "Property sustained water damage."
  }
  else if (stat_gen > 3){
    dmg <- "Property was damaged by falling."
  }
  else if (stat_gen > 2){
    dmg <- "Property was lost."
  }
  else if (stat_gen > 1){
    dmg <- "Property was destroyed."
  }
  else{
    dmg <- "Property was damaged by rodents."
  }
  
  return (dmg)
}