result = 1;
n=int(input())
if n <= 0:   
    print("Input data error!")  
else:
    for i in range(1,n+1):
        result = Facto(i);
        print("{}!={}".format(i, result))
