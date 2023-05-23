/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
 ],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'primary': {
        400: '#34d399',
        DEFAULT: '#15803d',
        700: '#047857',
      },
      'secondary': '#fb923c',
      'error': '#dc2626',
      'danger': '#fbbf24',
      'success': '#22c55e'
    },
    
  },
  plugins: [],
}

