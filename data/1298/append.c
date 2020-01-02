int main()
{
    int num,a[N],i,women_cnt,man_cnt;
    scanf("%d",&num);
    while (num)
    {
        for(i=0; i<num; i++)
            scanf("%d",&a[i]);
        fun(a,num,&women_cnt,&man_cnt);
        printf("women_cnt=%d,man_cnt=%d\n",women_cnt,man_cnt);
        scanf("%d",&num);
    }
    return 0;
}