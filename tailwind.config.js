/** @type {import('tailwindcss').Config} */
module.exports = {
darkMode: "class",
  content: [
     "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    {
       pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
       variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
 ],
  theme: {
    extend: {
        maxWidth:{
            '700px':'700px',
            '500':'500',

        }
    },
  },
  plugins: [],
}
