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

function initRegisterForm() {
    const form = document.getElementById('register-form');
    if (!form) {
        return;
    }

    const wa = form.dataset.wa;
    const installFee = form.dataset.install;

    const fileInput = document.getElementById('ktp');
    const drop = document.getElementById('ktp-drop');
    const preview = document.getElementById('ktp-preview');
    const previewImg = document.getElementById('ktp-image');
    const previewName = document.getElementById('ktp-name');
    const previewSize = document.getElementById('ktp-size');
    const removeBtn = document.getElementById('ktp-remove');
    const paketSelect = document.getElementById('paket');

    let ktpFile = null;

    const humanSize = (bytes) => {
        if (bytes < 1024) return `${bytes} B`;
        if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(0)} KB`;
        return `${(bytes / (1024 * 1024)).toFixed(1)} MB`;
    };

    const showError = (field, show) => {
        const wrap = field.closest('div.sm\\:col-span-2') || field.closest('div');
        const err = wrap?.querySelector('.field-error');
        err?.classList.toggle('hidden', !show);
        field.classList.toggle('border-accent', show);
    };

    // File preview
    const handleFile = (file) => {
        if (!file) return;

        if (!file.type.startsWith('image/')) {
            alert('File harus berupa gambar (JPG/PNG).');
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran foto maksimal 5 MB.');
            return;
        }

        ktpFile = file;
        previewImg.src = URL.createObjectURL(file);
        previewName.textContent = file.name;
        previewSize.textContent = humanSize(file.size);
        preview.classList.remove('hidden');
        drop.classList.add('hidden');
        showError(fileInput, false);
    };

    fileInput?.addEventListener('change', (e) => handleFile(e.target.files[0]));

    // Drag & drop
    ['dragenter', 'dragover'].forEach((evt) =>
        drop?.addEventListener(evt, (e) => {
            e.preventDefault();
            drop.classList.add('bg-white');
        })
    );
    ['dragleave', 'drop'].forEach((evt) =>
        drop?.addEventListener(evt, (e) => {
            e.preventDefault();
            drop.classList.remove('bg-white');
        })
    );
    drop?.addEventListener('drop', (e) => {
        const file = e.dataTransfer?.files?.[0];
        if (file) {
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;
            handleFile(file);
        }
    });

    removeBtn?.addEventListener('click', () => {
        ktpFile = null;
        fileInput.value = '';
        preview.classList.add('hidden');
        drop.classList.remove('hidden');
    });

    // Live summary update
    const setVar = (name, value) => document.querySelector('#daftar')?.style.setProperty(name, value);
    paketSelect?.addEventListener('change', () => {
        const opt = paketSelect.selectedOptions[0];
        if (!opt || !opt.value) return;

        document.getElementById('summary-package').textContent = opt.dataset.name;
        document.getElementById('summary-price').textContent = opt.dataset.price;
        document.getElementById('summary-tagline').textContent = opt.dataset.tagline;
        setVar('--accent', opt.dataset.accent);
        setVar('--accent-soft', opt.dataset.accentSoft);
        showError(paketSelect, false);
    });

    // Build WA message
    const buildMessage = () => {
        const nama = document.getElementById('nama').value.trim();
        const hp = document.getElementById('hp').value.trim();
        const alamat = document.getElementById('alamat').value.trim();
        const opt = paketSelect.selectedOptions[0];
        const paketName = opt?.dataset.name || '';
        const price = opt?.dataset.price || '';

        const paketShort = paketName.replace(/^Paket\s+/i, '');

        return (
            `*PENDAFTARAN SDY NET* 📡\n` +
            `\n` +
            `👤 *Nama (KTP)*\n${nama}\n` +
            `\n` +
            `📱 *No. HP*\n${hp}\n` +
            `\n` +
            `🏠 *Alamat*\n${alamat}\n` +
            `\n` +
            `📦 *Paket*\n${paketShort} — Rp ${price}/bln\n` +
            `\n` +
            `🔧 *Pemasangan & sewa modem*\nRp ${installFee} (bayar setelah instalasi)\n` +
            `\n` +
            `━━━━━━━━━━━━━━\n` +
            `📎 Foto KTP saya lampirkan pada chat ini.\n` +
            `Mohon diproses ya, terima kasih 🙏`
        );
    };

    const validate = () => {
        let ok = true;
        const required = ['nama', 'hp', 'alamat', 'paket'];
        required.forEach((id) => {
            const field = document.getElementById(id);
            const empty = !field.value.trim();
            showError(field, empty);
            if (empty) ok = false;
        });

        const hp = document.getElementById('hp');
        if (hp.value.trim() && !/^[0-9+\-\s]{8,}$/.test(hp.value.trim())) {
            showError(hp, true);
            ok = false;
        }

        if (!ktpFile) {
            showError(fileInput, true);
            ok = false;
        }
        return ok;
    };

    const hint = document.getElementById('submit-hint');
    const manualLink = document.getElementById('wa-manual-link');
    const sharePhotoBtn = document.getElementById('share-ktp-btn');

    const openWhatsApp = (waLink) => {
        if (manualLink) manualLink.href = waLink;
        hint?.classList.remove('hidden');
        hint?.scrollIntoView({ behavior: 'smooth', block: 'center' });

        const win = window.open(waLink, '_blank');
        if (!win || win.closed || typeof win.closed === 'undefined') {
            // Pop-up diblokir → pindah langsung di tab yang sama
            window.location.href = waLink;
        }
    };

    // Tombol opsional: lampirkan foto KTP lewat share sheet (khusus HP)
    const canShareFile = () =>
        ktpFile && navigator.canShare && navigator.canShare({ files: [ktpFile] });

    sharePhotoBtn?.addEventListener('click', async () => {
        if (!canShareFile()) return;
        try {
            await navigator.share({
                files: [ktpFile],
                title: 'Foto KTP — Pendaftaran SDY NET',
            });
        } catch (err) {
            /* dibatalkan user, abaikan */
        }
    });

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!validate()) {
            form.querySelector('.field-error:not(.hidden)')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }

        const message = buildMessage();
        const waLink = `https://wa.me/${wa}?text=${encodeURIComponent(message)}`;

        // Selalu buka chat WhatsApp ADMIN secara langsung (teks lengkap terisi).
        openWhatsApp(waLink);

        // Kalau perangkat mendukung berbagi file, tampilkan tombol lampirkan foto.
        if (canShareFile()) {
            sharePhotoBtn?.classList.remove('hidden');
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initMobileNav();
    initAccordions();
    initRegisterForm();
});
