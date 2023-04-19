import random

characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'
combinations = set()

for combo in itertools.product(characters, repeat=6):
    combinations.add(''.join(combo))

combinations = random.sample(combinations, len(combinations))

with open('kombinasyonlar.txt', 'w') as file:
    for combo in combinations:
        file.write(combo + '\n')

print(f"{len(combinations)} adet kombinasyon kaydedildi.")
