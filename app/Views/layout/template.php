<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sidebar Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <?= $this->include('layout/sidebar'); ?>

    <?= $this->renderSection('content'); ?>


    <script>
        document.getElementById('level')?.addEventListener('change', () => {
            document.getElementById('filterForm')?.submit();
        });

        function handleProgram() {
            const program = document.getElementById('program')?.value;
            const typeSelect = document.getElementById('type');
            const levelSelect = document.getElementById('level');
            const typeContainer = document.getElementById('typeContainer');
            const levelContainer = document.getElementById('levelContainer');

            if (!program || !typeSelect || !levelSelect) return;

            // Reset isi dropdown
            typeSelect.innerHTML = '<option value="">-- Pilih Jenis --</option>';
            levelSelect.innerHTML = '<option value="">-- Pilih Level --</option>';
            typeContainer?.classList.add('d-none');
            levelContainer?.classList.add('d-none');

            if (program === 'dasher') {
                typeContainer?.classList.remove('d-none');
                typeSelect.innerHTML += '<option value="reguler">Reguler</option>';
                typeSelect.value = getParam('jenis') || 'reguler';
                handleType(true);
            } else if (['runner', 'sprinter', 'ranger', 'explorer'].includes(program)) {
                typeContainer?.classList.remove('d-none');
                typeSelect.innerHTML += `
                <option value="reguler">Reguler</option>
                <option value="private">Private</option>`;
                typeSelect.value = getParam('jenis') || '';
                handleType();
            } else if (['ielts', 'toefl'].includes(program)) {
                typeContainer?.classList.remove('d-none');
                typeSelect.innerHTML += '<option value="private">Private</option>';
                typeSelect.value = getParam('jenis') || 'private';
                handleType(true);
            }
        }

        function handleType(fromProgram = false) {
            const program = document.getElementById('program')?.value;
            const type = document.getElementById('type')?.value;
            const levelSelect = document.getElementById('level');
            const levelContainer = document.getElementById('levelContainer');
            const selectedLevel = getParam('level');

            if (!program || !type || !levelSelect) return;

            levelSelect.innerHTML = '<option value="">-- Pilih Level --</option>';
            levelContainer?.classList.add('d-none');

            if (program === 'dasher' && type === 'reguler') {
                levelContainer?.classList.remove('d-none');
                for (let i = 1; i <= 4; i++) {
                    const value = `level ${i}`;
                    levelSelect.innerHTML += `<option value="${value}">Level ${i}</option>`;
                }
            }

            if (['runner', 'sprinter', 'ranger', 'explorer'].includes(program) && ['reguler', 'private'].includes(type)) {
                levelContainer?.classList.remove('d-none');
                for (let i = 0; i < 12; i++) {
                    const letter = String.fromCharCode(65 + i);
                    const value = `level ${letter}`;
                    levelSelect.innerHTML += `<option value="${value}">Level ${letter}</option>`;
                }
            }

            if (['ielts', 'toefl'].includes(program) && type === 'private') {
                levelContainer?.classList.remove('d-none');
                levelSelect.innerHTML += `
                <option value="intro">Intro</option>
                <option value="compe">Compe</option>`;
            }

            if (selectedLevel) levelSelect.value = selectedLevel;
        }

        function getParam(key) {
            const urlParams = new URLSearchParams(window.location.search);
            const valueFromUrl = urlParams.get(key);

            if (valueFromUrl) return valueFromUrl;

            const programSelect = document.getElementById('program');
            if (programSelect) {
                if (key === 'jenis') return programSelect.getAttribute('data-jenis');
                if (key === 'level') return programSelect.getAttribute('data-level');
            }

            return null;
        }

        window.addEventListener('DOMContentLoaded', () => {
            const programSelect = document.getElementById('program');
            if (programSelect) {
                const jenis = programSelect.getAttribute('data-jenis');
                const level = programSelect.getAttribute('data-level');

                // Set value dropdown program dari server
                const selectedProgram = programSelect.value;
                if (selectedProgram) {
                    handleProgram(); // ini akan memicu isi dan set value jenis + level
                }
            }
        });

        // Setelah halaman reload (form terkirim), hapus parameter dari URL agar form terlihat reset
        window.addEventListener('load', () => {
            if (window.location.search.length > 0) {
                // Hapus parameter dari URL
                const newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);

                // Reset dropdown secara visual
                const program = document.getElementById('program');
                const type = document.getElementById('type');
                const level = document.getElementById('level');

                if (program) program.selectedIndex = 0;

                if (type) {
                    type.innerHTML = '<option value="">-- Pilih Jenis --</option>';
                    // Tampilkan kembali jika sempat disembunyikan
                    const typeContainer = document.getElementById('typeContainer');
                    if (typeContainer) typeContainer.classList.remove('d-none');
                }

                if (level) {
                    level.innerHTML = '<option value="">-- Pilih Level --</option>';
                    // Tampilkan kembali jika sempat disembunyikan
                    const levelContainer = document.getElementById('levelContainer');
                    if (levelContainer) levelContainer.classList.remove('d-none');
                }
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>