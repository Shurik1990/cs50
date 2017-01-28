#include <cs50.h>
#include <stdio.h>

int main(void)
{
    int height = 0;
    
    do 
    {
      printf("Height: ");
      height = GetInt();  
      
        if (height == 0)
        {
            return 0;
        }
    }
    while (height < 1 || height > 23);
        
            for (int level = 0; level < height; level++) 
        {
            for (int spaces = 0; spaces < height - level - 1; spaces++)
            {
                printf(" ");
            }
            for (int dashes = height - level; dashes <= height; dashes++) // left pyramid
            {
                printf("#");
            }
            printf("  "); // gap without pyramids
            for ( int dashes = height - level; dashes <= height; dashes++) // right pyramid
            {
                printf("#");
            }
            printf("\n");
        }
        
    return 0;
}