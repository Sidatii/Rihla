/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/views/pages/*.{php, html, js}","./app/views/inc/*.{php, html, js}", "./app/views/managers/*.{php, html, js}",
    "./app/views/users/*.{php, html, js}",
      "./src/**/*.{html,js, php}", "./js/**/*.js"],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('flowbite/plugin'),
  ],
}
