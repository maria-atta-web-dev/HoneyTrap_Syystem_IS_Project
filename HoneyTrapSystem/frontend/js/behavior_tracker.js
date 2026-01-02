// frontend/js/behavior_tracker.js

class BehaviorTracker {
    constructor() {
        this.data = {
            mouse_moves: 0,
            clicks: 0,
            keystrokes: 0,
            start_time: Date.now(),
            form_time: 0,
            user_agent: navigator.userAgent
        };
        this.init();
    }

    init() {
        document.addEventListener('mousemove', () => {
            this.data.mouse_moves++;
        });

        document.addEventListener('click', () => {
            this.data.clicks++;
        });

        document.addEventListener('keydown', () => {
            this.data.keystrokes++;
        });

        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            loginForm.addEventListener('submit', (e) => {
                this.data.form_time = Date.now() - this.data.start_time;
                // Append data to form content before submit
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'behavior_data';
                input.value = JSON.stringify(this.data);
                loginForm.appendChild(input);
            });
        }
    }

    getData() {
        return this.data;
    }
}

const tracker = new BehaviorTracker();
