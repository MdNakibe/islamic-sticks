/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
            50: '#fff0f0',
            100: '#ffe2e3',
            200: '#ffc9ce',
            300: '#ff9da6',
            400: '#ff6677',
            500: '#ff314e',
            600: '#f21d44',
            700: '#cb052e',
            800: '#aa072e',
            900: '#910a2f',
            950: '#520014',
        },
        secondary: {
          50: '#f0f8fe',
          100: '#ddeefc',
          200: '#c2e1fb',
          300: '#98d0f8',
          400: '#67b6f3',
          500: '#4397ee',
          600: '#2374e1',
          700: '#2565d0',
          800: '#2452a9',
          900: '#234785',
        },
        third: {
          50: '#f1f5f9',
          100: '#e9eff5',
          200: '#cedde9',
          300: '#a3c0d6',
          400: '#729fbe',
          500: '#5083a7',
          600: '#3d698c',
          700: '#325572',
          800: '#2d495f',
          900: '#293e51',
        },
      }
    },
    fontFamily: {
      'arabic': 'Al Majeed Quranic',
      'bangla': 'bangla',
      'default-font': "'Yeseva One', cursive",
      'poppins': "'Poppins', sans-serif",
    },
  },
  plugins: [
    require('@tailwindcss/container-queries'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
  ],
}
