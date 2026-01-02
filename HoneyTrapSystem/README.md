# HoneyTrap Authentication System

## 🛡️ Project Overview
The HoneyTrap Authentication System is an advanced, deception-based security framework designed to detect, deceive, and study attackers. Unlike traditional systems that simply block malicious attempts, this system redirects suspicious users to a high-fidelity fake environment ("honeytrap") where their actions are monitored and logged for intelligence gathering.

## 🚀 Key Features
- **Deception Engine**: Seamlessly redirects attackers to a fake dashboard that looks identical to the real one.
- **Real-time Monitoring**: Admin dashboard to watch attacks as they happen.
- **Risk Scoring**: Intelligent algorithm (IP reputation, behavior, timing) to decide user fate.
- **Behavior Tracking**: Logs mouse movements, keystrokes, and navigation patterns.
- **Actionable Intelligence**: Generates reports on attacker capabilities and targets.

## 📂 Installation Instructions

### Prerequisites
- **XAMPP** (Apache + MySQL)

### Setup Steps
1. **Copy Files**: Place the `HoneyTrapSystem` folder into `C:\xampp\htdocs\IS PROJECT\`.
   - Final path should be: `C:\xampp\htdocs\IS PROJECT\HoneyTrapSystem\`

2. **Database Setup**:
   - Open PHPMyAdmin (`http://localhost/phpmyadmin`).
   - Create a new database named `honeytrap_system`.
   - Import `database/honeytrap_system.sql`.
   - Import `database/sample_data.sql` to populate initial users.

3. **Verify Configuration**:
   - Check `backend/config/db.php` if your MySQL root password is not empty.

### 🏃‍♂️ Running the System
1. Open your browser and go to: `http://localhost/IS%20PROJECT/HoneyTrapSystem/`
2. Click **Login**.

## 🎮 Demo Scenarios

### Scenario 1: Legitimate Admin Login
- **Username**: `admin`
- **Password**: `Admin@123`
- **Result**: Redirects to the **Real Admin Dashboard** (`backend/admin/dashboard.php`).

### Scenario 2: Suspicious / Attacker Login
- **Username**: `admin`
- **Password**: `wrongpassword` (Try multiple times quickly)
- **Result**: System increases risk score. Eventually, it may redirect you to the Honeytrap even if you get the password right (simulating compromised credentials from bad IP) or just keep you in a loop.
- **For Demo**: To force the Honeytrap experience, use the credentials (if set up in logic) or rely on the risk score threshold. 
- *Note*: If you want to see the Honeytrap directly for testing, you can modify `backend/auth/login_handler.php` or trigger high risk references.

### Scenario 3: Monitoring
- Open a second browser or Incognito window.
- Log in as **Admin** in one window.
- Perform attacks (fail logins) in the other window.
- Watch the **Live Attack Feed** update in real-time on the Admin Dashboard.

## ⚠️ Disclaimer
This project is for educational purposes only. It collects detailed user data including behavior and input patterns which should be handled according to privacy laws in a production environment.
