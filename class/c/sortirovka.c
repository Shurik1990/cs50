//Сортировка выбором

#include <cs50.h>
#include <stdio.h>
#include <limits.h>

int main(int argc, string argv[])
{
    int count_elements = argc - 1;
    
    if(count_elements < 1)
    {
        printf("Enter array\n");
        return 1;
    }
    
    int mass[count_elements];
    
    for(int i = 0; i < count_elements; i++)
    {
        mass[i] = atoi(argv[i + 1]);
    }
    
    // Алгоритм
    
    int min = UINT_MAX;
    int pos_min = 0;
    int temp_val; // временная величина
    
    for(int pos = 0; pos < count_elements - 1; pos++)
    {
        // минимальное = первое проверяемое значение
        min = mass[pos + 1];
        pos_min = pos + 1;
        // проходим по всем элементам
        for(int x = pos; x < count_elements; x++)
        {
            if(min > mass[x]) // позиция минимального элемента
            {
                min = mass[x];
                pos_min = x;
            }
        }
        // меняем местами значения (через временнуб переменную)
        temp_val = mass[pos];
        mass[pos] = min; // присваиваем минимальное значение
        mass[pos_min] = temp_val;
    }
    for(int i = 0; i < count_elements; i++)
    {
        printf("%d ", mass[i]);
    }
    printf("\n");
}