#include <cs50.h>
#include <time.h>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>

int main(int argc, string argv[])
{
    if(argc != 2)
    {
        printf("error\n");
        return 1;
    }
    
    int length = strlen(argv[1]);
    char revert[length + 1];
    
    int counter = 0;
    for(int i = length - 1; i >= 0; i--)
    {
        revert[counter++] = argv[1][i];
    }
    printf("%s\n", revert);
}