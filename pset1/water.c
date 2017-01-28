#include <cs50.h>
#include <stdio.h>

int main(void)
{
    printf("minutes: ");
    int bottles;
    int minutes;
    minutes = GetInt();
    bottles = minutes * 12;
    printf("bottles: %i\n", bottles);
}