const fs = require('fs');
const axios = require('axios');

const baseUrl = 'http://everyayah.com/data/';
const reciter = 'Ayman_Sowaid_64kbps';
const saveDir = __dirname + '/Quran/';

const ayahs = require('./word/english.json').data.surahs;

async function getCapture() {
  for (const surah of ayahs) {
    for (const ayah of surah.ayahs) {
      const sn = surah.number.toString().padStart(3, '0');
      const an = ayah.numberInSurah.toString().padStart(3, '0');
      const url = `${baseUrl}${reciter}/${sn}${an}.mp3`;
      try {
        const response = await axios.get(url, { responseType: 'arraybuffer' });
        fs.writeFileSync(saveDir + ayah.number + '.mp3', Buffer.from(response.data));
        console.log(`Saved ${sn}${an}`);
      } catch (error) {
        console.error(`${sn}${an} failed`, error.message);
      }
    }
  }
}

getCapture();