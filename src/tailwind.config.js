const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        "./resources/**/*.{php, vue}",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        plugin(function({ addUtilities, addComponents, e, prefix, config }) {
            // Add your custom styles here
          }),
    ],
}
