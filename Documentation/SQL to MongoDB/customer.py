import pymongo, urllib.parse, mysql.connector, random

client = pymongo.MongoClient("mongodb+srv://food_delivery:" + urllib.parse.quote("contech@2021") + "@food-delivery.3ukn0.mongodb.net/food_delivery?retryWrites=true&w=majority")
mydb = client["food_delivery"]
mycol = mydb["food_delivery"]
db = client.test

mydb = mysql.connector.connect(
  host="sql290.main-hosting.eu",
  user="u117204720_food_club",
  password="5$pANyPa^APH",
  database="u117204720_food_club"
)
customer_details = {}
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM customer")
result = mycursor.fetchall()
for customer in result:
	customer_detail={"name":customer[1].replace("\n","").strip().title(),"phone":customer[2],"address":customer[3].replace("\n","").strip().title(),"preference":customer[4].replace("\n","").strip().upper()}
	customer_details[customer[0].replace(".","_dot_")]=customer_detail
dic={"customers":customer_details}
result = mycol.insert_one(dic)
print(str(result))