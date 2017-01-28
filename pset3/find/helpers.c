/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>
#include <stdio.h>
#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    // Implement a searching algorithm
    
    int low = 0;
    int high = n - 1;
    
    while(low <= high)
    {
        int mid = low + ((high-low)/2);
        if (value == values[mid])
        {
            return true;
        }
        else if (value < values[mid])
        {
            high = mid - 1;
        }
        else if (value > values[mid])
        {
            low = mid + 1; 
        }
    }
    return false; 
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    // Implement an O(n^2) sorting algorithm
    
    for(int i = 1; i < n; i++)
    {
        int valueToInsert = values[i];
        int j = i-1;
        
        while((j >= 0) && (valueToInsert < values[j]))
        {
            values[j+1] = values[j];
            j --;
        }
        values[j+1] = valueToInsert; 
    }
    return; 
}