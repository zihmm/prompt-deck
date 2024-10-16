export const prompt = () => ({
    init()
    {
        gsap.set('.card-wrapper', { perspective:800 });
        gsap.set('.card', { transformStyle: 'preserve-3d' });
        gsap.set('.prompt', { rotationY:-180 });
        gsap.set(['.prompt', '.image'], { backfaceVisibility: 'hidden' });

        document.querySelectorAll('.card-wrapper').forEach(wrapper =>
        {
            wrapper.addEventListener('dblclick', ev =>
            {
                ev.preventDefault();

                if (wrapper.querySelector('.prompt'))
                {
                    gsap.to(wrapper.querySelector('.card'), {
                        duration: 1.3,
                        rotationY: 180,
                        ease: Back.easeOut,
                    });
                }

                // Shaking animation when no prompt found
                else
                {
                    gsap.fromTo(wrapper.querySelector('.card'),
                        {
                            x: '0',
                        }, {
                            x: '+=10',
                            yoyo: true,
                            repeat: 3,
                            duration: .2,
                            ease: 'linear',
                        }
                    )
                }

                wrapper.classList.add('flipped');
            });

            if (wrapper.querySelector('.prompt'))
            {
                wrapper.querySelector('.close-prompt').addEventListener('click', ev =>
                {
                    ev.preventDefault();

                    wrapper.classList.remove('flipped');

                    gsap.to(wrapper.querySelector('.card'), {
                        duration: 1.4,
                        rotationY: 0,
                        ease: Back.easeOut
                    });
                })
            }
        });
    }
});