#include <cs50.h>
#include <time.h>
#include <stdlib.h>
#include <stdio.h>

int main(int argc, string argv[]) {
    int random; // random integer 0 - MAX
    int myint; // random integer 1 - 10
    int user_int; // user try
    
    if(argc != 2)
    {
        printf("missing argument\n");
        return 1;
    }
    
    srand(time(NULL)); // init rand()
    random = rand(); // get random integer
    
    myint = (random % 3) + 1;
    
    user_int = atoi(argv[1]); // read user integer (convert from string)
    
    if(user_int == myint)
    {
        printf("good!");
    }
    else 
    {
        printf("bad\n try again\n");
    }
}