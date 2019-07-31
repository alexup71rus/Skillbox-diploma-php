<?php

/**
 * Сортирует массив по ключу
 * @param массив
 * @param ключ по которому будет производиться сортировка
 * @param тип сортировки
 * @return возвращает обрезанную строку
 */
function arraySortByKey(array $array, $key = 'sort', int $sort = SORT_ASC): array
{
    usort($array, function ($a, $b) use ($key, $sort) {
        if ($sort === SORT_ASC) {
            return $a[$key] <=> $b[$key];
        } elseif ($sort === SORT_DESC) {
            return $a[$key] < $b[$key] ? 1 : -1;
        }
    });
    return $array;
}

/**
 * Рандомная строка
 * @param количество символов
 * @param символы для генерации
 */
function randomString(int $length = 10, bool $hex = true)
{
    if ($hex) {
        return substr(bin2hex(random_bytes($length)), 0, $length);
    } else {
        return substr(str_replace(["+", "/", "="], "", base64_encode(random_bytes($length))), 0, $length);
    }
}

/**
 * Обрезает текст оставляя в конце троеточие
 * @param текстовое содержимое, которое нужно обрезать
 * @param стартовая позиция
 * @param конечная позиция
 * @return возвращает обрезанную строку
 */
function limiter(string $text, int $start, int $end): string
{
    return mb_strlen($text) <= $end ? $text : mb_substr($text, $start, $end - 3) . "...";
}

/**
 * 
 */
function upperCamelCase(string $string)
{
    return sucwords(tr_replace('-', '', $string));
}