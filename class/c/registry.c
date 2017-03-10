#include <cs50.h>
#include <stdio.h>
#include <string.h>

int main(void)
{
   // char word[] = "Text";
    printf("Your text:\n");
    string word = GetString();
    int lenght;
    
    lenght = strlen(word);
    for(int pos = 0; pos <= lenght; pos++)
    {
        if(word[pos] >= 97 && word[pos] <= 122)
        {
            word[pos] = word[pos] - 32;
        }
        else if(word[pos] >= 65 && word[pos] <= 90)
        {
            word[pos] = word[pos] + 32;
        }
    }
    
    printf("%s\n", word);
}