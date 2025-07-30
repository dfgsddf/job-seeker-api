// Global Variables
let authToken = '';
let currentJobId = null;
let appUrl = 'http://localhost:8000'; // يمكن تغيير هذا حسب البيئة

// API Configuration
const API_CONFIG = {
    baseUrl: appUrl,
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
};

// Initialize App
document.addEventListener('DOMContentLoaded', function() {
    console.log('تطبيق البحث عن الوظائف جاهز');
    loadInitialData();
});

// Authentication Functions
function setAuthToken() {
    const tokenInput = document.getElementById('authToken');
    authToken = tokenInput.value.trim();
    
    if (authToken) {
        localStorage.setItem('authToken', authToken);
        showMessage('تم تسجيل الدخول بنجاح', 'success');
        loadInitialData();
    } else {
        showMessage('يرجى إدخال رمز المصادقة', 'error');
    }
}

function getAuthHeaders() {
    const headers = { ...API_CONFIG.headers };
    if (authToken) {
        headers['Authorization'] = `Bearer ${authToken}`;
    }
    return headers;
}

// Navigation Functions
function showSection(sectionName) {
    // Hide all sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));
    
    // Show selected section
    const selectedSection = document.getElementById(sectionName);
    if (selectedSection) {
        selectedSection.classList.add('active');
    }
    
    // Update navigation buttons
    const navButtons = document.querySelectorAll('.nav-btn');
    navButtons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    
    // Load section data
    loadSectionData(sectionName);
}

function loadSectionData(sectionName) {
    switch(sectionName) {
        case 'jobs':
            searchJobs();
            break;
        case 'favorites':
            loadFavoriteJobs();
            break;
        case 'companies':
            loadCompanies();
            break;
        case 'faqs':
            loadFAQs();
            break;
        case 'policies':
            loadPolicies();
            break;
    }
}

// Jobs Functions
async function searchJobs() {
    const jobsResults = document.getElementById('jobsResults');
    jobsResults.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>جاري البحث عن الوظائف...</p></div>';
    
    try {
        const params = new URLSearchParams();
        
        // Get form values
        const fromDate = document.getElementById('fromDate').value;
        const toDate = document.getElementById('toDate').value;
        const countryGraduation = document.getElementById('countryGraduation').value;
        const countryResidence = document.getElementById('countryResidence').value;
        const workField = document.getElementById('workField').value;
        const jobTitle = document.getElementById('jobTitle').value;
        const workPlace = document.getElementById('workPlace').value;
        const genderPreference = document.getElementById('genderPreference').value;
        const educationLevel = document.getElementById('educationLevel').value;
        const workExperience = document.getElementById('workExperience').value;
        const businessMan = document.getElementById('businessMan').value;
        
        // Add parameters if they have values
        if (fromDate) params.append('from_date', fromDate);
        if (toDate) params.append('to_date', toDate);
        if (countryGraduation) params.append('country_of_graduation', countryGraduation);
        if (countryResidence) params.append('country_of_residence', countryResidence);
        if (workField) params.append('work_field_id', workField);
        if (jobTitle) params.append('title', jobTitle);
        if (workPlace) params.append('work_place', workPlace);
        if (genderPreference) params.append('gender_perfrence', genderPreference);
        if (educationLevel) params.append('education_level_id', educationLevel);
        if (workExperience) params.append('work_experience', workExperience);
        if (businessMan) params.append('business_man_id', businessMan);
        
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/job-seeker/all-jobs?${params}`, {
            method: 'GET',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            const jobs = await response.json();
            displayJobs(jobs);
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error searching jobs:', error);
        jobsResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>خطأ في البحث</h3>
                <p>حدث خطأ أثناء البحث عن الوظائف. يرجى المحاولة مرة أخرى.</p>
            </div>
        `;
    }
}

