library(shiny)
library(ggplot2)

Ratings <- read.csv("RatingsWithHeaders.csv")

RatingTypes <- c("satisfaction","quality","handling","storage","consistency","communication")
hist_breaks <- c(0,1,2,3,4,5)
colors = c("dark red","dark orange","light yellow","light green","dark green")

ui <- fluidPage(
  selectInput(inputId = "RatingType",
              label = "Select Rating Metric",
              choices = RatingTypes),
  plotOutput("hist")
)

server <- function(input,output){
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
