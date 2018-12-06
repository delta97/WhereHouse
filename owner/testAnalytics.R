installed.packages()
library(RMySQL)
library(ggplot2)
#args <- commandArgs(TRUE)
#test<-args[1]
#test<-as.numeric(test)
#test<-1

mydb <- dbConnect(MySQL(), user='g1090429', password='WhereHouse?', dbname='g1090429', host='mydb.ics.purdue.edu')
getStates <- dbSendQuery(mydb, 'SELECT state, count(*) FROM User GROUP BY state')
states <- fetch(getStates, n=-1)
if(test==1){

##Dot plot of users per state
ggplot(states, aes(x = states[,1], y = states[,2])) +geom_bar(stat = "identity", fill = "orange") + theme_bw() + 
    labs(title ="Number of Users per State", x = "States", y = "Number of Users") 
dev.off()
}

png(filename="Plot.png", width=1406, height=552, type="cairo")

#+ ggsave("testPlot.png")

all_cons <- dbListConnections(MySQL())
for(con in all_cons)
  dbDisconnect(con)

ggplot(data.frame(states[,1], states[,2]), aes(states[,1], states[,2]))
g + geom_bar(stat="identity", fill = "#e9e9e9") + theme_classic() + labs(title ="Number of Users per State", x = "States", y = "Number of Users") 
dev.off()
}