import pymongo, urllib.parse, mysql.connector, random

client = pymongo.MongoClient("mongodb+srv://food_delivery:" + urllib.parse.quote("contech@2021") + "@food-delivery.3ukn0.mongodb.net/food_delivery?retryWrites=true&w=majority")
mydb = client["food_delivery"]
mycol = mydb["agents"]

mydb = mysql.connector.connect(
	host="sql290.main-hosting.eu",
	user="u117204720_food_club",
	password="5$pANyPa^APH",
	database="u117204720_food_club"
)
agent_details = {}
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM agent")
result = mycursor.fetchall()
for agent in result:
	agent_detail={"id":str(agent[0]).replace("\n","").strip().title(),"name":str(agent[1]).replace("\n","").strip().title(), "phone":str(agent[2]).replace("\n","").strip(), "joindate":str(agent[3]).replace("\n","").strip(), "vehicle_no":str(agent[4]).replace("\n","").strip().upper(), "vehicle_model":str(agent[5]).replace("\n","").strip().title()}
	result = mycol.insert_one(agent_detail)
	print(str(result))