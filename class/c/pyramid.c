#include <cs50.h>
#include <stdio.h>

int main(void)

{
    int height;
    printf("Enter height of pyramid: ");
    height = GetInt();
    int max = height * 2 - 1;
    int middle = height;
    
    for (int level = 1; level <= height; level++)
    {
        for (int pos = 1; pos <= max; pos++)
        {
            if (
                (pos >= height - level + 1 && pos <= middle) // left
            ||
                (pos >= middle && pos <= max - (height - level)) // right
                )
            {
                printf("#");
            }
            else
            {
                printf(" ");
            }
        }
        printf("\n");
    }
}