int main()
{
    int n,i,max,min;//n学生数
    double avg;
    scanf("%d",&n);
    int a[n];
    for (i = 0; i < n; i ++)
        scanf("%d",&a[i]);
    avg = FunCount(a,n,&max,&min);
    //输出
    printf("%.2f %d %d\n",avg,max,min);
    for (i = 0; i < n-1; i ++)
        printf("%d ",a[i]);
    printf("%d",a[i]);
    putchar('\n');
    return 0;
}