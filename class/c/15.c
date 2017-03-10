// Пятнашки
#include <cs50.h>
#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <time.h>


// Print matrix
void print_matrix(int matrix[3][3])
{
    // Проходит по строкам и столбцам и выводит значения в ячейках
    for(int row = 0; row < 3; row++)
    {
        for(int col = 0; col < 3; col++)
        {
            printf("%d ", matrix[row][col]);
        }
        printf("\n");
    }
    printf("\n");
}

// Check if vinner
// return 1 if complete game
int is_vinner(int matrix[3][3])
{
    int is_vinner = 0;
    
    if(matrix[0][0] != 1)
    {
       // Проверяем строки. Столбцы сравниваем между собой.
       for(int row = 0 ; row < 3 ; row++)
       {
           if ( matrix[row][0] == matrix[row][1] && matrix[row][0] == matrix[row][2] )
           {
               return 1;
           }
       }
    
        // Проверяем столбцы.
       for(int col = 0 ; col < 3 ; col++)
       {
           if ( matrix[0][col] == matrix[1][col] && matrix[0][col] == matrix[2][col] )
           {
               return 1;
           }
       }
        
       // Проверяем диагонали (вручную)
       if ( 
          ( matrix[0][0] == matrix[1][1] && matrix[0][0] == matrix[2][2] )
            ||
          ( matrix[0][2] == matrix[1][1] && matrix[1][1] == matrix[2][0] )
       )
       {
           return 1;
       }
        
    }
    
    return is_vinner;
}

// Даём ход пользователю
// Пользователь ставит значение "99".
void step_user(int matrix[3][3])
{
    int position = GetInt();
    
    position--;
    
    matrix[ (int) floor( position / 3 ) ][ position % 3 ] = 99;
    
}
// Даём ход компьютеру
// Пользователь ставит значение "11".
void step_computer(int matrix[3][3])
{
    /* Intializes random number generator */
    time_t t;
    srand((unsigned) time(&t));
    
    // Считаем количество свободных ячеек на поле
    int count = 0;
    for(int row = 0; row < 3; row++)
    {
        for(int col = 0; col < 3; col++)
        {
            int val = matrix[row][col];
            
            if ( ! ( val == 99 || val == 11 ) )
            {
                // найдена свободная ячека
                count++;
            }
        }
    }
    
    // Номер по порядку свободной ячейки от 0 до count-1
    int position = rand() % count;
    
    // Ставим отметку в эту позицию
    int pos_count = 0;
    for(int row = 0; row < 3; row++)
    {
        for(int col = 0; col < 3; col++)
        {
            int val = matrix[row][col];
            
            if ( ! ( val == 99 || val == 11 ) )
            {
                pos_count++;
            }
            
            if( position == pos_count - 1 )
            {
                matrix[row][col] = 11;
                row = 9;
                break;
            }
        }
    }
}

int main(void)
{
    // создаём поле - матрица 3х3
    int matrix[3][3];
    
    // Заполняем ячейки начальными значениями
    for(int row = 0; row < 3; row++)
    {
        for(int col = 0; col < 3; col++)
        {
            matrix[row][col] = col + 1 + row * 3;
        }
    }
    
    // кто сейчас ходит
    // 0 - user
    // 1 - computer
    int who_step = 0;
    
    int is_vinner_exists = 0; // победитель уже есть (определён)
    int count_steps = 0;
    do
    {
        print_matrix(matrix); // перед ходом выводим игровое поле
        
        if(who_step == 0)
        {
            step_user(matrix); // ходит пользователь
            who_step = 1;
        }
        else
        {
            step_computer(matrix); // ходит компьютер
            who_step = 0;
        }
        
        is_vinner_exists = is_vinner(matrix);
        
        // Если есть победтель - выводим сообщение
        if( is_vinner_exists )
        {
            if ( who_step == 1 )
            {
                printf("You vinner!");
            }
            else
            {
                printf("Game over!");  
            }
        }
        
        // Если ходов не осталось - завершаем игру
        count_steps++;
        if( count_steps >= 8 )
        {
            printf("Game over!\n");  
        }
    }
    while( ! is_vinner_exists ); // продолжаем пока нет победителя
}