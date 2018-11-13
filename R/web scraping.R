library(rvest)
library(stringr)  
library(tidyverse) 
library(dplyr)
library(zipcode)


data(zipcode.civicspace) 
zipcode_city <- dplyr::left_join(city_state, zipcode, by= "city")


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
View(Street)

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
View(city_state)
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


#Available Size 
available_size <- df1 %>% filter(str_detect(df1, "Space Available")) %>%
  separate(df1, sep = ":", c("Text" ,"Space")) %>%
  separate(Space, sep = "-", c("Min", "Max"))

available_size$Text <- NULL
available_size$Max <- NULL
available_size$Space <- gsub("[^0-9\\]", "", available_size$Min) 
Space <- as.numeric(available_size$Space)
Space <- as.data.frame(Space)


#Warehouse data frame 
warehouse <- bind_cols(Street,city_state, price, Size, Space) 
warehouse <- as.data.frame(warehouse) %>% na.omit()
View(warehouse)
state_price <- warehouse %>% group_by(State) %>% summarise(mean(price)) 


