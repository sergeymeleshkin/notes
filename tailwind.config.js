const defaultTheme = require( 'tailwindcss/defaultTheme' );

module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.{vue,js}",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: [ 'Open Sans', ...defaultTheme.fontFamily.sans ],
            }
        },
    },

    variants: {
        extend: {
            opacity: [ 'disabled' ],
        },
    },

    plugins: [
        require( 'postcss-import' ),
        require( '@tailwindcss/forms' )
    ],
};
