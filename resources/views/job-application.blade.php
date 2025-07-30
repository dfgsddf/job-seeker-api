<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>التقديم على الوظيفة</title>
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

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px 30px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .header h1 {
            font-size: 2em;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .application-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .job-info {
            background: rgba(248, 249, 250, 0.8);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
        }

        .job-title {
            font-size: 1.5em;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .job-company {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .job-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .job-detail {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }

        .job-detail i {
            color: #667eea;
            width: 16px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.3em;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-control {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control.error {
            border-color: #ff4757;
        }

        .error-message {
            color: #ff4757;
            font-size: 12px;
            margin-top: 5px;
        }

        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .skill-tag {
            background: #667eea;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .skill-tag i {
            cursor: pointer;
        }

        .file-upload {
            border: 2px dashed #e0e0e0;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .file-upload.dragover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.1);
        }

        .file-upload i {
            font-size: 2em;
            color: #667eea;
            margin-bottom: 10px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.9);
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e0e0e0;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .step.active .step-number {
            background: #667eea;
            color: white;
        }

        .step.completed .step-number {
            background: #2ed573;
            color: white;
        }

        .step-label {
            font-size: 12px;
            color: #666;
            text-align: center;
        }

        .step.active .step-label {
            color: #667eea;
            font-weight: 600;
        }

        .step.completed .step-label {
            color: #2ed573;
            font-weight: 600;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 15px;
            border: 2px solid #667eea;
        }

        .loading i {
            font-size: 3em;
            color: #667eea;
            margin-bottom: 15px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading p {
            font-size: 1.2em;
            font-weight: 600;
            color: #667eea;
        }

        .success-message {
            text-align: center;
            padding: 40px;
            color: #2ed573;
            background: rgba(46, 213, 115, 0.1);
            border-radius: 15px;
            border: 2px solid #2ed573;
        }

        .success-message i {
            font-size: 4em;
            margin-bottom: 20px;
            color: #2ed573;
        }

        .success-message h3 {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: #2ed573;
        }

        .success-message p {
            font-size: 1.1em;
            margin-bottom: 25px;
            color: #666;
        }

        .success-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .success-actions .btn {
            min-width: 150px;
        }

        .error-message {
            background: rgba(255, 107, 107, 0.1);
            border: 2px solid #ff6b6b;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            color: #ff6b6b;
        }

        .error-message i {
            font-size: 2em;
            margin-bottom: 10px;
            color: #ff6b6b;
        }

        .error-message p {
            font-size: 1.1em;
            margin-bottom: 15px;
            color: #ff6b6b;
        }

        .error-message .btn {
            background: #ff6b6b;
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9em;
        }

        .error-message .btn:hover {
            background: #ff5252;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .job-details {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1><i class="fas fa-paper-plane"></i> التقديم على الوظيفة</h1>
                <div style="display: flex; gap: 15px;">
                    <a href="/job-app" class="btn btn-secondary" style="text-decoration: none;">
                        <i class="fas fa-arrow-right"></i>
                        العودة للوظائف
                    </a>
                    <a href="/my-applications" class="btn btn-primary" style="text-decoration: none;">
                        <i class="fas fa-clipboard-list"></i>
                        طلباتي
                    </a>
                </div>
            </div>
        </header>

        <!-- Application Container -->
        <div class="application-container">
            <!-- Job Information -->
            <div class="job-info">
                <div class="job-title" id="jobTitle">مطور ويب Frontend</div>
                <div class="job-company" id="jobCompany">شركة التقنية المتقدمة</div>
                <div class="job-details">
                    <div class="job-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span id="jobLocation">الرياض</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-money-bill-wave"></i>
                        <span id="jobSalary">8000-12000 ريال</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-clock"></i>
                        <span id="jobType">دوام كامل</span>
                    </div>
                    <div class="job-detail">
                        <i class="fas fa-calendar"></i>
                        <span id="jobDate">منذ يومين</span>
                    </div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill" style="width: 25%"></div>
            </div>

            <!-- Step Indicator -->
            <div class="step-indicator">
                <div class="step active" id="step1">
                    <div class="step-number">1</div>
                    <div class="step-label">المعلومات الشخصية</div>
                </div>
                <div class="step" id="step2">
                    <div class="step-number">2</div>
                    <div class="step-label">التعليم والخبرة</div>
                </div>
                <div class="step" id="step3">
                    <div class="step-number">3</div>
                    <div class="step-label">المهارات والسيرة الذاتية</div>
                </div>
                <div class="step" id="step4">
                    <div class="step-number">4</div>
                    <div class="step-label">رسالة التقديم</div>
                </div>
            </div>

            <!-- Application Form -->
            <form id="applicationForm" method="POST" action="">
                @csrf
                <!-- Step 1: Personal Information -->
                <div class="form-step active" id="step1Content">
                    <div class="section-title">
                        <i class="fas fa-user"></i>
                        المعلومات الشخصية
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>الاسم الكامل *</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكتروني *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>رقم الهاتف *</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>المدينة *</label>
                            <input type="text" name="city" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>البلد *</label>
                            <input type="text" name="country" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>العنوان *</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Education & Experience -->
                <div class="form-step" id="step2Content">
                    <div class="section-title">
                        <i class="fas fa-graduation-cap"></i>
                        التعليم والخبرة
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>الدرجة العلمية *</label>
                            <select name="degree" class="form-control" required>
                                <option value="">اختر الدرجة العلمية</option>
                                <option value="بكالوريوس">بكالوريوس</option>
                                <option value="ماجستير">ماجستير</option>
                                <option value="دكتوراه">دكتوراه</option>
                                <option value="دبلوم">دبلوم</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>الجامعة *</label>
                            <input type="text" name="university" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>سنة التخرج *</label>
                            <input type="number" name="graduation_year" class="form-control" min="1950" max="2024" required oninput="validateGraduationYear(this)">
                        </div>
                        <div class="form-group">
                            <label>المعدل التراكمي</label>
                            <input type="number" name="gpa" class="form-control" min="0" max="100" step="0.01" placeholder="مثال: 88" oninput="validateGPA(this)" onblur="formatGPA(this)">
                            <small class="form-text text-muted">أدخل المعدل على مقياس 100 (مثال: 88)</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>سنوات الخبرة *</label>
                            <input type="number" name="years_of_experience" class="form-control" min="0" required>
                        </div>
                        <div class="form-group">
                            <label>الوظيفة الحالية</label>
                            <input type="text" name="current_position" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>الشركة الحالية</label>
                            <input type="text" name="current_company" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- Step 3: Skills & Resume -->
                <div class="form-step" id="step3Content">
                    <div class="section-title">
                        <i class="fas fa-tools"></i>
                        المهارات والسيرة الذاتية
                    </div>
                    <div class="form-group">
                        <label>المهارات *</label>
                        <div class="skills-container" id="skillsContainer">
                            <!-- Skills will be added here -->
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" id="skillInput" class="form-control" placeholder="أضف مهارة جديدة">
                            </div>
                            <button type="button" onclick="addSkill()" class="btn btn-secondary">
                                <i class="fas fa-plus"></i>
                                إضافة
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>السيرة الذاتية *</label>
                        <div class="file-upload" onclick="document.getElementById('resumeFile').click()">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>انقر لرفع السيرة الذاتية (PDF, DOC, DOCX)</p>
                            <p>الحد الأقصى: 2 ميجابايت</p>
                        </div>
                        <input type="file" id="resumeFile" name="resume" accept=".pdf,.doc,.docx" style="display: none;" required>
                        <div id="fileInfo" style="margin-top: 10px;"></div>
                    </div>
                </div>

                <!-- Step 4: Cover Letter -->
                <div class="form-step" id="step4Content">
                    <div class="section-title">
                        <i class="fas fa-envelope"></i>
                        رسالة التقديم
                    </div>
                    <div class="form-group">
                        <label>رسالة التقديم *</label>
                        <textarea name="cover_letter" class="form-control" rows="8" placeholder="اكتب رسالة التقديم هنا (الحد الأدنى 100 حرف)" required oninput="updateCharacterCount(this)">رسالة تقديم لوظيفة مبرمج (نموذج):

أنا مهتم بالوظيفة المعلنة وأعتقد أن خبراتي ومهاراتي تتوافق مع متطلبات الوظيفة. لدي خبرة في مجال البرمجة وتطوير الويب، وأعمل على تطوير مهاراتي باستمرار.

أتمنى أن أكون جزءاً من فريق العمل وأن أساهم في نجاح الشركة. سأكون سعيداً بمناقشة مؤهلاتي وخبراتي في مقابلة شخصية.

شكراً لكم على الوقت والاهتمام.</textarea>
                        <small>الحد الأدنى: 100 حرف | الحروف المكتوبة: <span id="charCount">0</span></small>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" onclick="previousStep()" class="btn btn-secondary" id="prevBtn" style="display: none;">
                        <i class="fas fa-arrow-right"></i>
                        السابق
                    </button>
                    <button type="button" onclick="nextStep()" class="btn btn-primary" id="nextBtn">
                        التالي
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitBtn" style="display: none;">
                        <i class="fas fa-paper-plane"></i>
                        إرسال الطلب
                    </button>
                </div>
            </form>

            <!-- Loading -->
            <div id="loading" class="loading" style="display: none;">
                <i class="fas fa-spinner fa-spin"></i>
                <p>جاري إرسال الطلب...</p>
            </div>

            <!-- Success Message -->
            <div id="successMessage" class="success-message" style="display: none;">
                <i class="fas fa-check-circle"></i>
                <h3>تم إرسال طلب التقديم بنجاح!</h3>
                <p>سيتم مراجعة طلبك والرد عليك في أقرب وقت ممكن.</p>
                <div class="success-actions">
                    <button onclick="window.location.href='/job-app'" class="btn btn-primary">
                        <i class="fas fa-home"></i>
                        العودة للصفحة الرئيسية
                    </button>
                    <button onclick="window.location.href='/my-applications'" class="btn btn-secondary">
                        <i class="fas fa-list"></i>
                        عرض طلباتي
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentStep = 1;
        const totalSteps = 4;
        let skills = [];

        // Get job ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const jobId = urlParams.get('job_id') || 1;

        // Load job details
        async function loadJobDetails() {
            try {
                const response = await fetch(`/api/jobs/${jobId}`);
                const data = await response.json();
                
                document.getElementById('jobTitle').textContent = data.job.title;
                document.getElementById('jobCompany').textContent = data.job.company_name;
                document.getElementById('jobLocation').textContent = data.job.location;
                document.getElementById('jobSalary').textContent = data.job.salary_range || 'غير محدد';
                document.getElementById('jobType').textContent = getJobTypeText(data.job.job_type);
                document.getElementById('jobDate').textContent = 'منذ يومين'; // يمكن تحسين هذا
            } catch (error) {
                console.error('Error loading job details:', error);
            }
        }

        function getJobTypeText(type) {
            const types = {
                'full_time': 'دوام كامل',
                'part_time': 'دوام جزئي',
                'remote': 'عن بُعد',
                'contract': 'عقد مؤقت'
            };
            return types[type] || type;
        }

        function updateProgress() {
            const progress = (currentStep / totalSteps) * 100;
            document.getElementById('progressFill').style.width = progress + '%';
        }

        function updateSteps() {
            // Update step indicators
            for (let i = 1; i <= totalSteps; i++) {
                const step = document.getElementById(`step${i}`);
                if (i < currentStep) {
                    step.className = 'step completed';
                } else if (i === currentStep) {
                    step.className = 'step active';
                } else {
                    step.className = 'step';
                }
            }

            // Show/hide form steps
            for (let i = 1; i <= totalSteps; i++) {
                const stepContent = document.getElementById(`step${i}Content`);
                if (i === currentStep) {
                    stepContent.className = 'form-step active';
                } else {
                    stepContent.className = 'form-step';
                }
            }

            // Update buttons
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');

            if (currentStep === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'inline-flex';
            }

            if (currentStep === totalSteps) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'inline-flex';
            } else {
                nextBtn.style.display = 'inline-flex';
                submitBtn.style.display = 'none';
            }

            updateProgress();
        }

        function nextStep() {
            if (validateCurrentStep()) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    updateSteps();
                }
            }
        }

        function previousStep() {
            if (currentStep > 1) {
                currentStep--;
                updateSteps();
            }
        }

        function validateCurrentStep() {
            const currentStepElement = document.getElementById(`step${currentStep}Content`);
            const requiredFields = currentStepElement.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                } else {
                    field.classList.remove('error');
                }
            });

            // Additional validation for email format
            const emailField = currentStepElement.querySelector('input[type="email"]');
            if (emailField && emailField.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailField.value)) {
                    emailField.classList.add('error');
                    isValid = false;
                    alert('يرجى إدخال بريد إلكتروني صحيح');
                } else {
                    emailField.classList.remove('error');
                }
            }

            // Special validation for step 2 (Education & Experience)
            if (currentStep === 2) {
                const gpaField = currentStepElement.querySelector('input[name="gpa"]');
                if (gpaField && gpaField.value) {
                    const gpa = parseFloat(gpaField.value);
                    if (isNaN(gpa) || gpa < 0 || gpa > 100) {
                        alert('المعدل التراكمي يجب أن يكون بين 0 و 100');
                        gpaField.classList.add('error');
                        isValid = false;
                    } else {
                        gpaField.classList.remove('error');
                    }
                }
                
                const graduationYearField = currentStepElement.querySelector('input[name="graduation_year"]');
                if (graduationYearField && graduationYearField.value) {
                    const year = parseInt(graduationYearField.value);
                    const currentYear = new Date().getFullYear();
                    if (isNaN(year) || year < 1950 || year > currentYear + 1) {
                        alert(`سنة التخرج يجب أن تكون بين 1950 و ${currentYear + 1}`);
                        graduationYearField.classList.add('error');
                        isValid = false;
                    } else {
                        graduationYearField.classList.remove('error');
                    }
                }
            }

            // Special validation for step 3
            if (currentStep === 3) {
                if (skills.length === 0) {
                    alert('يرجى إضافة مهارة واحدة على الأقل');
                    isValid = false;
                }
                
                const resumeFile = document.getElementById('resumeFile').files[0];
                if (!resumeFile) {
                    alert('يرجى اختيار ملف السيرة الذاتية');
                    isValid = false;
                }
            }

            // Special validation for step 4 (Cover Letter)
            if (currentStep === 4) {
                const coverLetter = currentStepElement.querySelector('textarea[name="cover_letter"]');
                if (coverLetter && coverLetter.value.length < 100) {
                    alert('رسالة التقديم يجب أن تكون 100 حرف على الأقل');
                    coverLetter.classList.add('error');
                    isValid = false;
                } else if (coverLetter) {
                    coverLetter.classList.remove('error');
                }
                
                // Validate skills
                if (skills.length === 0) {
                    alert('يرجى إضافة مهارة واحدة على الأقل');
                    isValid = false;
                }
                
                // Validate resume file
                const resumeFile = document.getElementById('resumeFile').files[0];
                if (!resumeFile) {
                    alert('يرجى اختيار ملف السيرة الذاتية');
                    isValid = false;
                }
            }

            return isValid;
        }

        function addSkill() {
            const skillInput = document.getElementById('skillInput');
            const skill = skillInput.value.trim();
            
            if (!skill) {
                alert('يرجى إدخال اسم المهارة');
                return;
            }
            
            if (skill.length < 2) {
                alert('اسم المهارة يجب أن يكون حرفين على الأقل');
                return;
            }
            
            if (skills.includes(skill)) {
                alert('هذه المهارة موجودة بالفعل');
                return;
            }
            
            skills.push(skill);
            updateSkillsDisplay();
            skillInput.value = '';
        }

        function removeSkill(skill) {
            skills = skills.filter(s => s !== skill);
            updateSkillsDisplay();
        }

        function updateSkillsDisplay() {
            const container = document.getElementById('skillsContainer');
            container.innerHTML = '';
            
            if (skills.length === 0) {
                container.innerHTML = '<p style="color: #666; font-style: italic;">لم يتم إضافة مهارات بعد</p>';
                return;
            }
            
            skills.forEach(skill => {
                const skillTag = document.createElement('div');
                skillTag.className = 'skill-tag';
                skillTag.innerHTML = `
                    ${skill}
                    <i class="fas fa-times" onclick="removeSkill('${skill}')" style="cursor: pointer;"></i>
                `;
                container.appendChild(skillTag);
            });
        }

        // File upload handling
        document.getElementById('resumeFile').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileInfo = document.getElementById('fileInfo');
            
            if (file) {
                // Check file size (max 2MB)
                const fileSizeMB = file.size / 1024 / 1024;
                if (fileSizeMB > 2) {
                    fileInfo.innerHTML = `
                        <div style="color: #ff4757;">
                            <i class="fas fa-exclamation-triangle"></i>
                            حجم الملف كبير جداً. الحد الأقصى: 2 ميجابايت
                        </div>
                    `;
                    e.target.value = '';
                    return;
                }
                
                // Check file type
                const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (!allowedTypes.includes(file.type)) {
                    fileInfo.innerHTML = `
                        <div style="color: #ff4757;">
                            <i class="fas fa-exclamation-triangle"></i>
                            نوع الملف غير مدعوم. يرجى اختيار ملف PDF أو DOC أو DOCX
                        </div>
                    `;
                    e.target.value = '';
                    return;
                }
                
                const fileSize = fileSizeMB.toFixed(2);
                fileInfo.innerHTML = `
                    <div style="color: #2ed573;">
                        <i class="fas fa-check-circle"></i>
                        تم اختيار الملف: ${file.name} (${fileSize} MB)
                    </div>
                `;
            } else {
                fileInfo.innerHTML = '';
            }
        });

        // Form submission
        document.getElementById('applicationForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (!validateCurrentStep()) {
                return;
            }

            // Show loading
            document.getElementById('loading').style.display = 'block';
            document.getElementById('applicationForm').style.display = 'none';

            try {
                const formData = new FormData();
                
                // Add form fields
                const formFields = ['full_name', 'email', 'phone', 'address', 'city', 'country', 
                                  'degree', 'university', 'graduation_year', 'gpa', 
                                  'years_of_experience', 'current_position', 'current_company', 'cover_letter'];
                
                formFields.forEach(field => {
                    const element = document.querySelector(`[name="${field}"]`);
                    if (element) {
                        const value = element.value;
                        if (value) {
                            // Special validation for cover letter
                            if (field === 'cover_letter' && value.length < 100) {
                                throw new Error('رسالة التقديم يجب أن تكون 100 حرف على الأقل');
                            }
                            
                            // Special validation for GPA
                            if (field === 'gpa' && value) {
                                const gpa = parseFloat(value);
                                if (isNaN(gpa) || gpa < 0 || gpa > 100) {
                                    throw new Error('المعدل التراكمي يجب أن يكون بين 0 و 100');
                                }
                            }
                            
                            // Special validation for graduation year
                            if (field === 'graduation_year' && value) {
                                const year = parseInt(value);
                                const currentYear = new Date().getFullYear();
                                if (isNaN(year) || year < 1950 || year > currentYear + 1) {
                                    throw new Error(`سنة التخرج يجب أن تكون بين 1950 و ${currentYear + 1}`);
                                }
                            }
                            
                            formData.append(field, value);
                        } else {
                            throw new Error(`يرجى ملء حقل ${field}`);
                        }
                    }
                });

                // Add skills
                if (skills.length === 0) {
                    throw new Error('يرجى إضافة مهارة واحدة على الأقل');
                }
                formData.append('skills', JSON.stringify(skills));

                // Add resume file
                const resumeFile = document.getElementById('resumeFile').files[0];
                if (resumeFile) {
                    formData.append('resume', resumeFile);
                } else {
                    throw new Error('يرجى اختيار ملف السيرة الذاتية');
                }

                console.log('Sending application data...');
                console.log('Form data entries:');
                for (let [key, value] of formData.entries()) {
                    console.log(key, value);
                }
                
                console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                console.log('Job ID:', jobId);
                
                const response = await fetch(`/api/jobs/${jobId}/apply`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });

                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers);
                
                let result;
                try {
                    result = await response.json();
                    console.log('Response:', result);
                } catch (error) {
                    console.error('Error parsing response:', error);
                    const textResponse = await response.text();
                    console.log('Text response:', textResponse);
                    throw new Error('فشل في معالجة استجابة الخادم');
                }

                if (response.ok) {
                    // Show success message
                    document.getElementById('loading').style.display = 'none';
                    document.getElementById('successMessage').style.display = 'block';
                    console.log('Application submitted successfully!');
                    
                    // Show success notification
                    const successDiv = document.createElement('div');
                    successDiv.style.cssText = `
                        background: #2ed573;
                        color: white;
                        padding: 15px;
                        border-radius: 8px;
                        margin: 10px 0;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                    `;
                    successDiv.innerHTML = `
                        <i class="fas fa-check-circle"></i>
                        <div style="flex: 1;">
                            <p style="margin: 0;">تم إرسال طلب التقديم بنجاح!</p>
                        </div>
                        <button onclick="this.parentElement.remove()" class="btn btn-secondary" style="background: rgba(255,255,255,0.2); border: none; color: white;">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    
                    const container = document.querySelector('.application-container');
                    container.insertBefore(successDiv, container.firstChild);
                    
                    // Auto remove after 10 seconds
                    setTimeout(() => {
                        if (successDiv.parentElement) {
                            successDiv.remove();
                        }
                    }, 10000);
                } else {
                    let errorMessage = 'حدث خطأ أثناء إرسال الطلب';
                    if (result.message) {
                        errorMessage = result.message;
                    }
                    if (result.errors) {
                        errorMessage += '\n' + Object.values(result.errors).flat().join('\n');
                    }
                    throw new Error(errorMessage);
                }
            } catch (error) {
                console.error('Error submitting application:', error);
                console.error('Error details:', {
                    name: error.name,
                    message: error.message,
                    stack: error.stack
                });
                
                // Show error message in a more user-friendly way
                let errorMessage = error.message || 'حدث خطأ أثناء إرسال الطلب';
                
                // Handle network errors
                if (error.name === 'TypeError' && error.message.includes('fetch')) {
                    errorMessage = 'فشل في الاتصال بالخادم. يرجى التحقق من اتصال الإنترنت والمحاولة مرة أخرى.';
                }
                
                showErrorMessage(errorMessage);
                
                // Hide loading and show form again
                document.getElementById('loading').style.display = 'none';
                document.getElementById('applicationForm').style.display = 'block';
                
                // Scroll to top to show error message
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                // Focus on the first error field if available
                const firstErrorField = document.querySelector('.error');
                if (firstErrorField) {
                    firstErrorField.focus();
                }
            }
        });

        // Error message function
        function showErrorMessage(message) {
            // Create error message element
            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message';
            errorDiv.style.cssText = `
                background: #ff4757;
                color: white;
                padding: 15px;
                border-radius: 8px;
                margin: 10px 0;
                display: flex;
                align-items: center;
                gap: 10px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            `;
            errorDiv.innerHTML = `
                <i class="fas fa-exclamation-triangle"></i>
                <div style="flex: 1;">
                    <p style="margin: 0; white-space: pre-line;">${message}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="btn btn-secondary" style="background: rgba(255,255,255,0.2); border: none; color: white;">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            // Insert at the top of the application container
            const container = document.querySelector('.application-container');
            container.insertBefore(errorDiv, container.firstChild);
            
            // Auto remove after 15 seconds
            setTimeout(() => {
                if (errorDiv.parentElement) {
                    errorDiv.remove();
                }
            }, 15000);
        }

        // Character count function
        function updateCharacterCount(textarea) {
            const charCount = document.getElementById('charCount');
            const count = textarea.value.length;
            charCount.textContent = count;
            
            if (count < 100) {
                charCount.style.color = '#ff4757';
            } else {
                charCount.style.color = '#2ed573';
            }
        }

        // GPA validation function
        function validateGPA(input) {
            const value = parseFloat(input.value);
            
            // إزالة أي قيم غير صحيحة
            if (input.value && (isNaN(value) || value < 0 || value > 100)) {
                input.classList.add('error');
                input.style.borderColor = '#ff4757';
                
                // إظهار رسالة خطأ
                let errorMsg = input.parentNode.querySelector('.gpa-error');
                if (!errorMsg) {
                    errorMsg = document.createElement('div');
                    errorMsg.className = 'error-message gpa-error';
                    errorMsg.style.color = '#ff4757';
                    errorMsg.style.fontSize = '12px';
                    errorMsg.style.marginTop = '5px';
                    input.parentNode.appendChild(errorMsg);
                }
                errorMsg.textContent = 'المعدل التراكمي يجب أن يكون بين 0 و 100';
                
                // إعادة تعيين القيمة إذا كانت غير صحيحة
                if (value > 100) {
                    input.value = '';
                }
            } else {
                input.classList.remove('error');
                input.style.borderColor = '#e0e0e0';
                
                // إزالة رسالة الخطأ
                const errorMsg = input.parentNode.querySelector('.gpa-error');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }
        }

        // GPA formatting function
        function formatGPA(input) {
            if (input.value) {
                const value = parseFloat(input.value);
                if (!isNaN(value) && value >= 0 && value <= 100) {
                    // تنسيق الرقم ليكون رقمين عشريين كحد أقصى
                    input.value = value.toFixed(2);
                }
            }
        }

        // Graduation year validation function
        function validateGraduationYear(input) {
            const value = parseInt(input.value);
            const currentYear = new Date().getFullYear();
            const minYear = 1950;
            const maxYear = currentYear + 1;
            
            if (input.value && (isNaN(value) || value < minYear || value > maxYear)) {
                input.classList.add('error');
                input.style.borderColor = '#ff4757';
                
                // إظهار رسالة خطأ
                let errorMsg = input.parentNode.querySelector('.year-error');
                if (!errorMsg) {
                    errorMsg = document.createElement('div');
                    errorMsg.className = 'error-message year-error';
                    errorMsg.style.color = '#ff4757';
                    errorMsg.style.fontSize = '12px';
                    errorMsg.style.marginTop = '5px';
                    input.parentNode.appendChild(errorMsg);
                }
                errorMsg.textContent = `سنة التخرج يجب أن تكون بين ${minYear} و ${maxYear}`;
                
                // إعادة تعيين القيمة إذا كانت غير صحيحة
                if (value > maxYear) {
                    input.value = '';
                }
            } else {
                input.classList.remove('error');
                input.style.borderColor = '#e0e0e0';
                
                // إزالة رسالة الخطأ
                const errorMsg = input.parentNode.querySelector('.year-error');
                if (errorMsg) {
                    errorMsg.remove();
                }
            }
        }

        // Initialize
        loadJobDetails();
        updateSteps();
        
        // Initialize character count
        const coverLetterTextarea = document.querySelector('textarea[name="cover_letter"]');
        if (coverLetterTextarea) {
            updateCharacterCount(coverLetterTextarea);
        }
    </script>
</body>
</html> 