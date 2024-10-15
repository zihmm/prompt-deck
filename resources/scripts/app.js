import './bootstrap';
import Countdown from "./vendor/countdown.js";
import confetti from "./modules/confetti.js";

// Countdown
if (document.querySelector('#start-countdown'))
{
    document.querySelector('#start-countdown').addEventListener('click', ev =>
    {
        ev.preventDefault();

        let $button = ev.target.nodeName == 'SPAN' ? ev.target.parentElement : ev.target;
        $button.classList.add('hide')

        // Start countdown
        let countdown = new Countdown(document.querySelector('#countdown'), {
            date: new Date().getTime() + (countdown_timer * 1000) + 1000,
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

// Vote
document.querySelectorAll('a.vote').forEach($vote =>
{
    $vote.addEventListener('click', ev =>
    {
        ev.preventDefault();

        axios.post($vote.getAttribute('href')).then(response =>
        {
            document.querySelector('main').classList.add('done');
            document.querySelector('#figures').innerHTML = `<p>${response.data.notification}</p>`;

            confetti();

            gsap.from('#figures', {
                autoAlpha: 0,
                ease: 'power4.out',
                duration: 1.2,
                y: 50
            });
        });
    });
});

document.querySelectorAll('figure').forEach(figure =>
{
    figure.addEventListener('mouseover', ev =>
    {
        // gsap.from('.prompt-card', {
        //     autoAlpha: 0,
        //     ease: 'power4.out',
        //     duration: 1.2,
        //     y: 100
        // });
    });
});