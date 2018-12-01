library(RMySQL)
gen_lessee <- function(){
  con <- dbConnect(MySQL(), user="g1090429", password="WhereHouse?", host="mydb.ics.purdue.edu", dbname="g1090429")
  on.exit(dbDisconnect(con))
  
  lessee_id <- dbSendQuery(con, "SELECT lessee_id FROM Lessee ORDER BY RAND() LIMIT 1;")
  
  all_cons <- dbListConnections(MySQL())
  for (con in all_cons)
    dbDisconnect(con)
  
  return (lessee_id)
}


user_id <- dbSendQuery(con,"SELECT id FROM User WHERE lessee_id == id ORDER BY RAND() LIMIT 1;")

gen_warehouse <- function(){
  
  con <- dbConnect(MySQL(), user="g1090429", password="WhereHouse?", host="mydb.ics.purdue.edu", dbname="g1090429")
  on.exit(dbDisconnect(con))
  
  selected_warehouse <- sqlQuery(con, "SELECT id, State, Size FROM Warehouse ORDER BY RAND() LIMIT 1;")
  warehouse_id <- selected_warehouse[,1]
  
  all_cons <- dbListConnections(MySQL())
  for (con in all_cons)
    dbDisconnect(con)
  
  return (selected_warehouse)
  
}



gen_startdate <- function(){

    start_date <- sample(seq(as.Date('2018/01/01'), as.Date('2018/12/31'), by="day"), 1)
    
    print (start_date)
    return (start_date)
}


gen_enddate <- function(start_date){
  
  repeat {
    end_date <- sample(seq(as.Date('2018/01/02'), as.Date('2018/12/31'), by="day"), 1)
    if (end_date > start_date){
      break
    }
  }
  
  return (end_date)
}

gen_total_price <- function(WH_id){
  
  con <- dbConnect(MySQL(), user="g1090429", password="WhereHouse?", host="mydb.ics.purdue.edu", dbname="g1090429")
  on.exit(dbDisconnect(con))
  
  ans <- sqlQuery(con, paste("SELECT Price_per_skid FROM Warehouse WHERE id =", WH_id, sep=""))
  
  all_cons <- dbListConnections(MySQL())
  for (con in all_cons)
    dbDisconnect(con)
  
  print(ans)
  
}


gen_num_skids <- function(){
  #MEAN value from interview data
  #Large SD with >0 constraint to make right-skewed data
  
  repeat {
    num_skids <- rnorm(1, mean=20, sd=30)
    num_skids <- num_skids - (num_skids %% 1)
    if (num_skids > 0){
      break
    }
  }
  
  return (num_skids)
  }

gen_security_dep <- function(num_skids){
  #COST/SKID from interview data
  deposit <- num_skids * 100
  
  return (deposit)
}

gen_status <- function(){
  #NEEDS PROBABILITY EVIDENCE
  
  #1 Pending
  #2 Declined
  #3 Accepted
  #4 Active
  #5 Terminated
  
  stat_gen <- sample.int(100, 1)
  if (stat_gen > 90){
    status = 1
  }
  else if (stat_gen > 80){
    status = 2
  }
  else if (stat_gen > 70){
    status = 3
  }
  else if (stat_gen > 20){
    status = 4
  }
  else{
    status = 5
  }
  
}
