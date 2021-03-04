import pymongo, urllib.parse, mysql.connector, random

client = pymongo.MongoClient("mongodb+srv://food_delivery:" + urllib.parse.quote("contech@2021") + "@food-delivery.3ukn0.mongodb.net/food_delivery?retryWrites=true&w=majority")
mydb = client["food_delivery"]
mycol = mydb["restaurants"]

mydb = mysql.connector.connect(
	host="sql290.main-hosting.eu",
	user="u117204720_food_club",
	password="5$pANyPa^APH",
	database="u117204720_food_club"
)

agent_details = {}
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM restaurants")
result = mycursor.fetchall()
for restaurant in result:
	mycursor = mydb.cursor()
	mycursor.execute("SELECT * FROM restaurant_dishes where restaurant_id = "+str(restaurant[0]))
	result1 = mycursor.fetchall()
	dish_details={}
	for dish in result1:
		dish_detail={"category":str(dish[2]).replace("\n","").strip().title(),"cuisine":str(dish[3]).replace("\n","").strip().title(),"name":str(dish[4]).replace("\n","").strip().title(),"pic":str(dish[5]),"taste":str(dish[6]).replace("\n","").strip().title(),"price":str(dish[7])}
		dish_details[str(dish[0])]=dish_detail
	restaurant_detail={"id":str(restaurant[0]).replace("\n","").strip().title(),"name":str(restaurant[1]).replace("\n","").strip().title(),"rating":str(restaurant[2]).replace("\n","").strip().title(),"address":str(restaurant[3]).replace("\n","").strip().title(),"dishes":dish_details}
	result = mycol.insert_one(restaurant_detail)
	print(str(result))