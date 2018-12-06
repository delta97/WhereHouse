installed.packages()
library(ggplot2)
library(RMySQL)
args <- commandArgs(TRUE)

N <- args[1]
N <- as.numeric(N)

#If 2017 data is added, this will need to be adapted. Basically data needs to be seperated by year (change the group_by statement) and 2 plots will be made.
#will need to connect to SQL database instead here and get the Contract table
mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
a <- paste("SELECT owner_id, warehouse_id, start_date, SUM(total_price) FROM Contract WHERE owner_id =",N)
b <- paste(a,"GROUP BY start_date ORDER BY warehouse_id, start_date")
df1 <- dbSendQuery(mydb, b) 
df1 <- dbFetch(df1)

#Store date as month
df1$start_date <- as.Date(df1$start_date)
df1$start_date <- format(df1$start_date,"%m")
df1$start_date <- as.numeric(df1$start_date)
total <- aggregate(`SUM(total_price)`~start_date,data=df1,FUN=sum)
colnames(total)[2] <- "price"

#send to png
png(filename="myplot2.png", width=500, height=500, type="cairo")

#plot  
myplot2 <- plot(total$start_date, total$price, type = "l", col = "red", xlab = "Month", ylab = "Revenue$", main = "Time Series of Monthly Revenue for 2018 Contracts", sub = "Monthly revenue calculated by contract start date")
grid(NULL,NULL)
axis(1, at=as.numeric(total$start_date))

  
dev.off()

  