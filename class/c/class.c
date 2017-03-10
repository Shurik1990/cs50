#include <cs50.h>
#include <stdio.h>

int main(void)

{
    int number;
    number = 9; //3
    int test = 1;
    int res = 0;
    while (test <= number)
    {
        test = test * 2;
        res++;
    }
    printf("result: %d\n", res);
}