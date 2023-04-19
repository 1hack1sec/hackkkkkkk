import random
import string

N = 1000000000

with open('output.txt', 'w') as f:
    for i in range(N):
        pnrNo = ''.join(random.choices(string.ascii_uppercase + string.digits, k=6))
        f.write(pnrNo + '\n')
