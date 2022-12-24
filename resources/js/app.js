// setup axios
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const form = document.querySelector('#registrations-create');
if (form) {
    const errors = document.querySelector('#errors');
    const success = document.querySelector('#success');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        axios.post(form.getAttribute('action'), {
            name: document.querySelector('#name').value,
        }).then(() => {
            errors.classList.add('hidden');
            success.classList.remove('hidden');
        }).catch((error) => {
            errors.classList.remove('hidden');
            success.classList.add('hidden');
        });
    });
}
