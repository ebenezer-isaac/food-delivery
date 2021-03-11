import pymongo, urllib.parse, mysql.connector, random

with open("desc.txt", encoding = 'utf-8', errors='ignore') as f:
	lines = f.readlines()
	lines_clean= []
	for line in lines:
		line = line.strip()
		if not line =='\n':
			if not line =='':
				lines_clean.append(line)
	for x in range(0, len(lines_clean)):
		if x+1<len(lines_clean):
			if len(lines_clean[x])>30 and len(lines_clean[x+1])>30:
				lines_clean[x]=lines_clean[x]+lines_clean[x+1]
				lines_clean[x+1]=""
				x=x+1
	lines = []
	for line in lines_clean:
		line = line.strip()
		if not line =='\n':
			if not line =='':
				lines.append(line)
	main_data={}
	for x in range(0, len(lines),2):
		if x+1<len(lines):
			main_data[lines[x].title()]=lines[x+1]

client = pymongo.MongoClient("mongodb+srv://food_delivery:" + urllib.parse.quote("contech@2021") + "@food-delivery.3ukn0.mongodb.net/food_delivery?retryWrites=true&w=majority")
mydb = client["food_delivery"]
rest_col = mydb["restaurants"]
dish_col = mydb["dishes"]

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
	dish_details=[]
	for dish in result1:
		dish_detail={"res_id":str(restaurant[0]).replace("\n","").strip().title(),"dish_id":str(dish[0]).replace("\n","").strip().title(),"category":str(dish[2]).replace("\n","").strip().title(),"cuisine":str(dish[3]).replace("\n","").strip().title(),"name":str(dish[4]).replace("\n","").strip().title(),"pic":str(dish[5])
		,"taste":str(dish[6]).replace("\n","").strip().title(),"price":str(dish[7]),"description":main_data[str(dish[4]).replace("\n","").strip().title()]}
		dish_details.append(dish_detail)
	restaurant_detail={"res_id":str(restaurant[0]).replace("\n","").strip().title(),"name":str(restaurant[1]).replace("\n","").strip().title(),"rating":str(restaurant[2]).replace("\n","").strip().title(),"address":str(restaurant[3]).replace("\n","").strip().title()}
	rest_result = rest_col.insert_one(restaurant_detail)
	print(str(rest_result))
	dish_result = dish_col.insert_many(dish_details)
	print(str(dish_result))