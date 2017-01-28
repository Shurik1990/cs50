#include <cs50.h>
#include <time.h>
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>


int main(int argc, string argv[])
{
    if(argc != 2)
    {
        printf("error\n");
        return 1;
    }
    int k = atoi(argv[1]);
    
    if(k < 0)
    {
        printf("error\n");
        return 1;
    }
    else
    {
        string s = GetString();
        
        for (int i = 0, n = strlen(s); i < n; i++)
        {
            if islower(s[i])
                    printf("%c", (((s[i] + k) - 97) % 26) + 97);
                else if isupper(s[i])
                    printf("%c", (((s[i] + k) - 65) % 26) + 65);
                else
            printf("%c", s[i]);
        }
    }
    printf("\n");
    return 0;
}