import { defineConfig } from 'vite'

// Dev server sends /App requests to the PHP server
export default defineConfig({
  server: {
    port: 3000,
    proxy: {
      '/App': {
        target: 'http://localhost:8000',
        changeOrigin: true,
      },
      // Agregar proxy para archivos PHP en la raíz (como gracias.php)
      '/index.php': {
        target: 'http://localhost:8000', 
        changeOrigin: true,
      },
      // Agregar proxy para archivos PHP en la raíz (como gracias.php)
      '/gracias.php': {
        target: 'http://localhost:8000', 
        changeOrigin: true,
      },
    },
  },
})
