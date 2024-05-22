import axios from 'axios';
import Countdown from "./vendor/countdown.js";

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

if (document.querySelector('#start-countdown'))
{
    document.querySelector('#start-countdown').addEventListener('click', ev =>
    {
        ev.preventDefault();

        let $button = ev.target.nodeName == 'SPAN' ? ev.target.parentElement : ev.target;
        $button.classList.add('hide')

        // Start countdown
        let countdown = new Countdown(document.querySelector('#countdown'), {
            date: new Date().getTime() + 61000,
            // date: new Date().getTime() + 300,
            labels: {
                minutes: 'Minuten',
                seconds: 'Sekunden'
            }
        });

        // Finished event
        setTimeout(() => countdown.play().on('done', ev =>
        {
            countdown.domEl.classList.add('hide');
            document.querySelector('.done').classList.remove('hide');
        }), 100);
    })
}