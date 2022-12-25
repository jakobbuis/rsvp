// setup axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const signin = document.querySelector('#sign-in');
if (signin) {
    signin.addEventListener('click', event => {
        event.preventDefault();
        alert('Coming soon');
    });
}
