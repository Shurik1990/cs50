#include <cs50.h>
#include <time.h>
#include <stdlib.h>
#include <stdio.h>


int getSum(int num)
{
    if (num > 0)
    {
        return num + getSum(num - 1);
    }
    else {
        return 0;
    }
//    int sum = getSum(num - 1);
}


int main(void)
{
    int sum = getSum(6);
    
    printf("%d\n", sum);
    
}