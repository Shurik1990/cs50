#include <cs50.h>
#include <stdio.h>

int main(void) {
    
    int num; // user integer
    printf("Enter number: ");
    num = GetInt();
    
    int last; // last (right) digit
    int digit = num; // оставшиеся цифры
    int sum = 0; // digits sum
    
    int mod = 1; // integer x10
    while(mod < num)
    {
        // умножаем число на 10 (сдвиг на цифру)
        mod = mod * 10; // each step x10
        
        // получаем правую цифру, прибавляем её к сумме
        last = num % 10; // right integer
        sum = sum + last;
        
        digit = (digit - last) / 10;
        
        printf("last %d:\n", last);
    }
    
    printf("last %d:\n", num);
}