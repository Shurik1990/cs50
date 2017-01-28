#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>

int main(int argc, string argv[])
{
    if(argc != 2)
    {
        printf("error\n");
        return 1;
    }

    char *k = argv[1];
    int lenght = strlen(k);

    for(int i = 0; i < lenght; i++)
    {
        if(!isalpha(k[i]))
        {
        printf("error\n");
        return 1;
        }
        if(isupper(k[i]))
        {
            k[i] = k[i] - 65;
        }
        else if(islower(k[i]))
        {
            k[i] = k[i] - 97;
        }
    }
        
    string s = GetString();
        
    int j = 0;
    
    for(int i = 0, n = strlen(s); i < n; i++)
    {
        if(isupper(s[i]))
        {
            printf("%c", (((s[i] - 65) + (k[j % lenght])) % 26) + 65);
            j += 1;
        }
        else if (islower(s[i]))
        {
            printf("%c", (((s[i] - 97) + (k[j % lenght])) % 26) + 97);
            j += 1;
        }
        else
        {
           printf("%c", s[i]);
        }
    }
    printf("\n");
    return 0;
}