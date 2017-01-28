#include <cs50.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <ctype.h>
#include <crypt.h>
#include <unistd.h>

#define _XOPEN_SOURCE
#define _GNU_SOURCE
#define SALT_LENGTH 2

int permutate(char[2], char*);
int inc(char *);
bool done = false;

int main(int argc, string argv[])
{
	char salt[2];
	char * password;
	char * force;
	char * test;
	FILE * wordfile;
	char * line = NULL;
	size_t len = 0;
    ssize_t read;

	if(argc != 2)
	{
		printf("Please enter an encrypted password.\n");
		return 1;
	}

	// First two characters are salt, all following input is encrypted password.
	strncpy(salt, argv[1], SALT_LENGTH);
	password = argv[1] + 2;

    wordfile = fopen("all", "r");

    if (wordfile == NULL)
    {
    	return 2;
    }

    while(!done)
    {
	    while ((read = getline(&line, &len, wordfile)) != -1) 
	    {
	    	line[strlen(line) - 1] = 0;
	    	printf("Currently @ %s\n", line);
	    	test = crypt(line, salt);
	        if(strcmp(argv[1], test) == 0)
	        {
	        	printf("%s\n", line);
	        	done = true;
	        	return 0;
	        }
	    }

	    if (line)
	    {
			free(line);
		}
		force = argv[1];
	    permutate(salt, force);
	}

	printf("\n");
    return 0;
}

int permutate(char salt[2], char *force)
{
    int n = 8;
    char * test;
    char * temp;

    char *c = malloc((n+1)*sizeof(char));
    
    for(int i = 1; i <= n; i++)
    {
        for(int j = 0;j < i; j++)
        {
            c[j]='!';
        }
        c[i]=0;
        do 
        {
        	test = crypt(c, salt);
            if(strcmp(force, test) == 0)
            {
            	printf("%s", c);
            	done = true;
            	return 0;
            }
        } while(inc(c));
    }
    free(c);
    return 0;
}

int inc(char *c)
{
    if(c[0]==0) 
    {
        return 0;
    }

    if(c[0]=='~')
    {
        c[0]='!';
        return inc( c + sizeof(char));
    }   
    c[0]++;
    return 1;
}