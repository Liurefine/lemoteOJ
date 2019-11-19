n=int(input())
for i in range(1,n+1):
   amount=int(input())
   day=1
   while(1):
        dpt=Deposit(day)
        wd=Withdraw(day,amount)
        if dpt-wd>0:
           print("{}天骗取现金{}元".format(day,dpt-wd))
           break;
        day+=1
