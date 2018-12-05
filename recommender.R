#download plyr, dplyr, rmysql, matrix, ggplot2, ggthemes, plyr, recommenderlab, 
#arules, proxy, registry, data.table, knitr, tidyr, psych, dbi, rlang, magrittr, reshape2
#cli

#whratings <- dbSendQuery(con, "SELECT weighted_average_rating, warehouse_id, count(*) FROM Warehouse GROUP BY weighted_average_rating")
#whratings <- dbGetQuery(con, "SELECT weighted_average_rating, warehouse_id, count(*) FROM Warehouse GROUP BY weighted_average_rating")
#ratings <- fetch(whratings, n=-1)

#lessee
#getlessee<- dbSendQuery(con, "SELECT * FROM User ")
#lessee <- fetch(getlessee, n=-1)

#data <- dbGetQuery(con, "SELECT id FROM User ORDER BY rand()")

lesseerating <- dbGetQuery(con, "SELECT Contract.lessee_id, Rating.weighted_average_rating, Contract.warehouse_id FROM Contract INNER JOIN Rating ON Contract.contract_id = Rating.contract_id")

#rating <- dbGetQuery(con, "SELECT * FROM Rating")

count <- ungroup(lesseerating) %>% 
  group_by(warehouse_id) %>% 
  summarize(Count=n()) %>% 
  arrange(desc(Count))

mean_rating <- ungroup(lesseerating) %>% 
  group_by(warehouse_id) %>% 
  summarize(Mean_score = mean(weighted_average_rating)) %>% 
  arrange(desc(Mean_score))

data <- merge(lesseerating, count, by.x='warehouse_id', by.y='warehouse_id', all.x=T)
data <- merge(data, mean_rating, by.x='warehouse_id', by.y='warehouse_id', all.x=T)

data2 <- data[, c(1:5)]
data2$lessee_id <- gsub('#oc-', '', data2$lessee_id)
#data2[, c(1:5)] <- lapply(data2[, c(1:5)], trimws)

data2$weighted_average_rating <- as.numeric(data2$weighted_average_rating)

#data <- subset(data, select=c("warehouse_id", "lessee_id", "weighted_average_rating", "count"))

medianProds <- median(data2$Count)

datRlab <- ungroup(data2) %>%
  filter(Count >= medianProds)

datRlab <- datRlab[, c(1, 2, 3)]
datRlab <- datRlab[!duplicated(datRlab[,c(1,2)]),]

#data3 <- data3[!duplicated(data3[,c(1,3)]),]
kable(head(datRlab), caption='Data in Recommenderlab format')

#top prod sorts
topwh<- ungroup(datRlab) %>% 
  group_by(warehouse_id) %>% 
  summarize(Count=n()) %>% 
  arrange(desc(Count))

#top reviwers sort
topreviewers<- ungroup(datRlab) %>% 
  group_by(lessee_id) %>% 
  summarize(Count=n()) %>%
  arrange(desc(Count))

data3<- data2[which(data2$Count >= medianProds),]
data3 <- data3[!duplicated(data3[,c(1:5)]),]


reviewer_count <- ungroup(data3) %>% 
  group_by(lessee_id) %>% 
  summarize(RCount = n())

data3 <- merge(data3, reviewer_count, by.x='lessee_id', by.y='lessee_id', all.x=T)

avg_rating <-round(mean(data3$weighted_average_rating), 2)

ggplot(data3[which(data3$RCount <= 50),], aes(x=Mean_score)) +
  geom_histogram(binwidth=.01, alpha=.5, position="identity") +
  geom_vline(aes(xintercept=mean(weighted_average_rating)), color="red") +
  annotate("text", x=4.6, y=1500, label=paste("Mean = ", avg_rating)) +
  labs(x="Mean Rating", y="Count",
       title="Distribution of Review Ratings") +
  theme_tufte()

ggplot(data3[which(data3$RCount <= 50),], aes(x=RCount)) +
  geom_histogram(binwidth=1, alpha=.5, position="identity") +
  labs(x="Count of Ratings", y="Count of Lessees",
       title="Distribution, Number of Ratings per Lessees") +
  theme_tufte()

data3$Rcut<-cut(data3$RCount, c(0,5,10,15,20,25,30,35,40,45,50,100,200))
statbox <- ungroup(data3) %>% 
  group_by(Rcut) %>% 
  summarize(avgRating = round(mean(weighted_average_rating, na.rm=T), 2),
            medRating = median(weighted_average_rating),
            sdRating = round(sd(weighted_average_rating, na.rm=T), 2))

colnames(statbox) <- c("Review Count", "Average Score", 
                       "Median Score", "Std Deviation")
kable(statbox)

g <- acast(datRlab, lessee_id ~ warehouse_id, value.var="weighted_average_rating")
R <- as.matrix(g)
r <- as(R, "realRatingMatrix")

#a sparce matrix
getRatingMatrix(r[c(1:5),c(1:4)])

hist(getRatings(normalize(r)), breaks=100, xlim = c(-2,2), main = "Normalized Scores Histogram")

average_ratings_per_user <- rowMeans(r)
describe(average_ratings_per_user)
average_ratings <- colMeans(r)
describe(average_ratings)


vector_ratings <- as.vector(r@data)
table_ratings <- table(vector_ratings)
table_ratings

