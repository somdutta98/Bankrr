module.exports = {
  mode: "jit",
  purge: ["./src/**/*.html"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: "2rem",
        sm: "2rem",
        lg: "4rem",
        xl: "5rem",
        "2xl": "6rem",
      },
    },
    extend: {
      colors: {
        "brand-primary": "#212121",
        "brand-secondary": "#323232",
        "brand-accent-primary": "#71FBF0",
        "brand-accent-secondary": "#00A8CC",
        "brand-accent-secondary-dark": "#06C7F0",
        "brand-accennt-primary-dark": "#1DDACB",
        "brand-text": "#ECDBBA",
        "brand-text-dark": "#B2B1B0",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [require("@tailwindcss/forms")],
};
