library(magrittr)
library(dplyr)
library(lubridate)
library(ggplot2)
library(plyr)
library(scales)
library(reshape2)
library(grid)
library(gridExtra)
library(ggthemes)

#If 2017 data is added, this will need to be adapted. Basically data needs to be seperated by year (change the group_by statement) and 2 plots will be made.
#will need to connect to SQL database instead here and get the Contract table
a <- read.csv("Contract.csv", sep=",", header=TRUE)

#Will need to change variable names to match SQL
convert <- mdy(a$Start_date)
a$Start_month <- month(convert)
convert2 <- mdy(a$End_date)
a$End_month <- month(convert2)

df <- a %>% group_by(Owner_ID,WH_ID,Start_month) %>% dplyr::summarise(sum(TotPrice)) 
#Will need to set Owner_ID equal to session variable here
df1 <- df[which(df$Owner_ID == 13457),]
warehouses <- df1 %>%  distinct(WH_ID)

#Update to SQL variables
ggplot(df1, aes(x = df1$Start_month, y = df1$`sum(TotPrice)`)) +
  geom_point() + 
  geom_line()+
  #Change the df1$WH_ID below to address of warehouse somehow so that it's displayed on the graphs but it needs to be in the df1 data frame
  facet_grid(df1$WH_ID~., scales='free_x', labeller = label_parsed) +
  labs(title="Monthly Revenue Time Series Chart for 2018 Contracts", 
       subtitle="Plots seperated by your Warehouse's IDs", 
       y="Returns $",x="Months") +
  scale_x_continuous(breaks = round(seq(min(df1$Start_month), max(df1$Start_month), by = 1),1)) +
  theme_gray() + scale_colour_economist() 