#getting rid of rating=0
vector_ratings <- vector_ratings[vector_ratings != 0]
vector_ratings <- factor(vector_ratings)
qplot(average_ratings_per_user) + stat_bin(binwidth = 0.1) +
  ggtitle("Distribution of the average rating per user")
qplot(vector_ratings) + ggtitle("Distribution of the Ratings")

#creating recommender from first 50 users 
r.popular <- Recommender(r[1:50], method = "POPULAR")
#recommendations for []recommendations for following user not to "learn" the recommender model
recom <- predict(r.popular, r[51], n =5)

as(recom, "list")

#for lessees that have rated 2 warehouse at least Twice
wh_rating <- r[rowCounts(r) > 2, colCounts(r) > 3]
wh_rating2 <- wh_rating[rowCounts(wh_rating) > 2,]
wh_rating2

#randomly define for user in "training" set, probability is equal to 90% in set
which_train <- sample(x = c(TRUE, FALSE), size = nrow(wh_rating2), replace = TRUE, prob = c(0.8, 0.2))
class(which_train)

#defining sets for training and tests
recc_train <- wh_rating2[which_train, ]
recc_test <- wh_rating2[!which_train, ]

#recommender for item based collab filtering
model <- Recommender(data = recc_train, method = "IBCF", parameter = list(k = 30)) 
model_details = getModel(model)

#define n_recommended to recommend items to each user and with the predict function, create prediction(recommendations) for the test set.
n_recommended <- 5
recc_predicted <- predict(object = model, newdata = recc_test, n = n_recommended)


#first user's recommenddation
recc_predicted@items[[1]]

user_1 = recc_predicted@items[[1]]
jokes_user_1 <- recc_predicted@itemLabels[user_1]

#list of recommendations for each user
recc_matrix <- lapply(recc_predicted@items, function(x){
  colnames(wh_rating)[x]
})

#recommendations for first 4 users
recc_matrix[1:4]

#accuracy test: Evaluation Scheme
n_fold <- 4
rating_threshold <- 3.5 # threshold at which we consider the item to be good
items_to_keep <- 3 # arbitrary number. This was chosen as it was less than rowCounts(r) < 2 
eval_sets <- evaluationScheme(data = wh_rating2, method = "cross-validation", k = n_fold, given = items_to_keep, goodRating = rating_threshold)

size_sets <-sapply(eval_sets@runsTrain, length)

#Example
model_to_evaluate <- "IBCF"
model_parameters <- NULL
eval_recommender <-Recommender(data = getData(eval_sets, "train"), method = model_to_evaluate, parameter = model_parameters)

# The IBCF can recommend new items and predict their ratings. In order to build the model, we need to specify how many items we want to recommend, for example, 5.
items_to_recommend <- 4

# We can build the matrix with the predicted ratings using the predict function:
eval_prediction <- predict(object = eval_recommender, newdata = getData(eval_sets, "known"), n = items_to_recommend, type = "ratings")

# By using the calcPredictionAccuracy, we can calculate the Root mean square error (RMSE), Mean squared error (MSE), and the Mean absolute error (MAE).
eval_accuracy <- calcPredictionAccuracy(x = eval_prediction, data = getData(eval_sets, "unknown"), byUser = TRUE)

# This is a small sample of the results for the Prediction and Accuracy
head(eval_accuracy)

#evaluating model as whole, change byUser to false
eval_accuracy <- calcPredictionAccuracy(x = eval_prediction, data = getData(eval_sets, "unknown"), byUser = FALSE)

#get the confusion matrix
results <- evaluate(x = eval_sets, method = model_to_evaluate, n = seq(10, 100, 10))

#look at the first element
head(getConfusionMatrix(results)[[1]])
# True Positives (TP): These are recommended items that have been purchased.
# False Positives (FP): These are recommended items that haven't been purchased
# False Negatives (FN): These are not recommended items that have been purchased.
# True Negatives (TN): These are not recommended items that haven't been purchased.

#taking account of all the splits at the same time
columns_to_sum <- c("TP", "FP", "FN", "TN")
indices_summed <- Reduce("+", getConfusionMatrix(results))[, columns_to_sum]
head(indices_summed)

#plotting results on ROC curve
plot(results, annotate = TRUE, main = "ROC curve")

plot(results, "prec/rec", annotate = TRUE, main = "Precision-Recall")

models_to_evaluate <- list(IBCF_cost = list(name = "IBCF", param = list(method = "cosine")), IBCF_cor = list(name = "IBCF", param = list(method = "pearson")), UBCF_cos = list(name = "UBCF", param = list(method = "cosine")), UBCF_cor = list(name = "UBCF", param = list(method = "pearson")), random = list(name = "RANDOM", param = NULL))
# In order to evaluate the models, we need to test them, varying the number of items.
n_recommendations <- c(1,5,seq(10,100,10))

list_results <- evaluate(x = eval_sets, method = models_to_evaluate, n = n_recommendations)

#extracting related average confusion matrices
avg_matrices <- lapply(list_results, avg)

#performance evaulation. For example, IBCF with Cosine distance
head(avg_matrices$IBCF_cos[, 5:8])

#most suitable model
plot(list_results, annotate = 1, legend = "topleft")
title("ROC curve")