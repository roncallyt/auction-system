/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  safelist: [
    {
      pattern: /bg-*/,
    },
    {
      pattern: /ring-*/,
    },
    {
      pattern: /text-*/,
    },
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

