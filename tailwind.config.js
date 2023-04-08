/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './node_modules/tw-elements/dist/js/**/*.js'
  ],
  theme: {
    extend: {},
    screens: {
      'tablet': {'max': '1023px'},
      'mobileM': {'max': '424px'}
    }
  },
  plugins: [
    require('tw-elements/dist/plugin'),
    
  ],
  darkMode: 'class',
}
