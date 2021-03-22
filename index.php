<?php

// 1. Создать массив на миллион элементов и отсортировать его различными способами. Сравнить скорости.

$array = array();
for ($i = 0; $i < 1000000; $i++) {
    $array[]=rand(1, 9000000);
}

// -------------
    function bubbleSort($array)
    {

        for ($i = 0; $i < count($array); $i++) {
            $count = count($array);
            for ($j = $i + 1; $j < $count; $j++) {
                if ($array[$i] > $array[$j]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$i];
                    $array[$i] = $temp;
                }
            }
        }
        return $array;
    }
// --------------
    function quickSort(array &$arr, $low, $high)
    {
        $i = $low;
        $j = $high;
        $middle = $arr[($low + $high) / 2];   // middle – опорный элемент; в нашей реализации он находится посередине между low и high
        do {
            while ($arr[$i] < $middle) {
                ++$i;
            }     // Ищем элементы для правой части
            while ($arr[$j] > $middle) {
                --$j;
            }     // Ищем элементы для левой части
            if ($i <= $j) {
    // Перебрасываем элементы
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
    // Следующая итерация
                $i++;
                $j--;
            }
        } while ($i < $j);

        if ($low < $j) {
    // Рекурсивно вызываем сортировку для левой части
            quickSort($arr, $low, $j);
        }

        if ($i < $high) {
    // Рекурсивно вызываем сортировку для правой части
            quickSort($arr, $i, $high);
        }

    }

// --------------
    function combSort($array)
    {
        $gap = count($array);
        $swap = true;
        while ($gap > 1 || $swap) {
            if ($gap > 1) {
                $gap /= 1.25;
            }
            $swap = false;
            $i = 0;
            while ($i + $gap < count($array)) {
                if ($array[$i] > $array[$i + $gap]) {
                    list($array[$i], $array[$i + $gap]) = array($array[$i + $gap], $array[$i]);
                    $swap = true;
                }
                ++$i;
            }
        }
        return $array;
    }

    
// 2. Реализовать удаление элемента массива по его значению. Обратите внимание на возможные дубликаты!

function rm_from_array($needle, &$array, $all = true){
    foreach(array_keys($array,$needle) as $key){
        unset($array[$key]);
        if(!$all)return;
    }
}

// 3. Подсчитать практически количество шагов при поиске описанными в методичке алгоритмами.

















