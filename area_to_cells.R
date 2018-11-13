
calcCells <- function(area){
  util <- runif(1,3,7)*0.1
  stack <- runif(1,1,3)
  cells <- area*util*stack/16
  
  return(cells)
}

calcRate <- function(rate){
  #Input price/sqft/month
  #Output price/cell/day
  
  rate <- rate * 16 / 30
  
  return(rate)
}