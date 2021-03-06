import pymongo, urllib.parse, mysql.connector, random

client = pymongo.MongoClient("mongodb+srv://food_delivery:" + urllib.parse.quote("contech@2021") + "@food-delivery.3ukn0.mongodb.net/food_delivery?retryWrites=true&w=majority")
mydb = client["food_delivery"]
mycol = mydb["login"]
db = client.test

mydb = mysql.connector.connect(
	host="sql290.main-hosting.eu",
	user="u117204720_food_club",
	password="5$pANyPa^APH",
	database="u117204720_food_club"
)
login_details = {}
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM login")
login = mycursor.fetchall()
for customer in login:
	dic={"email":customer[0].lower(),"password":customer[1],"type":"1"}
	result = mycol.insert_one(dic)
	print(str(result))