#include <cs50.h>
#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>
#include <ctype.h>

#define MAX_STR_LEN 50

void trim(char * s) {
    char * p = s;
    int l = strlen(p);

    while(isspace(p[l - 1])) p[--l] = 0;
    while(* p && isspace(* p)) ++p, --l;

    memmove(s, p, l + 1);
}

void parse_str(char *str, char * key, char * value)
{
/*
    char key[MAX_STR_LEN];
    char value[MAX_STR_LEN];
    */
    int b_value = 0; // это уже value
    int val_i = 0;
    
    for(int i = 0; i < MAX_STR_LEN; i++)
    {
        if ( str[i] == '=' && b_value == 0)
        {
            b_value = 1;
        }
        else if ( ! b_value )
        {
            key[i] = str[i];
        }
        else
        {
            value[ val_i++ ] = str[i];
        }
        
        if( ! str[i] )
            break;
    }
    
    trim(key);
    trim(value);
    /*
    printf("%s\n", key);
    printf("%s\n", value);
    *//*
    strcpy(data_l[0], key);
    strcpy(data_l[1], value);*/
    
}


void parse_str0(char *str)
{

    char key[MAX_STR_LEN];
    char value[MAX_STR_LEN];
    int b_value = 0; // это уже value
    
    int counter = 0;
    while( *(str + counter) && counter < MAX_STR_LEN )
    {
        if ( ! b_value )
        {
            key[counter] = *(str + counter);
        }
        else
        {
            value[counter] = *(str + counter);
        }
        
        counter++;
        printf("%c", *(str + counter));
    }
   printf("%s", key);
   // printf("%s", value);
    
}


int main(void)
{
    FILE* file;
    
    char data[20][2][MAX_STR_LEN]; // Массив с данными из конфига
    
    for(int i = 0; i < 20; i++)
    {
        for(int j = 0; j < MAX_STR_LEN; j++)
        {
            data[i][0][j] = (char) NULL;
            data[i][1][j] = (char) NULL;
        }
    }
    
    file = fopen("config.txt", "r");
    
    int data_line = 0;
    char curr_str[MAX_STR_LEN];
    while( ! feof(file) )
    {
        if( fgets(curr_str, MAX_STR_LEN, file) != NULL)
        {
            parse_str(curr_str, data[data_line][0], data[data_line][1]);
        }
    }
    
    
    int line = 0;
    while( data[line][0][0] )
    {
        printf("%s", data[line][0]);
        line++;
    }
    
}