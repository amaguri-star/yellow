const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        plugin(function ({ addUtilities, addComponents, e, prefix, config }) {
            // Add your custom styles here
        }),
    ],
}
