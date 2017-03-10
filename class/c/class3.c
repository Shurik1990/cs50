#include <cs50.h>
#include <math.h>
#include <stdio.h>

int main(void) {
    
    int min = 9999;
    int num;
    
    do
    {
        num = GetInt();
        
        if (num < min && num > 0) {
            min = num;
        }
    }
    
    while (num > 0);
    
    printf("min: %d\n", min);
}