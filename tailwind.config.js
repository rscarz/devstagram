/** @type {import('tailwindcss').Config} */
/*aca agrego las direcciondes de donde quiero que se use el tailwin
si no aplica los estilos, revisar que este aca la carpeta*/
export default {
  content: [
    "resources/**/*.blade.php" ,
    "resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

