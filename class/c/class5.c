#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <ctype.h>

// [0] - letter
// [1] - count
//
// return 1 - exists, 0 - not
int letter_exists(int sum[][2], char letter)
{
    int pos = 0;
    while(sum[pos][0])
    {
        if(sum[pos][0] == letter)
        {
            return 1;
        }
        pos++;
    }
    return 0;
}

void letter_plus(int sum[][2], int letter)
{
    int pos = 0;
    while(sum[pos][0])
    {
        if(sum[pos][0] == letter)
        {
            sum[pos][1]++;
        }
        pos++;
    }
}

void init_sum_array(int sum[0][2])
{
    for(int i = 0; i < 127; i++)
    {
        for(int j = 0; j < 2; j++)
        {
            sum[i][j] = 0;
        }
    }
}

int main(void)
{
    char text[] = "Text Text T2!";
    int string_len = strlen(text);
    int sum_pos = 0; // position in array "sum"
    int sum[127][2];
    init_sum_array(sum);
    
    for(int pos = 0; pos <= string_len; pos++)
    {
        if(isalpha(text[pos]))
        {
            if(! letter_exists(sum, text[pos]))
            {
                sum[sum_pos][0] = text[pos];
                sum[sum_pos][1] = 1;
                sum_pos++;
            }
            else
            {
                letter_plus(sum, text[pos]);
            }
        }
    }
    for(int let_pos = 0; let_pos < 127; let_pos++)
    {
        if(sum[let_pos][0] == 0)
            break;
        printf("%c - %d\n", (char) sum[let_pos][0], sum[let_pos][1]);
    }
}