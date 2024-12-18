import { createApp } from 'vue'
import { createPinia } from 'pinia'

import './style.css'

import router from './routes'

import App from './App.vue'

// Layouts
import AppLayout from './layouts/AppLayout.vue'
import GuestLayout from './layouts/GuestLayout.vue'

// Core Components
import CoreInput from './components/CoreInput.vue'
import CoreInputGroup from './components/CoreInputGroup.vue'
import ProfileDropdown from './components/ProfileDropdown.vue'

// Third party components
import { Icon } from '@iconify/vue'

const pinia = createPinia()

const app = createApp(App)

app.use(router)
app.use(pinia)

app.component('AppLayout', AppLayout)
app.component('GuestLayout', GuestLayout)
app.component('CoreInput', CoreInput)
app.component('CoreInputGroup', CoreInputGroup)
app.component('ProfileDropdown', ProfileDropdown)
app.component('Icon', Icon)

app.mount('#app')
