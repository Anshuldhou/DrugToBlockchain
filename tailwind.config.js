/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.jsx',
    ],
    theme: {
        extend: {},
    },
    plugins: [require('daisyui')],
}
