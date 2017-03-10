#include <cs50.h>
#include <stdio.h>

int main(int argc, string argv[])
{
    if(argc != 2)
    {
        printf("Error\n");
        return 1;
    }
    int mask = atoi(argv[1]);
    
    if(mask & 0b1000)
    {
        printf("Calculate first block\n"); //8
    }
    if(mask & 0b0100)
    {
        printf("Calculate second block\n"); //4
    }
    if(mask & 0b0010)
    {
        printf("Calculate third block\n"); //2
    }
    if(mask & 0b0001)
    {
        printf("Calculate four block\n"); //1
    }
    printf("%d\n", mask);
}