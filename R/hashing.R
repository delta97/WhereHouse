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