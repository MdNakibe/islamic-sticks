const fs = require('fs');
const axios = require('axios');
const https = require('https');
const { each } = require('lodash');

const saveDir = __dirname + '/text-edition/';

async function getCapture() {
    let edition = await axios.get('http://api.alquran.cloud/v1/edition');
    let index = 0;
    each(edition.data.data, async item => {
        index++;
        // console.log(item);
        // identifier
        const url = `https://api.alquran.cloud/v1/quran/${item.identifier}`;
        try {
            const response = https.get(url);
            // fs.writeFileSync(`${saveDir}${item.identifier}.json`, JSON.stringify(response.data.data));
            // console.log(`Success ${index} :::: ${item.identifier}`);
        } catch (error) {
            // console.log(`error: ${index} ::::: ${item.identifier}`);
        }
    })
    // for (let i = 1; i < 114; i++) {
    //     for (const ayah of surah.ayahs) {
    //         const sn = surah.number.toString().padStart(3, '0');
    //         const an = ayah.numberInSurah.toString().padStart(3, '0');
    //         const url = `https://cdn.islamic.network/quran/audio/128/ar.alafasy/1.mp3`;
    //         try {
    //             const response = await axios.get(url, { responseType: 'arraybuffer' });
    //             fs.writeFileSync(saveDir + ayah.number + '.mp3', Buffer.from(response.data));
    //             console.log(`Saved ${sn}${an}`);
    //         } catch (error) {
    //             console.error(`${sn}${an} failed`, error.message);
    //         }
    //     }
    // }
}

getCapture();