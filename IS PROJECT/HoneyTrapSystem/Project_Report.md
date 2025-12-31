# Project Report: Sentinel Cyber Defense System

**Project Name:** Sentinel Cyber Defense & Honeytrap System
**Date:** December 31, 2025
**Prepared By:** [Your Name/Team]

---

## 1. Introduction
This project is about building a secure website that can protect itself from hackers. In the digital world, websites are attacked every day. Traditional security tools like firewalls are like locked doors—they keep people out, but they don't tell you *who* knocked or *what* they wanted.

Our project, the **Sentinel Cyber Defense System**, goes a step further. It uses a **"Honeytrap"**. A Honeytrap is like a decoy or a fake door left slightly open. When a hacker tries to break in, they fall into this trap. We then watch everything they do without them knowing. This helps us understand their tricks and protect the real data better.

## 2. Why Did We Build This? (Problem Statement)
*   **Hackers are sneaky:** They use tools to guess passwords or trick databases (SQL Injection).
*   **Invisible Attacks:** Often, you don't know you've been hacked until it's too late.
*   **Need for Intelligence:** To fight bad guys, you need to know how they think. Regular websites just block them; our system "studies" them.

## 3. How It Works (The Solution)
Our system has two faces:
1.  **The Real Face (Safe Zone):** This is for legitimate admins and users. They see the real dashboard, real charts, and real data.
2.  **The Fake Face (The Trap):** This is for attackers. If someone tries to hack the login page, the system secretly sends them to a fake dashboard.

### The Logic flow:
*   **Step 1:** Users enters a username and password.
*   **Step 2:** The system checks "Is this behavior suspicious?" (e.g., trying too many times, using weird code).
*   **Step 3:**
    *   **If Safe:** Log in to Real Admin Panel.
    *   **If Suspicious:** Log in to **Fake Admin Panel** (Honeytrap).
*   **Step 4:** In the Fake Panel, everything the hacker types or clicks is recorded and shown to the real admin.

## 4. Key Features

### A. Smart Login & Risk Scoring
We don't just check if the password is correct. We check *how* you log in.
*   **Risk Score:** The system gives every user a score from 0 to 100.
*   If you type weird symbols (like `' OR 1=1`), your risk score goes up.
*   If your risk is high, you go to the trap.

### B. The Honeytrap (Fake Dashboard)
This looks exactly like the real admin page, but it's a movie set—nothing is real.
*   **Action Logger:** We installed a "tracker" that records every mouse click and every key pressed.
*   **Confusion:** The buttons work, but they show fake errors or loading screens to waste the hacker's time.

### C. Live Threat Feed
The real admin has a command center. They can see a live list of everyone trying to log in.
*   **Green:** Allowed users.
*   **Red:** Blocked users.
*   **Orange:** Users currently inside the Honeytrap.

### D. Public Features (Careers & News)
To make the site look like a real company, we added:
*   **Careers Page:** People can apply for jobs. The "Apply Now" button opens a form, and their details are saved safely in our database.
*   **News Feed:** We post articles about cyber threats (like "IoT Botnets"). We created detailed pages for these stories with professional images.

## 5. Technology Used
*   **Frontend (Design):** HTML, CSS, and Bootstrap (to make it look good on mobile and desktop).
*   **Backend (Brain):** PHP (a programming language that manages the logic).
*   **Database (Memory):** MySQL (where we store users, logs, and applications).
*   **JavaScript:** Used for the "Apply" popup and tracking hackers.

## 6. Conclusion
The Sentinel System is more than just a website; it's a security tool. By mixing a professional business site with a hidden defensive trap, we demonstrated how modern companies can defend themselves proactively. We don't just stop attacks; we learn from them.
