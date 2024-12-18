import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  server: {
    host: true,
    hmr: { 
      host: 'localhost',
      protocol: 'ws',
      port: 3000,
    },
    port: 5173,
    watch: {
      usePolling: true
    }
  }
})
