/**
 * fifteen.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Implements the Game of Fifteen (generalized to d x d).
 *
 * Usage: ./fifteen d
 *
 * whereby the board's dimensions are to be d x d,
 * where d must be in [MIN,MAX]
 *
 * Note that usleep is obsolete, but it offers more granularity than
 * sleep and is simpler to use than nanosleep; `man usleep` for more.
 */
 
#define _XOPEN_SOURCE 500

#include <cs50.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
//include <math.h>

// constants
#define DIM_MIN 3
#define DIM_MAX 9
#define BLANK_MAX DIM_MAX - 1

// board
int board[DIM_MAX][DIM_MAX];

// dimensions
int d;

// prototypes
void clear(void);
void greet(void);
void init(void);
void draw(void);
bool move(int tile);
bool won(void);

int main(int argc, string argv[])
{
    // ensure proper usage
    if (argc != 2)
    {
        printf("Usage: ./fifteen d\n");
        return 1;
    }

    // ensure valid dimensions
    d = atoi(argv[1]);
    if (d < DIM_MIN || d > DIM_MAX)
    {
        printf("Board must be between %i x %i and %i x %i, inclusive.\n",
            DIM_MIN, DIM_MIN, DIM_MAX, DIM_MAX);
        return 2;
    }

    // open log
    FILE* file = fopen("log.txt", "w");
    if (file == NULL)
    {
        return 3;
    }

    // greet user with instructions
    greet();

    // initialize the board
    init();

    // accept moves until game is won
    while (true)
    {
        // clear the screen
        clear();

        // draw the current state of the board
        draw();

        // log the current state of the board (for testing)
        for (int i = 0; i < d; i++)
        {
            for (int j = 0; j < d; j++)
            {
                fprintf(file, "%i", board[i][j]);
                if (j < d - 1)
                {
                    fprintf(file, "|");
                }
            }
            fprintf(file, "\n");
        }
        fflush(file);

        // check for win
        if (won())
        {
            printf("ftw!\n");
            break;
        }

        // prompt for move
        printf("Tile to move: ");
        int tile = GetInt();
        
        // quit if user inputs 0 (for testing)
        if (tile == 0)
        {
            break;
        }

        // log move (for testing)
        fprintf(file, "%i\n", tile);
        fflush(file);

        // move if possible, else report illegality
        if (!move(tile))
        {
            printf("\nIllegal move.\n");
            usleep(500000);
        }

        // sleep thread for animation's sake
        usleep(500000);
    }
    
    // close log
    fclose(file);

    // success
    return 0;
}

/**
 * Clears screen using ANSI escape sequences.
 */
void clear(void)
{
    printf("\033[2J");
    printf("\033[%d;%dH", 0, 0);
}

/**
 * Greets player.
 */
void greet(void)
{
    clear();
    printf("WELCOME TO GAME OF FIFTEEN\n");
    usleep(2000000);
}

/**
 * Initializes the game's board with tiles numbered 1 through d*d - 1
 * (i.e., fills 2D array with values but does not actually print them).  
 */
void init(void)
{
    
    for (int i = 0; i < d; i++)
    {
        for (int j = 0; j < d; j++)
        {
            if (d%2 == 0 && i == d - 1 && j > (d - 4))
            {
                if (j == d - 2)
                    board[i][j] = 2;        //second-last tile
                    
                else if (j == d - 3)        //third-last tile
                    board[i][j] = 1;
                    
                /*else if (j == d - 1)        //last tile
                    board[i][j] = 0; */
            }else
            board[i][j] = d * d - i * d - (j + 1);
        }
    }
}

/**
 * Prints the board in its current state.
 */
void draw(void)
{
    // TODO
    for (int i = 0; i < d; i++)
    {
        for (int j = 0; j < d; j++)
        {
            if (board[i][j] == 0)
                printf("    _");
            else
                printf("%5d", board[i][j]);
        }
        printf("\n\n");
    }
}

/**
 * If tile borders empty space, moves tile and returns true, else
 * returns false. 
 */
bool move(int tile)
{
    // Define integers
    int tRow, tColumn, blRow, blColumn;
    int xDist;
    int yDist; 
    
    // Loop to find index of tile
    for (int i = 0; i < d; i++)
    {
        for (int j = 0; j < d; j++)
        {
            if (board[i][j] == tile)
            {
                tRow = i;
                tColumn = j;
            }
                
            if (board[i][j] == 0)
            {
                blRow = i;
                blColumn = j;
            }
        }
    }
    
    // Check if movement is possible
    xDist = abs(tRow - blRow);
    yDist = abs(tColumn - blColumn);
    
    if ( (tRow == blRow && yDist == 1) || (blColumn == tColumn && xDist == 1) )
    {
        board[blRow][blColumn] = tile;
        board[tRow][tColumn] = 0;
        
        return true;
    }else{
    // If movement is NOT possible
    return false;
    }
}

/**
 * Returns true if game is won (i.e., board is in winning configuration), 
 * else false.
 */
bool won(void)
{
    // First merge two-dimensional array board into 1D-array called check
    int start = 0;
    int dSq = d * d;
    int check[dSq];
    
    //printf("Check array is: ");
    for (int i = 0; i < d; i++)
    {
        for (int j = 0; j < d; j++)
        {
            check[start] = board[i][j];
            //printf("%d ", check[start]);
            start++;
        }
    }
    
    for (int i = 0; i < d * d; i++)
    {
        //printf("%d", check[i]);
    }
    
    //then check if all indices in this array (EXCEPT FOR THE LAST ONE, WHICH WOULD BE 0 IF CORRECT) are sorted from 1 to n * n - 1
    
    for (int i = 0, n = d * d - 2, j = i + 1; i < n; i++, j++)
    {
        //printf("\nfirst index is %d second is %d\n", check[i], check[j]);
        if (check[i] > check[j])
        {
            //printf("\n%d is not smaller than %d.\n", check[i], check[j]);
            return false;
        }else{
            //printf("\n%d is smaller than %d.\n", check[i], check[j]);
        }
    }
    
    return true;
}