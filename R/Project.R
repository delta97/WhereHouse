install.packages("zipcode")
install.packages("generator")
install.packages("RMySQL")
install.packages("random")
install.packages("tidyr")
install.packages("sampling")
install.packages("ggmap")

library(generator)
library(zipcode)
library(tidyr)
library(dplyr)
library(sampling)
library(ggmap)

#First and Last Names
full_name <- r_full_names(40000)
df <- as.data.frame(full_name)
names <- tidyr::separate(df, full_name, sep = " ", c("First_name", "Last_name" ))

#User type
type <- as.data.frame(rbinom(40000, 1, 0.5))

#Bank Account Numbr
bank_number <- as.data.frame(floor(runif(1000, min, max=9)))
as.data.frame(r_credit_card_numbers(40000))

#Phone Number
Phone_num <- r_phone_numbers(40000)
Phone_num <- as.data.frame(Phone_num)

#Email
Email <- r_email_addresses(40000)
Email <- as.data.frame(Email)

#Date of Birth 
DOB <- sample(seq(as.Date('1950/01/01'), as.Date('2000/01/01'), by="day"), 1000)
DOB <- as.data.frame(DOB)

#Address
zipcodes <- data(zipcode)
df <- data(zipcode)
df <- dplyr::filter(zipcode, state == "IN" & city == "West Lafayette")

df$textAddress <- mapply(FUN = function(longitude, latitude) revgeocode(c(longitude, latitude)), df$longitude, df$latitude)
