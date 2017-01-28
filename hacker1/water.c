#include <cs50.h>
#include <stdio.h>

int GetPositiveInt(void);

int main(void)
{
    int minutes = GetPositiveInt();
    int bottles = 0;
    bottles = minutes * 12;
    printf("bottles: %i!\n", bottles);
}

int GetPositiveInt(void)
{
    int minutes;
    do
    {
        printf("minutes: ");
        minutes = GetInt();
    }
    while (minutes <= 0);
    return minutes;
}
