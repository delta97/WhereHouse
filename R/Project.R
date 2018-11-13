install.packages("zipcode")
install.packages("generator")
install.packages("RMySQL")
install.packages("random")
install.packages("tidyr")
install.packages("sampling")
install.packages("ggmap")
install.packages("rvest")

#Loading Required Packages 
library(generator)
library(zipcode)
library(tidyr)
library(dplyr)
library(sampling)
library(ggmap)

#Determining sample size 
z_score = 1.96 #%95 confidence interval 
std <- ? #standard deviation 
mof <- ? #margin of error 
sample_size <- 5

#USER DATATABLE 
#First and Last Names
full_name <- r_full_names(sample_size)
df <- as.data.frame(full_name)
names <- tidyr::separate(df, full_name, sep = " ", c("First_name", "Last_name" ))

#User type
type <- as.data.frame(rbinom(sample_size, 1, 0.5))

#Phone Number
Phone_num <- r_phone_numbers(sample_size)
Phone_num <- as.data.frame(Phone_num)

#Email
Email <- r_email_addresses(sample_size)
Email <- as.data.frame(Email)

#Date of Birth 
DOB <- sample(seq(as.Date('1950/01/01'), as.Date('2000/01/01'), by="day"), sample_size)
DOB <- as.data.frame(DOB)

#Address
zipcodes <- data(zipcode)
df <- data(zipcode)
df <- dplyr::filter(zipcode, state == "FL" & city == "Clearwater")
latitude <- as.data.frame(r_latitudes(5))
longitude <- as.data.frame(r_longitudes(5))

coord <- as.data.frame(c(latitude,longitude))
coord$textAddress <- mapply(FUN = function(longitude, latitude) revgeocode(c(longitude, latitude)), coord$longitude.5, coord$latitude.5)




#CONTRACT DATATABLE
