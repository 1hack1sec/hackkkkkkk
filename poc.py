import string
import itertools

# Büyük harfler ve sayılar
characters = string.ascii_uppercase + string.digits

# Türk alfabesi karakterleri
turkish_chars = 'ABCÇDEFGĞHIİJKLMNOÖPRSŞTUÜVYZ'

# Tüm karakterler
all_chars = characters + turkish_chars

# Dosya adı
filename = 'combinations.txt'

 with open('combinations.txt', 'w', encoding='utf-8') as file:
     file.write(''.join(combination) + '\n')
