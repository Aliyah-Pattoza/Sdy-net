import './bootstrap';

/**
 * Newsprint UI interactions — snappy, mechanical, no bounce.
 */

function initMobileNav() {
    const toggle = document.getElementById('mobile-nav-toggle');
    const panel = document.getElementById('mobile-nav');

    if (!toggle || !panel) {
        return;
    }

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Open menu' : 'Close menu');
        panel.hidden = isOpen;
        panel.classList.toggle('hidden', isOpen);
    });

    panel.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Open menu');
            panel.hidden = true;
            panel.classList.add('hidden');
        });
    });
}

function initAccordions() {
    document.querySelectorAll('[data-accordion]').forEach((root) => {
        root.querySelectorAll('[data-accordion-item]').forEach((item) => {
            const trigger = item.querySelector('[data-accordion-trigger]');
            const panel = item.querySelector('.accordion-panel');
            const icon = item.querySelector('.accordion-icon');

            if (!trigger || !panel) {
                return;
            }

            trigger.addEventListener('click', () => {
                const willOpen = trigger.getAttribute('aria-expanded') !== 'true';

                root.querySelectorAll('[data-accordion-item]').forEach((other) => {
                    const otherTrigger = other.querySelector('[data-accordion-trigger]');
                    const otherPanel = other.querySelector('.accordion-panel');
                    const otherIcon = other.querySelector('.accordion-icon');

                    if (!otherTrigger || !otherPanel) {
                        return;
                    }

                    otherTrigger.setAttribute('aria-expanded', 'false');
                    otherPanel.setAttribute('data-open', 'false');
                    otherIcon?.classList.remove('rotate-45');
                });

                if (willOpen) {
                    trigger.setAttribute('aria-expanded', 'true');
                    panel.setAttribute('data-open', 'true');
                    icon?.classList.add('rotate-45');
                }
            });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initMobileNav();
    initAccordions();
});