function displayJobs(jobs) {
    const jobsResults = document.getElementById('jobsResults');
    
    if (!jobs || jobs.length === 0) {
        jobsResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-search"></i>
                <h3>لا توجد وظائف</h3>
                <p>لم يتم العثور على وظائف تطابق معايير البحث.</p>
            </div>
        `;
        return;
    }
    
    const jobsHTML = jobs.map(job => `
        <div class="job-card" onclick="showJobDetails(${job.id})">
            <div class="job-title">${job.title || 'عنوان الوظيفة'}</div>
            <div class="job-company">${job.company || 'اسم الشركة'}</div>
            <div class="job-location">
                <i class="fas fa-map-marker-alt"></i>
                ${job.location || 'موقع العمل'}
            </div>
            <div class="job-description">
                ${job.description || 'وصف الوظيفة يظهر هنا...'}
            </div>
            <div class="job-actions">
                <button class="btn btn-secondary" onclick="event.stopPropagation(); markAsFavorite(${job.id})">
                    <i class="fas fa-heart"></i>
                    إضافة للمفضلة
                </button>
                <button class="btn btn-primary" onclick="event.stopPropagation(); applyForJob(${job.id})">
                    <i class="fas fa-paper-plane"></i>
                    التقديم
                </button>
            </div>
        </div>
    `).join('');
    
    jobsResults.innerHTML = jobsHTML;
}

async function showJobDetails(jobId) {
    currentJobId = jobId;
    const jobModal = document.getElementById('jobModal');
    const jobDetails = document.getElementById('jobDetails');
    
    jobDetails.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>جاري تحميل تفاصيل الوظيفة...</p></div>';
    jobModal.style.display = 'block';
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/job-seeker/job-details/${jobId}`, {
            method: 'GET',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            const job = await response.json();
            displayJobDetails(job);
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error loading job details:', error);
        jobDetails.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>خطأ في التحميل</h3>
                <p>حدث خطأ أثناء تحميل تفاصيل الوظيفة.</p>
            </div>
        `;
    }
}

function displayJobDetails(job) {
    const jobDetails = document.getElementById('jobDetails');
    
    jobDetails.innerHTML = `
        <h3>${job.title || 'عنوان الوظيفة'}</h3>
        <p><strong>الشركة:</strong> ${job.company || 'اسم الشركة'}</p>
        <p><strong>الموقع:</strong> ${job.location || 'موقع العمل'}</p>
        <p><strong>الراتب:</strong> ${job.salary || 'غير محدد'}</p>
        <p><strong>نوع العمل:</strong> ${job.type || 'دوام كامل'}</p>
        <p><strong>الوصف:</strong></p>
        <p>${job.description || 'وصف الوظيفة يظهر هنا...'}</p>
        <p><strong>المتطلبات:</strong></p>
        <p>${job.requirements || 'متطلبات الوظيفة تظهر هنا...'}</p>
    `;
}

function closeJobModal() {
    document.getElementById('jobModal').style.display = 'none';
    currentJobId = null;
}

// Favorites Functions
async function loadFavoriteJobs() {
    const favoritesResults = document.getElementById('favoritesResults');
    favoritesResults.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>جاري تحميل الوظائف المفضلة...</p></div>';
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/job-seeker/favorite-jobs`, {
            method: 'GET',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            const favorites = await response.json();
            displayFavoriteJobs(favorites);
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error loading favorites:', error);
        favoritesResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>خطأ في التحميل</h3>
                <p>حدث خطأ أثناء تحميل الوظائف المفضلة.</p>
            </div>
        `;
    }
}

function displayFavoriteJobs(favorites) {
    const favoritesResults = document.getElementById('favoritesResults');
    
    if (!favorites || favorites.length === 0) {
        favoritesResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-heart"></i>
                <h3>لا توجد وظائف مفضلة</h3>
                <p>لم تقم بإضافة أي وظائف للمفضلة بعد.</p>
            </div>
        `;
        return;
    }
    
    const favoritesHTML = favorites.map(job => `
        <div class="job-card">
            <div class="job-title">${job.title || 'عنوان الوظيفة'}</div>
            <div class="job-company">${job.company || 'اسم الشركة'}</div>
            <div class="job-location">
                <i class="fas fa-map-marker-alt"></i>
                ${job.location || 'موقع العمل'}
            </div>
            <div class="job-description">
                ${job.description || 'وصف الوظيفة يظهر هنا...'}
            </div>
            <div class="job-actions">
                <button class="btn btn-primary" onclick="showJobDetails(${job.id})">
                    <i class="fas fa-eye"></i>
                    عرض التفاصيل
                </button>
            </div>
        </div>
    `).join('');
    
    favoritesResults.innerHTML = favoritesHTML;
}

async function markAsFavorite(jobId = currentJobId) {
    if (!jobId) return;
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/job-seeker/jobs/${jobId}/mark-favorite`, {
            method: 'POST',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            showMessage('تم إضافة الوظيفة للمفضلة بنجاح', 'success');
            closeJobModal();
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error marking as favorite:', error);
        showMessage('حدث خطأ أثناء إضافة الوظيفة للمفضلة', 'error');
    }
}

// Apply Job Functions
function applyForJob(jobId = currentJobId) {
    if (!jobId) return;
    
    currentJobId = jobId;
    document.getElementById('applyModal').style.display = 'block';
}

function closeApplyModal() {
    document.getElementById('applyModal').style.display = 'none';
    document.getElementById('videoFile').value = '';
    currentJobId = null;
}

async function submitApplication() {
    const videoFile = document.getElementById('videoFile').files[0];
    
    if (!videoFile) {
        showMessage('يرجى اختيار ملف فيديو', 'error');
        return;
    }
    
    const formData = new FormData();
    formData.append('vedio', videoFile);
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/job-seeker/jobs/applied/${currentJobId}`, {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${authToken}`
            },
            body: formData
        });
        
        if (response.ok) {
            showMessage('تم إرسال طلب التقديم بنجاح', 'success');
            closeApplyModal();
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error submitting application:', error);
        showMessage('حدث خطأ أثناء إرسال طلب التقديم', 'error');
    }
}

// Companies Functions
async function loadCompanies() {
    const companiesResults = document.getElementById('companiesResults');
    companiesResults.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>جاري تحميل الشركات...</p></div>';
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/all-companies`, {
            method: 'GET',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            const companies = await response.json();
            displayCompanies(companies);
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error loading companies:', error);
        companiesResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>خطأ في التحميل</h3>
                <p>حدث خطأ أثناء تحميل قائمة الشركات.</p>
            </div>
        `;
    }
}

function displayCompanies(companies) {
    const companiesResults = document.getElementById('companiesResults');
    
    if (!companies || companies.length === 0) {
        companiesResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-building"></i>
                <h3>لا توجد شركات</h3>
                <p>لم يتم العثور على شركات متاحة.</p>
            </div>
        `;
        return;
    }
    
    const companiesHTML = companies.map(company => `
        <div class="company-card">
            <div class="company-logo">
                <i class="fas fa-building"></i>
            </div>
            <div class="company-name">${company.name || 'اسم الشركة'}</div>
            <div class="company-description">
                ${company.description || 'وصف الشركة يظهر هنا...'}
            </div>
        </div>
    `).join('');
    
    companiesResults.innerHTML = companiesHTML;
}

// FAQs Functions
async function loadFAQs() {
    const faqsResults = document.getElementById('faqsResults');
    faqsResults.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>جاري تحميل الأسئلة الشائعة...</p></div>';
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/faqs`, {
            method: 'GET',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            const faqs = await response.json();
            displayFAQs(faqs);
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error loading FAQs:', error);
        faqsResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>خطأ في التحميل</h3>
                <p>حدث خطأ أثناء تحميل الأسئلة الشائعة.</p>
            </div>
        `;
    }
}

function displayFAQs(faqs) {
    const faqsResults = document.getElementById('faqsResults');
    
    if (!faqs || faqs.length === 0) {
        faqsResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-question-circle"></i>
                <h3>لا توجد أسئلة شائعة</h3>
                <p>لم يتم العثور على أسئلة شائعة متاحة.</p>
            </div>
        `;
        return;
    }
    
    const faqsHTML = faqs.map((faq, index) => `
        <div class="faq-item" onclick="toggleFAQ(${index})">
            <div class="faq-question">
                ${faq.question || 'السؤال يظهر هنا'}
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                ${faq.answer || 'الإجابة تظهر هنا...'}
            </div>
        </div>
    `).join('');
    
    faqsResults.innerHTML = faqsHTML;
}

function toggleFAQ(index) {
    const faqItems = document.querySelectorAll('.faq-item');
    const clickedItem = faqItems[index];
    
    // Close other FAQs
    faqItems.forEach((item, i) => {
        if (i !== index) {
            item.classList.remove('active');
        }
    });
    
    // Toggle clicked FAQ
    clickedItem.classList.toggle('active');
}

// Policies Functions
async function loadPolicies() {
    const policiesResults = document.getElementById('policiesResults');
    policiesResults.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>جاري تحميل الشروط والسياسات...</p></div>';
    
    try {
        const response = await fetch(`${API_CONFIG.baseUrl}/ar/api/policies`, {
            method: 'GET',
            headers: getAuthHeaders()
        });
        
        if (response.ok) {
            const policies = await response.json();
            displayPolicies(policies);
        } else {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error loading policies:', error);
        policiesResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>خطأ في التحميل</h3>
                <p>حدث خطأ أثناء تحميل الشروط والسياسات.</p>
            </div>
        `;
    }
}

function displayPolicies(policies) {
    const policiesResults = document.getElementById('policiesResults');
    
    if (!policies || policies.length === 0) {
        policiesResults.innerHTML = `
            <div class="empty-state">
                <i class="fas fa-file-contract"></i>
                <h3>لا توجد سياسات</h3>
                <p>لم يتم العثور على شروط وسياسات متاحة.</p>
            </div>
        `;
        return;
    }
    
    const policiesHTML = policies.map(policy => `
        <div class="policies-content">
            <h3>${policy.title || 'عنوان السياسة'}</h3>
            <p>${policy.content || 'محتوى السياسة يظهر هنا...'}</p>
        </div>
    `).join('');
    
    policiesResults.innerHTML = policiesHTML;
}

// Utility Functions
function showMessage(message, type = 'info') {
    // Create message element
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${type}`;
    messageDiv.textContent = message;
    
    // Add to page
    const container = document.querySelector('.container');
    container.insertBefore(messageDiv, container.firstChild);
    
    // Remove after 5 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}

function loadInitialData() {
    // Load saved auth token
    const savedToken = localStorage.getItem('authToken');
    if (savedToken) {
        authToken = savedToken;
        document.getElementById('authToken').value = savedToken;
    }
    
    // Load initial section (jobs)
    loadSectionData('jobs');
}

// Close modals when clicking outside
window.onclick = function(event) {
    const jobModal = document.getElementById('jobModal');
    const applyModal = document.getElementById('applyModal');
    
    if (event.target === jobModal) {
        closeJobModal();
    }
    if (event.target === applyModal) {
        closeApplyModal();
    }
}

// Export functions for global access
window.showSection = showSection;
window.searchJobs = searchJobs;
window.showJobDetails = showJobDetails;
window.closeJobModal = closeJobModal;
window.markAsFavorite = markAsFavorite;
window.applyForJob = applyForJob;
window.closeApplyModal = closeApplyModal;
window.submitApplication = submitApplication;
window.toggleFAQ = toggleFAQ;
window.setAuthToken = setAuthToken;