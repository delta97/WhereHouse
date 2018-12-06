library(shiny)
library(ggplot2)

#These fies are used for the ratings graphs
Users <- read.csv("UsersWithHeaders.csv")
Warehouses <- read.csv("WarehousesWithHeaders.csv")

UserStates <- Users$state
WarehouseStates <- Warehouses$state

UserVWarehouse <- c("User","Warehouse")
#

#These files are used for the Warehouses/users per sate graphs
Ratings <- read.csv("RatingsWithHeaders.csv")

RatingTypes <- c("satisfaction","quality","handling","storage","consistency","communication")
hist_breaks <- c(0,1,2,3,4,5)
colors = c("dark red","dark orange","light yellow","light green","dark green")

#

ui <- fluidPage(
  selectInput(inputId = "UserOrWarehouse",
              label = "Users or Warehouses",
              choices = UserVWarehouse),
  plotOutput("bars"),
  
  selectInput(inputId = "RatingType",
              label = "Select Rating Metric",
              choices = RatingTypes),
  plotOutput("hist")
)

server <- function(input,output){
  output$bars <- renderPlot({
    if (input$UserOrWarehouse == "User") {
      barplot(table(UserStates),xlab="State", ylab="Number of Users",main = "Users per State", cex.names = .80,col = "light blue")
    }
    if (input$UserOrWarehouse == "Warehouse") {
      barplot(table(WarehouseStates),xlab="State", ylab="Number of Warehouses",main = "Warehouses per State", cex.names = .75, las = 3, col = "light blue")
    }
  })
    output$hist <- renderPlot({
      if (input$RatingType == "satisfaction") {
        hist(Ratings$satisfaction,xlab="Rating", ylab="Number of Ratings",main = "Satisfaction", breaks=hist_breaks, col=colors)
      }
      if (input$RatingType == "quality") {
        hist(Ratings$quality,xlab="Rating", ylab="Number of Ratings",main = "Quality", breaks=hist_breaks, col=colors)
      }
      if (input$RatingType == "handling") {
        hist(Ratings$handling,xlab="Rating", ylab="Number of Ratings",main = "Handling", breaks=hist_breaks, col=colors)
      }
      if (input$RatingType == "storage") {
        hist(Ratings$storage,xlab="Rating", ylab="Number of Ratings",main = "Satisfaction", breaks=hist_breaks, col=colors)
      }
      if (input$RatingType == "consistency") {
        hist(Ratings$consistency,xlab="Rating", ylab="Number of Ratings",main = "Consistency", breaks=hist_breaks, col=colors)
      }
      if (input$RatingType == "communication") {
        hist(Ratings$communication,xlab="Rating", ylab="Number of Ratings",main = "Communication", breaks=hist_breaks, col=colors)
      }
  })
}
shinyApp(ui = ui , server = server)
