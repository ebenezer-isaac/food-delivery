import os
files = [f for f in os.listdir('.') if os.path.isfile(f)]
counter = 1
for file in files:
	os.rename(file, "res_"+("{:05d}".format(counter))+".jpg") 
	counter = counter +1
	print(file, "res_"+("{:05d}".format(counter))+".jpg") 