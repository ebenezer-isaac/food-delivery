import mysql.connector, random

mydb = mysql.connector.connect(
  host="sql290.main-hosting.eu",
  user="u117204720_food_club",
  password="5$pANyPa^APH",
  database="u117204720_food_club"
)
mycursor = mydb.cursor()

f = open("customer.txt", "r")
data = f.readlines()
print(data)
for line in data:
	line.replace("\n","")
	line = line.split("__") 
	sql = "INSERT INTO `customer`(`email`, `name`, `phone`, `address`, `preference`) VALUES (%s,%s,%s,%s,%s)"
	val = (line[0],line[1].title(),line[2],line[3].title(),line[4].title())
	mycursor.execute(sql, val)
	sql = "INSERT INTO `login`(`email`, `password`) VALUES (%s,%s)"
	val = (line[0],"312433c28349f63c4f387953ff337046e794bea0f9b9ebfcb08e90046ded9c76")
	mycursor.execute(sql, val)
	print(line[0], "completed")
mydb.commit()
