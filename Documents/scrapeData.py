#script to scrape data from csv set, getting only datapoints relevant to us

import csv 

### Importing products in grocery stores
#Headers: product_id, product_name, aisle_id, department_name
readDataProducts = csv.reader(open('dataset/instacart/products.csv'), delimiter=' ', quotechar = '|')
temp=[]
for data in readDataProducts:
	temp+= [', '.join(data)]
newDataProducts = []
for i in range(0,2000,2):
	newDataProducts+=[temp[i]]

#import new dataset to csv file
with open('dataset/instacart/productSubset.csv', 'a') as newFile:
    newFileWriter = csv.writer(newFile)
    for i in range(len(newDataProducts)):
    	newFileWriter.writerow(newDataProducts[i])
    	

    
