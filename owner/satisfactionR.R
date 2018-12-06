installed.packages()
library(RMySQL)
library(ggplot2)
args <- commandArgs(TRUE)
test<-args[1]
test<-as.numeric(test)
print(test)


mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
a <- paste("SELECT contract_id FROM Contract WHERE owner_id=",test)
skids1 <- dbSendQuery(mydb, a)
contract <- fetch(skids1, n=-1)

b <- paste("SELECT satisfaction FROM Rating WHERE contract_id=", contract)
satisfaction <- fetch(satisfaction, n=-1)



#Create plot of number of skids rented 
png(filename="satisfactionPlot.png", width=500, height=500, type="cairo")
barplot(table(satisfaction), xlab="Number of Skids", ylab = "Frequency of Rental")
dev.off()

