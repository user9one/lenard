/** @type {import('tailwindcss').Config} */
module.exports = {

  mode: 'jit',

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],

  darkMode: false,

  theme: {
    extend: {},
  },

  plugins: [],
}

