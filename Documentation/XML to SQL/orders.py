import mysql.connector, random

import random
import time

def str_time_prop(start, end, format, prop):
    stime = time.mktime(time.strptime(start, format))
    etime = time.mktime(time.strptime(end, format))
    ptime = stime + prop * (etime - stime)
    return time.strftime(format, time.localtime(ptime))
def random_date(start, end, prop):
    return str_time_prop(start, end, '%Y/%m/%d %H:%M:%S', prop)



mydb = mysql.connector.connect(
  host="sql290.main-hosting.eu",
  user="u117204720_food_club",
  password="5$pANyPa^APH",
  database="u117204720_food_club"
)
mycursor = mydb.cursor()
customers=[]
mycursor.execute("SELECT email, address FROM customer")
myresult = mycursor.fetchall()
status=["Delivered", "On The Way", "Cancelled"]
order_id = 1 
for customer in myresult:
	customers.append([customer[0],customer[1]])
for restaurant_id in range(1,33):
	restaurant_dishes = []
	mycursor.execute("SELECT dish_id, price FROM restaurant_dishes where restaurant_id = "+str(restaurant_id))
	myresult = mycursor.fetchall()
	for dish in myresult:
		restaurant_dishes.append([dish[0],dish[1]])
	orders_count = random.randint(15, 30)
	for order_counter in range(0,orders_count):
		agent_id = random.randint(1,50)
		customer_id = random.randint(0,63)
		dish_count = random.randint(2, 8)
		dish_taken=[]
		sql = "INSERT INTO `orders`(`order_id`,`email`, `restaurant_id`, `agent_id`, `date_time`, `delivery_address`, `status`, `feedback`)  VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"
		random_status = random.randint(0,2)
		random_feedback = random.randint(1,15)
		val = (order_id, customers[customer_id][0], restaurant_id, agent_id, random_date("2021/01/01 01:30:00", "2021/02/07 23:59:00", random.random()) , customers[customer_id][1], status[random_status], str(5-(random_feedback/10)))
		mycursor.execute(sql, val)
		mydb.commit()
		for dish_counter in range(0,dish_count):
			dish_id = random.randint(0, len(restaurant_dishes)-1)
			while(dish_id in dish_taken):
				dish_id = random.randint(0, len(restaurant_dishes)-1)
			dish_taken.append(dish_id)
			quantity = random.randint(1,8)
			sql = "INSERT INTO `ordered_dishes`(`order_id`, `dish_id`, `price`, `quantity`) VALUES (%s,%s,%s,%s)"
			val = (order_id, restaurant_dishes[dish_id][0], restaurant_dishes[dish_id][1], quantity)
			mycursor.execute(sql, val)
		print(order_id, restaurant_id, customers[customer_id][0], agent_id, status[random_status], str(5-(random_feedback/10)), dish_count)
		order_id = order_id+1
	print(restaurant_id, "completed")
mydb.commit()