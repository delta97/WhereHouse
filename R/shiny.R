library(shiny)
ui <- fluidPage(
  radioButtons(inputId = "choice", label, choices,
               selected, inline),
  plotOutput(outputId = "graph")
)
server <- function(input,output){
  output$graph <- renderPlot({ggplot(input$num)})
}
shinyApp(ui = ui , server = server)