const fs = require('fs');
const axios = require('axios');
const https = require('https');

const saveDir = __dirname + '/text-edition/';
const list = require('./some.json')

let start = 21;
let end = 25;

const subList = list.slice(start, end)
// console.log(subList);

subList.forEach((item, index) => {
    const url = `https://api.alquran.cloud/v1/quran/${item.identifier}`;
    let writeStream = fs.createWriteStream(`${saveDir}${item.identifier}.json`)
    https.get(url, res => {
        res.pipe(writeStream)
        res.on('end', () => {
            console.log(index);
        })
        res.on('error', () => {
            console.log(`error ${index}`);
        })
    })
})

// async function getCapture() {
//     let edition = await axios.get('http://api.alquran.cloud/v1/edition');
//     let index = 0;
//     let data = edition.data.data;
//     // console.log(JSON.stringify(data));
//     // fs.writeFileSync(__dirname + '/some.json', JSON.stringify(data))
//     // function getResult() {
//     //     console.log('loading '+ index);
//     //     if (index < data.length) {
//     //         let item = data[index];
//     //         const url = `https://api.alquran.cloud/v1/quran/${item.identifier}`;
            
//     //         // const writeStream = fs.createWriteStream(`${saveDir}${item.identifier}.json`);
//     //         // https.get(url, res => {
//     //         //     res.pipe(writeStream);
//     //         //     res.on('end', () => {
//     //         //     })
//     //         // });
//     //         console.log('done '+index);
//     //         index += 1
//     //         getResult()
//     //     }
//     // }
//     // getResult()
// }

// getCapture();