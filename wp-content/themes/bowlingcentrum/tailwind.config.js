/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: "jit",
  content: [
    "./**/*/*.php",
    "./**/*.php"
  ],
  theme: {
    container: {
      center: true,
      padding: '20px',
      screens: {
        '2xl': '1400px',
      },
    },
    fontFamily: {
      'sans': ['Montserrat', 'sans-serif'],
      'serif': ['Montserrat', 'sans-serif'],
      //'serif': ['Londrina Solid', 'cursive'],
      'mono': ['ui-monospace', 'SFMono-Regular'],
      'fontawesome': ['\'Font Awesome 6 Pro\''],
    },
    extend: {
        colors: {
            "primary": "#02AAEF",
            "secondary": "#FFF7EA",
            "accent": "#FF4E00",
            'fontcolor': '#434343',
            "neutral": "#70645C",
        },
    },
  },
  plugins: [
    require("daisyui"),
    require("tailwind-container-break-out")],
  // daisyUI config (optional - here are the default values)
  daisyui: {
    base: true, // applies background color and foreground color for root element by default
    styled: true, // include daisyUI colors and design decisions for all components
    utils: true, // adds responsive and modifier utility classes
    rtl: false, // rotate style direction from left-to-right to right-to-left. You also need to add dir="rtl" to your html tag and install `tailwindcss-flip` plugin for Tailwind CSS.
    prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
    logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
  }
}


