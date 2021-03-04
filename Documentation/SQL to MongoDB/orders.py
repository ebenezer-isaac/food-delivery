import pymongo, urllib.parse, mysql.connector, random

client = pymongo.MongoClient("mongodb+srv://food_delivery:" + urllib.parse.quote("contech@2021") + "@food-delivery.3ukn0.mongodb.net/food_delivery?retryWrites=true&w=majority")
mydb = client["food_delivery"]
mycol = mydb["orders"]

mydb = mysql.connector.connect(
	host="sql290.main-hosting.eu",
	user="u117204720_food_club",
	password="5$pANyPa^APH",
	database="u117204720_food_club"
)

order_details = {}
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM orders")
result = mycursor.fetchall()
for order in result:
	sql = "SELECT * FROM ordered_dishes where order_id = "+str(order[0])
	mycursor.execute(sql)
	result1 = mycursor.fetchall()
	ordered_dishes={}
	for ordered_dish in result1:
		sql = "SELECT * FROM restaurant_dishes where dish_id = "+str(ordered_dish[1])
		mycursor.execute(sql)
		result2 = mycursor.fetchall()
		for dish in result2:
			dish_detail={
				"category":str(dish[2]).replace("\n","").strip().title(),
				"cuisine":str(dish[3]).replace("\n","").strip().title(),
				"name":str(dish[4]).replace("\n","").strip().title(),
				"pic":str(dish[5]),
				"taste":str(dish[6]).replace("\n","").strip().title(),
				"price":str(ordered_dish[2]),
				"quantity":str(ordered_dish[3])
			}
			ordered_dishes[str(ordered_dish[1])]=dish_detail
	order_detail={
		"order_id":str(order[0]).replace("\n","").strip().title(),
		"email":str(order[1]).replace("\n","").strip().title(),
		"restaurant_id":str(order[2]).replace("\n","").strip().title(),
		"agent_id":str(order[3]).replace("\n","").strip().title(),
		"date_time":str(order[4]).replace("\n","").strip().title(),
		"delivery_address":str(order[5]).replace("\n","").strip().title(),
		"status":str(order[6]).replace("\n","").strip().title(),
		"feedback":str(order[7]).replace("\n","").strip().title(),
		"ordered_dish":ordered_dishes
	}
	mongo_result = mycol.insert_one(order_detail)
	print(str(mongo_result))
