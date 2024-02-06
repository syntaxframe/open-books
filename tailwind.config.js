/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        aspectRatio: {
          '6/9': '6 / 9',
        },
      }
    },
    plugins: [],
};
