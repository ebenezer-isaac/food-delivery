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
agent_details = {}
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM agent")
result = mycursor.fetchall()
for agent in result:
	agent_detail={"name":str(agent[1]).replace("\n","").strip().title(), "phone":str(agent[2]).replace("\n","").strip(), "joindate":str(agent[3]).replace("\n","").strip(), "vehicle_no":str(agent[4]).replace("\n","").strip().upper(), "vehicle_model":str(agent[5]).replace("\n","").strip().title()}
	agent_details[str(agent[0])]=agent_detail
dic={"agents":agent_details}
result = mycol.insert_one(dic)
print(str(result))