#include <cs50.h>
#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>

#define MAX_LENGTH 50

void get_last_city(FILE ** file, char* last_city)
{
    fseek(*file, MAX_LENGTH, SEEK_END);
    
    char old_city[MAX_LENGTH];
    
    while(! feof(*file))
    {
           if(fgets(last_city, MAX_LENGTH, *file) != NULL)
           {
               strcpy(last_city, old_city);
           }
    }
}

int main(int argc, string argv[]){
    
    string city; // новый город
    char last_city[MAX_LENGTH]; // последний город
    char last_letter = '0'; // последняя буква в городе
    
    int b_new_game = 0; // начинаем новую игру
    
    if(argc > 1)
    {
        if(strcmp(argv[1], "new"))
        {
            b_new_game = 1;
        }
    }
    
    FILE* file;
    
    if(b_new_game == 1)
    {
        // rewrite file
        file = fopen("cities.txt", "a+");
    }
    else
    {
        // continue writing to file
        file = fopen("cities.txt", "a+");
    }
    
    get_last_city(&file, last_city);
    last_letter = last_city[strlen(last_city) - 1];
    printf("Last city: %c\n", last_letter);
    
    do
    {
        if(last_letter != '0')
        {
            printf("Enter city. First letter: %c\n", last_letter);
        }
        else
        {
            printf("Enter city:\n");
        }
    
        city = GetString();
        
        // Force return
        if ( strcmp (city, "0\0") == 0 )
        {
            printf("Game Over!\n");
            break;
        }
        
        // сравниваем первую букву города
        if(last_letter != '0')
        {
            if(city[0] != last_letter)
            {
                printf("Letter not right!\n");
                continue;
            }
        }
        
        rewind(file);
        
        int b_city_exist = 0; // такого города нет в файле
        
        char old_city[MAX_LENGTH];
        
        while(! feof(file))
        {
            if ( fgets(old_city, MAX_LENGTH, file) != NULL )
            {
                old_city[ strcspn (old_city, "\n") ] = 0; // Затираем символ переноса в конце строки
                
               //    printf("%s", old_city);
               
               if ( strcmp (old_city, city) == 0 )
               {
                   b_city_exist = 1;
                   break;
               }
            }
        }
        
        if(b_city_exist)
        {
            printf("City exist. Enter again!\n");
        }
        else
        {
            fseek(file, 0, SEEK_END);
            
            fputs(city, file);
    
            fputs("\n", file);
            
            // копируем последний город
            strcpy(last_city, city);
            
            last_letter = last_city[strlen(last_city) - 1];
            printf("City save!\n");
        }
    }
    while(strcmp(city, "0\n") != 0);
    
    fclose(file);
}