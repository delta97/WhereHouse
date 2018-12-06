installed.packages()
library(RMySQL)
library(ggplot2)
args <- commandArgs(TRUE)
test<-args[1]

your_list = lapply(strsplit(test, ','), as.numeric)[[1]]
test<-as.numeric(test)
#test<-1
print(test)


#Create plot of number of skids rented 
png(filename="numSkidsPlot.png", width=500, height=500, type="cairo")
num_skids <- c(12, 3, 4, 5, 4, 4, 12, 7, 9, 7, 12, 3, 4, 4, 12, 14, 7, 8)
barplot(table(test), xlab="Number of Skids", ylab = "Frequency of Rental")
#dev.copy(png, 'numSkidsPlot.png')
dev.off()


