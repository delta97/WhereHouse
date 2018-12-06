installed.packages()
library(RMySQL)
library(ggplot2)
args <- commandArgs(TRUE)
test<-args[1]
test<-as.numeric(test)
print(test)


mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
a <- paste("SELECT SUM(capacity) FROM Warehouse WHERE owner_id=",test)
call <- dbSendQuery(mydb, a)
capacity <- fetch(call, n=-1)

mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
a <- paste("SELECT SUM(size) FROM Warehouse WHERE owner_id=",test)
call2 <- dbSendQuery(mydb, a)
size <- fetch(call2, n=-1)

#Create plot of number of skids rented 
png(filename="capacityPlot.png", width=500, height=500, type="cairo")
slices <- c(capacity, size)
lbls <- c("Current Capacity", "Vacanct")
lbls <- paste(lbls, pct) # add percents to labels 
lbls <- paste(lbls,"%",sep="") # ad % to labels 
pie(slices, labels = lbls, main="Pie Chart of Capacity")
dev.off()





