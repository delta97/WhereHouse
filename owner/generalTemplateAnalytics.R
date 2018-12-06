installed.packages()
library(RMySQL)
library(ggplot2)
args <- commandArgs(TRUE)
test<-args[1]
test<-as.numeric(test)
print(test)


mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
skids1 <- dbSendQuery(mydb, "SELECT num_skids FROM Contract")
skids <- fetch(skids1, n=-1)


#Create plot of number of skids rented 
png(filename="try.png", width=500, height=500, type="cairo")
barplot(table(skids), xlab="Number of Skids", ylab = "Frequency of Rental")
#dev.copy(png, 'numSkidsPlot.png')
dev.off()

