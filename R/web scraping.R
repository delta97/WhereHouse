install.packages("rvest")
install.packages("stringr")
install.packages("tidyverse")
install.packages("dplyr")
install.packages("zipcode")
library(rvest)
library(stringr)  
library(tidyverse) 
library(dplyr)
library(zipcode)
library(ggplot2)
library(data.table)
library(xml2)
library(tidyr)

install.packages("xlsx")
a <- read.csv("test.csv")

#Street Adress
Street <- lapply(paste0('https://www.loopnet.com/warehouses-for-lease/', 1:20,sep="/"),
                function(url){
                  url %>% read_html() %>% 
                    html_nodes(".listingTitle") %>% 
                    html_text() %>%
                    str_trim() %>%
                    gsub('-* Warehouse for Lease', '', .)
                  
                })

Street <- unlist(Street)
Street <- as.data.frame(Street)


#City and State 
city_state <- lapply(paste0('https://www.loopnet.com/warehouses-for-lease/', 1:20,sep="/"),
                 function(url){
                   url %>% read_html() %>% 
                     html_nodes(".listingDescription b") %>% 
                     html_text() %>%
                     str_trim()
                   
                 })

city_state <- unlist(city_state)
city_state <- as.data.frame(city_state)
city_state <- city_state %>% separate(city_state, sep = "," ,c("city","State"))

#Attributes 
df1 <- lapply(paste0('https://www.loopnet.com/warehouses-for-lease/', 1:20,sep="/"),
                     function(url){
                       url %>% read_html() %>% 
                         html_nodes(".listingAttributes tr") %>% 
                         html_text() %>%
                         str_trim()
                     })

df1 <- unlist(df1)
df1 <- as.data.frame(df1)

#Price per skid per month 
price <- df1 %>% filter(str_detect(df1,"Price:")) %>%
  separate(df1, sep = ":", c("Text","Fee")) %>%
  separate(Fee, sep = "-", c("Fee", "Max"))

price$Text <- NULL
price$Max <- NULL

price$Fee <- gsub("[^0-9\\.]", "", price$Fee)
price <- as.numeric(price$Fee) 
price <- as.data.frame(price)

#Building Size 
building_size <- df1 %>% filter(str_detect(df1, "Building Size")) %>%
  separate(df1, sep = ":", c("Text", "Size"))
building_size$Text <- NULL
building_size$Size <- gsub("[^0-9\\]", "", building_size$Size) 
Size <- as.numeric(building_size$Size)
Size <- as.data.frame(Size)


#Available Space 
available_space <- df1 %>% filter(str_detect(df1, "Space Available")) %>%
  separate(df1, sep = ":", c("Text" ,"Space")) %>%
  separate(Space, sep = "-", c("Min", "Max"))

available_space$Text <- NULL
available_space$Max <- NULL
available_space$Min <- NULL
available_space$Space <- gsub("[^0-9\\]", "", available_space$Min) 
Space <- as.numeric(available_space$Space)
Space <- as.data.frame(Space)

#Temperature control 

#Warehouse data frame 
warehouse <- bind_cols(Street,city_state, price, Size, Space) 
warehouse <- as.data.frame(warehouse) %>%
  mutate(price = price * 12) %>% 
  mutate(price, replace(price, price > 20, NA)) %>%
  na.omit
warehouse$`replace(price, price > 20, NA)` <- NULL
warehouse <- tibble::rowid_to_column(warehouse, "ID")



avg_price <- warehouse %>% summarise(mean(price), mean(Size), mean(Space))
a <- warehouse %>% summarise(sd(Size))



#Outlier Replacer with NA 
#replacing outliers with NA in order to reach statistical clarity 
outlierReplace = function(dataframe, cols, rows, newValue = NA) {
  if (any(rows)) {
    set(dataframe, rows, cols, newValue)
  }
}

temp <- c("room_tep", "temp_cont", "frozen")

