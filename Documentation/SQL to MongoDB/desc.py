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
			main_data[lines[x]]=lines[x+1]
	print(main_data)
