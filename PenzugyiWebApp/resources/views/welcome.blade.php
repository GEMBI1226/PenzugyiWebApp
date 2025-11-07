<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker | Smart Budget Management</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 10;
        }
        header h1 {
            font-weight: 700;
            font-size: 1.5rem;
            color: #38bdf8;
        }
        header nav a {
            text-decoration: none;
            color: #e2e8f0;
            margin-left: 25px;
            font-weight: 500;
            transition: color 0.2s;
        }
        header nav a:hover {
            color: #38bdf8;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 120px 80px 60px;
        }
        .content {
            max-width: 600px;
            animation: fadeInUp 1.2s ease;
        }
        .content h2 {
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #f1f5f9;
        }
        .content p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #cbd5e1;
            margin-bottom: 30px;
        }
        .buttons a {
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 12px 24px;
            margin-right: 15px;
            transition: all 0.25s ease;
        }
        .buttons a:first-child {
            background-color: #38bdf8;
            color: #0f172a;
        }
        .buttons a:first-child:hover {
            background-color: #0ea5e9;
            transform: scale(1.05);
        }
        .buttons a:last-child {
            border: 1px solid #38bdf8;
            color: #38bdf8;
        }
        .buttons a:last-child:hover {
            background-color: #38bdf8;
            color: #0f172a;
            transform: scale(1.05);
        }

        .hero-image {
            flex: 1;
            text-align: right;
            animation: fadeIn 1.6s ease;
        }
        .hero-image img {
            width: 90%;
            max-width: 600px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            transform: translateY(0);
            transition: transform 0.5s ease;
        }
        .hero-image img:hover {
            transform: translateY(-10px);
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #64748b;
            font-size: 0.9rem;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        @keyframes fadeInUp {
            from {opacity: 0; transform: translateY(40px);}
            to {opacity: 1; transform: translateY(0);}
        }

        @media (max-width: 900px) {
            main {
                flex-direction: column;
                text-align: center;
            }
            .hero-image {
                text-align: center;
                margin-top: 40px;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>FinanceTracker</h1>
        <nav>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </nav>
    </header>

    <main>
        <div class="content">
            <h2>Take control of your finances with confidence</h2>
            <p>
                Track your income, manage your expenses, and visualize your monthly financial balance in one clean and powerful dashboard.
                FinanceTracker helps you make smarter decisions and achieve your goals.
            </p>
            <div class="buttons">
                <a href="{{ route('register') }}">Get Started</a>
                <a href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
        <div class="hero-image">
            <img src="img/hero-image.jpg" alt="Finance dashboard preview">
        </div>
    </main>

    <footer>
        © {{ date('Y') }} FinanceTracker. Manage your money the smart way.
    </footer>

</body>
</html>
