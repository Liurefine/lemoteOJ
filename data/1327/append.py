def f(n):
    cc=0
    for i in range(1,n+1):
        if n%i==0 and  fun(i):
            cc+=1
    return cc
            
n=eval(input())
c=0
for i in range(2,n+1):
    c+=f(i)
print(c)