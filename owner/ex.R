# include any packages that you need
library(RMySQL)
# IMPORTANT: you DO NOT have permission to install packages on the server,
# talk to Mario if a specific package is required that is NOT already installed
# To get a listing of all the R packages installed on the Purdue SERVER
installed.packages()
# Tell R that you are passing in arguments from an external source
args <- commandArgs(TRUE) # only need to run once for the entire file
# get the first argument passed in from the Rscript shell command (from php)
N <- args[1]
# generate N random numbers (normally distributed) to plot
x <- rnorm(N,0,1)
# save the plot as a png file in the pics directory (be sure that it exists first!)
# type="cairo" is necessary or you will have empty plots on output!
png(filename="pics/temp.png", width=500, height=500, type="cairo")
hist(x, col="lightblue")
dev.off()
