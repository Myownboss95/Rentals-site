import { defineStore } from "pinia";

export const useTheme = defineStore('theme', {
    state: () => ({
        darkMode: false,
        theme: '',
    }),
    actions: {
        toggleTheme() {
            var body = document.body;
            this.theme = body.getAttribute('data-layout-mode');
            if (this.theme == null || this.theme == 'light') {
                body.setAttribute('data-layout-mode', this.theme = 'dark');
                this.darkMode = true;
            } else {
                body.setAttribute('data-layout-mode', this.theme = 'light');
                this.darkMode = false;
            }
            localStorage.setItem('theme', this.theme);
            this.changeIcons();
        },
        initTheme() {
            this.theme = this.getTheme || this.getMediaPreference;
            localStorage.setItem('theme', this.theme);
            document.body.setAttribute('data-layout-mode', this.theme)
            this.darkMode = this.theme == 'dark'
            this.changeIcons();
        },
        changeIcons() {
            var darkElement = document.querySelector('.dark');
            var lightElement = document.querySelector('.light');
            if (this.darkMode) {
                darkElement.classList.add('d-none')
                lightElement.classList.remove('d-none')
            } else {
                lightElement.classList.add('d-none')
                darkElement.classList.remove('d-none')
            }
        }
    },
    getters: {
        getMediaPreference: (state) => {
            return window.matchMedia("(prefers-color-scheme: dark)").matches
                ? 'dark'
                : 'light';
        },
        getTheme: (state) => {
            return localStorage.getItem('theme');
        }
    }
})
