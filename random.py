import random
import string

# kombinasyon sayısı
num_combinations = 2176782336

# kombinasyon uzunluğu
combo_length = 6

# benzersiz kombinasyonlar için bir küme oluştur
combinations = set()

# belirtilen sayıda benzersiz kombinasyon oluşturulana kadar döngü
while len(combinations) < num_combinations:
    # rastgele büyük harf ve sayılardan kombinasyon oluştur
    combo = ''.join(random.choices(string.ascii_uppercase + string.digits, k=combo_length))
    # kombinasyonu kümede kontrol et ve ekle
    if combo not in combinations:
        combinations.add(combo)

# kombinasyonları bir metin belgesine yazdır
with open('combinations.txt', 'w') as file:
    for combo in combinations:
        file.write(combo + '\n')
