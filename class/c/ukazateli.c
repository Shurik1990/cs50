#include <cs50.h>
#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <time.h>
#include <string.h>

int main(void)
{
    char massiv[] = "abcdef"; // 7 байт
    
    char * one_char;
    
    printf("Original string:  %s\n", massiv);
    printf("Original size:  %lu\n", sizeof(massiv));
    
    one_char = massiv;
    
    *one_char = 'A';
    
    one_char = &massiv[5];
    
    *one_char = 'F';
    
    *(massiv + 2) = 'C';
    
    printf("Replaced string:  %s\n", massiv);
    
    *(massiv + 6) = 'A';
    *(massiv + 7) = 'A';
    
    printf("Replaced string:  %s\n", massiv);
    
    char * im_true = "true";
    char * im_false = "false";
    
    char *tmp_ptr;
    
    tmp_ptr = im_true;
    im_true = im_false;
    im_false = tmp_ptr;
    
    printf("True:  %s\n", im_true);
    printf("False:  %s\n", im_false);
}