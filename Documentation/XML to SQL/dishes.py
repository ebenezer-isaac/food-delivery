import mysql.connector, random

f = open("dishes.txt", "r")
text = f.readlines()
data = ""
for line in text:
	data = data+line
data = data.split("____") 
counter = 0
for line in data:
	line = line.split(",")
	data[counter] = line
	counter = counter +1
mydb = mysql.connector.connect(
  host="sql290.main-hosting.eu",
  user="u117204720_food_club",
  password="5$pANyPa^APH",
  database="u117204720_food_club"
)
mycursor = mydb.cursor()
print(data)
for restaurant_id in range(1,34):
	dishes_count = random.randint(25, 35)
	print(restaurant_id, dishes_count)
	dish_taken=[]
	for dish_counter in range(0,dishes_count):
		dish_id = random.randint(0, 49)
		print(dish_id)
		while(dish_id in dish_taken):
			dish_id = random.randint(0, 49)
			print(dish_id)
		dish_taken.append(dish_id)
		print("---",dish_id,"---")
		price_variation = random.randint(-6,6)
		sql = "INSERT INTO `restaurant_dishes`(`restaurant_id`, `category`, `cuisine`, `name`, `taste`, `price`) VALUES (%s,%s,%s,%s,%s,%s)"
		val = (restaurant_id, data[dish_id][1].title(),data[dish_id][0].title(),data[dish_id][3].title(),data[dish_id][5].title(),(int(data[dish_id][6])+(price_variation*5)))
		mycursor.execute(sql, val)
	print(restaurant_id, "completed")


mydb.commit()

print(mycursor.rowcount, "record inserted.")
