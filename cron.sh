#!/bin/bash
# Количество дней
day=2
# Путь до папки с файлами
where_find="/Путь до папки"

#Укажите тип файлов котоые вы ищите
find $where_find -name "*.tar.gz" -type f -mtime +$day -delete

# Поиск пустых файлов
#find $where_find -type f -empty
# Найти пустые папки
find $where_find -type d -empty -exec rmdir -pv '{}' \; 2>/dev/nullr