import axios from 'axios';
import Countdown from "./vendor/countdown.js";

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';