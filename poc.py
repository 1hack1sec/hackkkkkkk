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

# Dosyayı aç
with open(filename, 'w') as file:

    # Tüm kombinasyonları hesapla ve dosyaya yaz
    for combination in itertools.permutations(all_chars, 6):
        file.write(''.join(combination) + '\n')
