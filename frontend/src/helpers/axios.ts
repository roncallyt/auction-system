import axios from 'axios'

axios.defaults.baseURL = import.meta.env.VITE_API_URL

axios.defaults.headers.common = {
  'Accept': 'application/json',
}

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

export default axios
