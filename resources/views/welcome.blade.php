<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تطبيق البحث عن الوظائف - الصفحة الرئيسية</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .logo i {
            font-size: 2.5em;
            color: #667eea;
        }

        .logo h1 {
            font-size: 2.2em;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            color: #666;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        /* Hero Section */
        .hero {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .hero h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #333;
        }

        .hero p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 15px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1em;
            transition: all 0.3s ease;
            margin: 10px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.9);
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }

        /* Features Grid */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3em;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-card h3 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #333;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .stats h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 30px;
            color: #333;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5em;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 1.1em;
        }

        /* Footer */
        .footer {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .footer p {
            color: #666;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links a {
            color: #667eea;
            font-size: 1.5em;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .hero h2 {
                font-size: 2em;
            }
            
            .logo h1 {
                font-size: 1.8em;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header fade-in">
            <div class="logo">
                <i class="fas fa-briefcase"></i>
                <h1>البحث عن الوظائف</h1>
            </div>
            <p class="subtitle">منصة متكاملة للبحث عن الوظائف المناسبة</p>
        </header>

        <!-- Hero Section -->
        <section class="hero fade-in">
            <h2>🎯 ابحث عن وظيفتك المثالية</h2>
            <p>منصة متطورة للبحث عن الوظائف مع فلاتر متقدمة وواجهة سهلة الاستخدام</p>
            <div>
                <a href="/job-app" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    ابدأ البحث الآن
                </a>
                <a href="#features" class="btn btn-secondary">
                    <i class="fas fa-info-circle"></i>
                    تعرف على الميزات
                </a>
            </div>
        </section>

        <!-- Features -->
        <section id="features" class="features">
            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3>البحث المتقدم</h3>
                <p>ابحث عن الوظائف باستخدام فلاتر متقدمة تشمل الموقع، الراتب، الخبرة، والمؤهل العلمي</p>
            </div>

            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>المفضلة</h3>
                <p>احفظ الوظائف المفضلة لديك واطلع عليها في أي وقت</p>
            </div>

            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>الشركات</h3>
                <p>تصفح الشركات واطلع على الفرص المتاحة في كل شركة</p>
            </div>

            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>تصميم متجاوب</h3>
                <p>واجهة متجاوبة تعمل على جميع الأجهزة والهواتف الذكية</p>
            </div>

            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>تحديث مستمر</h3>
                <p>تحديث مستمر للوظائف الجديدة مع إشعارات فورية</p>
            </div>

            <div class="feature-card fade-in">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>آمن وموثوق</h3>
                <p>منصة آمنة وموثوقة لحماية بياناتك الشخصية</p>
            </div>
        </section>

        <!-- Stats -->
        <section class="stats fade-in">
            <h2>📊 إحصائيات المنصة</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">10,000+</div>
                    <div class="stat-label">وظيفة متاحة</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">شركة مشاركة</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50,000+</div>
                    <div class="stat-label">باحث عن عمل</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">معدل الرضا</div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="hero fade-in">
            <h2>🚀 ابدأ رحلتك الآن</h2>
            <p>انضم إلى آلاف الباحثين عن عمل وابحث عن وظيفتك المثالية</p>
            <div>
                <a href="/job-app" class="btn btn-primary">
                    <i class="fas fa-rocket"></i>
                    ابدأ البحث
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer fade-in">
            <p>© 2024 منصة البحث عن الوظائف. جميع الحقوق محفوظة.</p>
            <p>تم تطوير هذا التطبيق باستخدام Laravel وتقنيات الويب الحديثة</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </footer>
    </div>

    <script>
        // Add fade-in animation to elements
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
