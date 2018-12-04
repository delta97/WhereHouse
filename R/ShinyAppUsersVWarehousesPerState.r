library(shiny)
library(ggplot2)

Users <- read.csv("UsersWithHeaders.csv")
Warehouses <- read.csv("WarehousesWithHeaders.csv")

UserStates <- Users$state
UserStates <- as.data.frame(Userstates)
WarehouseStates <- Warehouses$state

UserVWarehouse <- c("User","Warehouse")

ui <- fluidPage(
  selectInput(inputId = "UserOrWarehouse",
              label = "Users or Warehouses",
              choices = UserVWarehouse),
  plotOutput("bars")
)

server <- function(input,output){
  output$bars <- renderPlot({
    if (input$UserOrWarehouse == "User") {
      barplot(table(UserStates),xlab="State", ylab="Number of Users",main = "Users per State")
    }
    if (input$UserOrWarehouse == "Warehouse") {
      barplot(table(WarehouseStates),xlab="State", ylab="Number of Warehouses",main = "Warehouses per State")
    }
  })
}
shinyApp(ui = ui , server = server)
