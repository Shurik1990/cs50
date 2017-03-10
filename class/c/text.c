#include <cs50.h>
#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>

#define MAX_STR_LENGTH 500

int main(void)
{
    int words_count = 0;
    
    FILE * file;
    
    file = fopen("text.txt", "r");
    
    char tmp_string[MAX_STR_LENGTH];
    
    while(! feof(file) != 0)
    {
        if(fgets(tmp_string, MAX_STR_LENGTH, file) == NULL)
        {
        continue;
        }
        
        char * str_word;
        
        char word_delim[] = " \n";
    
        str_word = strtok(tmp_string, word_delim);
        
        while(str_word != NULL)
        {
           words_count++;
           
           str_word = strtok(NULL, word_delim); 
        }
    }
    
    fclose(file);
    
    printf("Words count: %d\n", words_count);
}