import mysql.connector, random

mydb = mysql.connector.connect(
  host="sql290.main-hosting.eu",
  user="u117204720_food_club",
  password="5$pANyPa^APH",
  database="u117204720_food_club"
)
mycursor = mydb.cursor()

f = open("agent.txt", "r")
data = f.readlines()
print(data)
for line in data:
	line.replace("\n","")
	line = line.split("__") 
	print(line)
	sql = "INSERT INTO `agent`(`agent_id`, `name`, `phone`, `joindate`, `vehicle_no`, `vehicle_model`) VALUES (%s,%s,%s,%s,%s,%s)"
	val = (line[0],line[1],line[2],line[3],line[4],line[5])
	mycursor.execute(sql, val)
	print(line[0], "completed")
mydb.commit()
