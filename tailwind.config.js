/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    "./resources/**/*.js",
    "./resources/js/**/*.vue",
  ],
  theme: {
    extend: {
      maxHeight: {
        '18': '4.5rem',
      },
      transitionProperty: {
        'max-height': 'max-height'
      },
      fontFamily: {
        'sans': 'Founders Grotesk'
      },
    },
    colors: {
      'gray' : '#2F2F2F',
      'yellow' : '#F9BE38',
      'white' : '#FFFFFF',
      'off-white' : '#F4F2EF',
      'light-gray' : '#6A6A6A', 
      'white-gray' : '#EDEDED'
    },
    animation: {
      popup: 'wiggle 1s ease-in-out infinite',
    }
  },
  plugins: [],
}

