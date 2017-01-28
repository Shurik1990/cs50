#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>

int main(void) {
    string s = GetString();
    
    if(s != NULL)
    {
        if (!isspace(s[0]))
        {
            printf("%c", toupper(s[0]));
        }
    }

    for (int i = 0, n = strlen(s) - 1; i < n; i++)
        if(s[i] == ' ' && s[i + 1] != ' ')
            {
                printf("%c", toupper(s[i + 1]));
                i++;
            }
    printf("\n");
}