<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل حساب جديد - موقع البحث عن الوظائف</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .register-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .register-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .register-header p {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .register-form {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-group .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 1.1rem;
        }

        .form-group input[type="password"] {
            padding-left: 50px;
        }

        .form-group input[type="email"] {
            padding-left: 50px;
        }

        .form-group input[type="text"] {
            padding-left: 50px;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #667eea;
            cursor: pointer;
            font-size: 1.1rem;
        }

        .btn-register {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-register:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #ffe6e6;
            color: #d63031;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #fab1a0;
            display: none;
        }

        .success-message {
            background: #e6ffe6;
            color: #00b894;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #a0fab1;
            display: none;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .register-container {
                margin: 10px;
            }
            
            .register-header h1 {
                font-size: 2rem;
            }
        }

        .strength-meter {
            margin-top: 8px;
            height: 4px;
            background: #e1e5e9;
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-meter .strength {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #ff4757; width: 25%; }
        .strength-medium { background: #ffa502; width: 50%; }
        .strength-strong { background: #2ed573; width: 75%; }
        .strength-very-strong { background: #1e90ff; width: 100%; }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1><i class="fas fa-user-plus"></i> تسجيل حساب جديد</h1>
            <p>انضم إلينا وابدأ رحلتك في البحث عن الوظائف</p>
        </div>
        
        <div class="register-form">
            <div class="error-message" id="errorMessage"></div>
            <div class="success-message" id="successMessage"></div>
            
            <form id="registerForm">
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i> الاسم الكامل
                    </label>
                    <input type="text" id="name" name="name" required placeholder="أدخل اسمك الكامل">
                </div>
                
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> البريد الإلكتروني
                    </label>
                    <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني">
                </div>
                
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> كلمة المرور
                    </label>
                    <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور">
                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </button>
                    <div class="strength-meter">
                        <div class="strength" id="strengthMeter"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">
                        <i class="fas fa-lock"></i> تأكيد كلمة المرور
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="أعد إدخال كلمة المرور">
                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                
                <button type="submit" class="btn-register" id="registerBtn">
                    <i class="fas fa-user-plus"></i> تسجيل الحساب
                </button>
            </form>
            
            <div class="loading" id="loading">
                <div class="spinner"></div>
                <p>جاري إنشاء الحساب...</p>
            </div>
            
            <div class="login-link">
                لديك حساب بالفعل؟ <a href="/job-app">تسجيل الدخول</a>
            </div>
        </div>
    </div>

    <script>
        // تبديل عرض كلمة المرور
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const button = input.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // فحص قوة كلمة المرور
        function checkPasswordStrength(password) {
            let strength = 0;
            const meter = document.getElementById('strengthMeter');
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            meter.className = 'strength';
            
            if (strength < 2) {
                meter.classList.add('strength-weak');
            } else if (strength < 3) {
                meter.classList.add('strength-medium');
            } else if (strength < 4) {
                meter.classList.add('strength-strong');
            } else {
                meter.classList.add('strength-very-strong');
            }
        }

        // مراقبة تغيير كلمة المرور
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
        });

        // معالجة تقديم النموذج
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = {
                name: formData.get('name'),
                email: formData.get('email'),
                password: formData.get('password'),
                password_confirmation: formData.get('password_confirmation')
            };
            
            // التحقق من تطابق كلمتي المرور
            if (data.password !== data.password_confirmation) {
                showError('كلمتا المرور غير متطابقتين');
                return;
            }
            
            // إظهار التحميل
            document.getElementById('loading').style.display = 'block';
            document.getElementById('registerBtn').disabled = true;
            hideMessages();
            
            try {
                const response = await fetch('/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (response.ok) {
                    showSuccess('تم إنشاء الحساب بنجاح! سيتم توجيهك إلى الصفحة الرئيسية...');
                    
                    // حفظ التوكن
                    if (result.token) {
                        localStorage.setItem('authToken', result.token);
                    }
                    
                    // التوجيه إلى الصفحة الرئيسية بعد ثانيتين
                    setTimeout(() => {
                        window.location.href = '/job-app';
                    }, 2000);
                } else {
                    if (result.errors) {
                        const errorMessages = Object.values(result.errors).flat();
                        showError(errorMessages.join('\n'));
                    } else {
                        showError(result.message || 'حدث خطأ أثناء إنشاء الحساب');
                    }
                }
            } catch (error) {
                showError('حدث خطأ في الاتصال بالخادم');
                console.error('Registration error:', error);
            } finally {
                document.getElementById('loading').style.display = 'none';
                document.getElementById('registerBtn').disabled = false;
            }
        });

        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
        }

        function showSuccess(message) {
            const successDiv = document.getElementById('successMessage');
            successDiv.textContent = message;
            successDiv.style.display = 'block';
        }

        function hideMessages() {
            document.getElementById('errorMessage').style.display = 'none';
            document.getElementById('successMessage').style.display = 'none';
        }

        // إضافة CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            const meta = document.createElement('meta');
            meta.name = 'csrf-token';
            meta.content = '{{ csrf_token() }}';
            document.head.appendChild(meta);
        }
    </script>
</body>
</html> 