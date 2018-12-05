#Hashes Existing Passwords
get_passwords <- function(){
  
  mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
  
  rs <- dbSendQuery(mydb, "SELECT password FROM User;")
  data <- fetch(rs, n=-1)
  
  new_pass <- apply(cyka, 1, gen_hash)
  
  dbDisconnect(mydb)
  
  return(new_pass)
  
}


#Generates Random String
test_hash <- function(input, stored){
  
  #Requires package "digest"
  hashed <- digest(input, "md5")
  
  if (hashed == stored){
    return(TRUE)
  }
  else{
    return(FALSE)
  }
  
}


#Hashes Password for Storage
gen_hash <- function(input){
  
  #Requires package "digest"
  hashed <- digest(input, "md5")
  
  return(hashed)
  
}
