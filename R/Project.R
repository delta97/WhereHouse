install.packages("zipcode")
install.packages("generator")
install.packages("RMySQL")
install.packages("random")
install.packages("tidyr")
install.packages("sampling")

library(generator)
library(tidyr)
library(dplyr)
library(sampling)

#First and Last Names
full_name <- r_full_names(40000)
df <- as.data.frame(full_name)
names <- tidyr::separate(df, full_name, sep = " ", c("First_name", "Last_name" ))

#User type
type <- as.data.frame(rbinom(40000, 1, 0.5))

#Bank Account Numbr
bank_number <- as.data.frame(floor(runif(40000, min=10, max=9)))

as.data.frame(r_credit_card_numbers(40000))

#Phone Number
Phone_num <- r_phone_numbers(40000)
Phone_num <- as.data.frame(Phone_num)

#Email
Email <- r_email_a
