@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@endsection


@section('title')

<!-- write The title here like 'Home page' with out anything just string. "Ahmed" -->

@endsection


@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->
@section('content')

<!-- Write all codes of page here without write <html> or <body>. "Ahmed" -->


           <!-- Hero Section -->
<section class="hero-section">
    <div class="hero-container">
        <!-- النص والأزرار -->
        <div class="hero-content">
            <h1>Smart Sitting <br><span class="highlight">Starts Here</span></h1>
            
            <p class="hero-description">
                Our smart sitting solution helps you maintain perfect posture, reduce back pain, and improve your productivity every day.
            </p>
            
            <div class="hero-buttons">
                <a href="#buy" class="btn btn-outline">Buy Now 🛒</a>
                <a href="#features" class="btn btn-outline">Learn More &rarr;</a>
            </div>
        </div>

        <!-- صورة المنتج (العنصر الأساسي) -->
        <div class="hero-image-wrapper">
            <div class="podium-glow"></div>
            <div class="hero-image">
                <img src="{{ asset('images/seat_image.jpg') }}" alt="Smart Sitting Device" class="chair-img">
            </div>
        </div>
    </div>
</section>
<!-- ⚠️ The Problem Section -->
<section class="problem-section" id="problem-section">
    <div class="problem-container">
        
        <!-- Header -->
        <div class="problem-header">
            <span class="problem-badge">THE REAL ISSUE</span>
            <h2 class="problem-main-title">Are You Facing These Everyday Problems?</h2>
            <p class="problem-sub-title">Sitting for long hours without proper support affects your health more than you think.</p>
        </div>

        <!-- Cards Grid (3 Cards متساوية) -->
        <div class="problem-grid">
            
            <!-- Card 1 -->
            <div class="problem-card">
                <div class="problem-icon-wrapper">
                    <i class="fa-solid fa-chair"></i>
                </div>
                <h3>Long Sitting Hours</h3>
                <p>Spending long hours sitting can leave your body feeling tired and uncomfortable.</p>
            </div>

            <!-- Card 2 -->
            <div class="problem-card">
                <div class="problem-icon-wrapper">
                    <i class="fa-solid fa-face-grimace"></i>
                </div>
                <h3>Back Pain</h3>
                <p>Unbearable lower back discomfort and stiffness that follows you home, ruining your relaxation and sleep quality.</p>
            </div>

            <!-- Card 3 -->
            <div class="problem-card">
                <div class="problem-icon-wrapper">
                    <i class="fa-solid fa-person"></i>
                </div>
                <h3>Bad Posture</h3>
                <p>Slouching unconsciously leads to spinal misalignment, chronic fatigue, and a noticeable drop in your daily productivity.</p>
            </div>

        </div>

    </div>
</section>
 <!-- 💡 Our Solution Section -->
<section class="solution-section" id="solution-section">
    <div class="solution-container">
        
        <!-- Header -->
        <div class="solution-header">
            <span class="solution-badge">OUR SOLUTION</span>
            <h2 class="solution-main-title">Smart Sitting, Better Living.</h2>
            <p class="solution-sub-title">We combine ergonomic design with smart posture technology to help you sit right, reduce back pain, and improve your daily well-being.</p>
        </div>

        <!-- Before & After Transformation Layout -->
        <div class="transformation-grid">
            
            <!-- 1. BEFORE CARD -->
            <div class="transform-card before-card">
                <div class="card-status-badge bad-badge">BEFORE</div>
                <h3>Poor Posture</h3>
                <div class="transform-img-box">
                    <img src="{{ asset('images/bad.jpg') }}" alt="Poor Posture" onerror="this.src='https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&auto=format&fit=crop&q=60'">
                </div>
                <ul class="transform-list bad-list">
                    <li><i class="fa-solid fa-xmark"></i> Back pain & stiffness</li>
                    <li><i class="fa-solid fa-xmark"></i> Low daily energy</li>
                    <li><i class="fa-solid fa-xmark"></i> Poor focus at work</li>
                </ul>
            </div>

            <!-- Arrow Indicator 1 -->
            <div class="transform-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <!-- 2. PRODUCT SOLUTION CARD (CENTER) -->
            <div class="transform-card solution-card-highlight">
                <div class="card-status-badge good-badge">THE PRODUCT</div>
                <h3>SitFit Device</h3>
                <div class="transform-img-box product-img-box">
                    <!>
                    <img src="{{ asset('images/classic-chair-front.png') }}" alt="SitFit Product">
                </div>
                <div class="product-features-mini">
                    <span><i class="fa-solid "></i> Ergonomic</span>
                    <span><i class="fa-solid "></i> Smart</span>
                    <span><i class="fa-solid "></i> Comfort</span>
                </div>
            </div>

            <!-- Arrow Indicator 2 -->
            <div class="transform-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </div>

            <!-- 3. AFTER CARD -->
            <div class="transform-card after-card">
                <div class="card-status-badge good-badge">AFTER</div>
                <h3>Better You</h3>
                <div class="transform-img-box">
                    <img src="{{ asset('images/good.jpg') }}" alt="Good Posture" onerror="this.src='https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=500&auto=format&fit=crop&q=60'">
                </div>
                <ul class="transform-list good-list">
                    <li><i class="fa-solid fa-check"></i> Healthy spine alignment</li>
                    <li><i class="fa-solid fa-check"></i> All-day high comfort</li>
                    <li><i class="fa-solid fa-check"></i> Boosted productivity</li>
                </ul>
            </div>

        </div>

    </div>
</section>
<section class="features-section">
    <div class="features-container">
        
        <div class="features-header">
            <span class="features-badge">INTERACTIVE FEATURES</span>
            <h2>Smart Features for Better Sitting</h2>
            <p>Designed for your comfort and posture.</p>
        </div>

        <div class="features-grid">
            
            <div class="feature-card" onclick="selectCard(this)">
                <div class="icon-box">🤖</div>
                <h3>AI Analysis</h3>
                <p>Analyzes your sitting habits and helps you understand your posture better.</p>

            </div>

            <div class="feature-card" onclick="selectCard(this)">
                <div class="icon-box">⚙️</div>
                <h3>Adjustable Support</h3>
                <p>Provides adjustable support to help you find the most comfortable sitting position.</p>

            </div>

            <div class="feature-card" onclick="selectCard(this)">
                <div class="icon-box">🪑</div>
                <h3>Fits Most Chairs</h3>
                <p>Designed to fit easily on most chairs, making it simple to use anywhere.</p>

            </div>

            <div class="feature-card" onclick="selectCard(this)">
                <div class="icon-box">🛠️</div>
                <h3>Easy Installation</h3>
                <p>Easy to install and ready to use in just a few simple steps.</p>

            </div>

            <div class="feature-card" onclick="selectCard(this)">
                <div class="icon-box">🔔</div>
                <h3>Smart Notifications</h3>
                <p>Get smart reminders to adjust your sitting position and take care of your posture.</p>

            </div>

            <div class="feature-card" onclick="selectCard(this)">
                <div class="icon-box">✨</div>
                <h3>Comfortable Design</h3>
                <p>A comfortable and modern design created to make long sitting hours more enjoyable.</p>

            </div>

        </div>

    </div>
</section>

<script>
    function selectCard(card) {
        document.querySelectorAll('.feature-card').forEach(c => c.classList.remove('active'));
        card.classList.add('active');
    }
</script>
<!-- ==========================================>
   🚀 How It Works Section (3 Steps Timeline)
  < ========================================== -->
<section class="how-it-works-section" id="how-it-works">
    <div class="how-it-works-container">
        
        <!-- Section Header -->
        <div class="hiw-header">
            <span class="hiw-badge">HOW IT WORKS</span>
            <h2 class="hiw-main-title">How SitFit Works</h2>
            <p class="hiw-sub-title">Get started in seconds and experience effortless posture improvement.</p>
        </div>

        <!-- 3 Steps Timeline Grid -->
        <div class="steps-timeline">

            <!-- Step 1 -->
            <div class="step-card">
                <div class="step-number">01</div>
                <div class="step-image-wrapper">
                    <img src="{{ asset('images/sitfittt.png') }}" alt="Attach Device" class="step-img">
                </div>
                <div class="step-icon-box">
                    <i class="fa-solid fa-link"></i>
                </div>
                <h3>Attach Device</h3>
                <p>Securely clip SitFit onto any office, gaming, or dining chair in seconds with universal flexible straps.</p>
            </div>

            <!-- Arrow 1 -->
            <div class="step-connector">
                <i class="fa-solid fa-chevron-right"></i>
            </div>

            <!-- Step 2 -->
            <div class="step-card">
                <div class="step-number">02</div>
                <div class="step-image-wrapper">
                    <img src="{{ asset('images/sitfitkj.png') }}" alt="Adjust Support" class="step-img">
                </div>
                <div class="step-icon-box">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <h3>Adjust Support</h3>
                <p>Customize the lumbar tension and firmness to match your spine's natural curvature perfectly.</p>
            </div>

            <!-- Arrow 2 -->
            <div class="step-connector">
                <i class="fa-solid fa-chevron-right"></i>
            </div>

            <!-- Step 3 -->
            <div class="step-card">
                <div class="step-number">03</div>
                <div class="step-image-wrapper">
                    <img src="{{ asset('images/sitfitt4.png') }}" alt="Enjoy Better Posture" class="step-img">
                </div>
                <div class="step-icon-box">
                    <i class="fa-solid fa-face-smile"></i>
                </div>
                <h3>Enjoy Better Posture</h3>
                <p>Sit back comfortably while smart haptic nudges maintain healthy posture throughout your working day.</p>
            </div>

        </div>
    </div>
</section>

 
<div id="trueLightboxModal" class="true-lightbox-overlay" onclick="closeTrueLightbox()">
    <span class="true-lightbox-close">&times;</span>
    <img id="trueLightboxImg" class="true-lightbox-image-content">
</div>
<section class="preview-section">
    <div class="preview-container">
        
        <div class="preview-header">
            <span class="preview-badge">INTERACTIVE GALLERY</span>
            <h2>Experience SitFit In Detail</h2>
            <p>Hover or click thumbnails to inspect features and angles.</p>
        </div>

        <div class="gallery-card">
            
            <div class="thumbnails-wrapper">
                <div class="thumb-card active" onclick="updateMainImage(this, '{{ asset('images/chairr1.png') }}', false)">
                    <img src="{{ asset('images/chairr1.png') }}" alt="Main View">
                    <span class="thumb-label">Front</span>
                </div>
                
                <div class="thumb-card" onclick="updateMainImage(this, '{{ asset('images/chairrr2.png') }}', false)">
                    <img src="{{ asset('images/chairrr2.png') }}" alt="Side Profile">
                    <span class="thumb-label">Side</span>
                </div>

                <div class="thumb-card" onclick="updateMainImage(this, '{{ asset('images/chaair3.png') }}', false)">
                    <img src="{{ asset('images/chaair3.png') }}" alt="Lumbar Support">
                    <span class="thumb-label">Back</span>
                </div>

                <div class="thumb-card thumb-360" onclick="updateMainImage(this, '{{ asset('images/chairrr4.png') }}', true)">
                    <div class="badge-360-icon"><i class="fa-solid fa-rotate"></i> </div>
                    <img src="{{ asset('images/chairrr4.png') }}" alt="">
                </div>
            </div>

            <div class="main-display-box" onclick="openFullZoom()">
                <div id="interactiveBadge" class="interactive-tag" style="display: none;">
                    <i class="fa-solid fa-arrows-spin"></i> 
                </div>

                <img id="currentMainImg" src="{{ asset('images/chairr1.png') }}" alt="SitFit Ergonomic Chair Cushion" class="hero-product-img">
                
                <div class="zoom-overlay">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                    <span>Click to Expand</span>
                </div>
            </div>

        </div>

    </div>
</section>

<div id="imageLightbox" class="lightbox-overlay" onclick="closeFullZoom()">
    <span class="lightbox-close">&times;</span>
    <img id="lightboxImg" class="lightbox-image" src="" alt="Zoomed View">
</div>

<script>
    function updateMainImage(element, src, is360) {
        // 1. Update Main Image Source
        const mainImg = document.getElementById('currentMainImg');
        const badge = document.getElementById('interactiveBadge');
        
        mainImg.src = src;

        // 2. Toggle 360 Badge
        if (is360) {
            badge.style.display = 'inline-flex';
        } else {
            badge.style.display = 'none';
        }

        // 3. Update Active Thumbnail Styling
        document.querySelectorAll('.thumb-card').forEach(card => card.classList.remove('active'));
        element.classList.add('active');
    }

    function openFullZoom() {
        const currentSrc = document.getElementById('currentMainImg').src;
        document.getElementById('lightboxImg').src = currentSrc;
        document.getElementById('imageLightbox').classList.add('open');
    }

    function closeFullZoom() {
        document.getElementById('imageLightbox').classList.remove('open');
    }
</script>
<!-- 8️⃣ Customer Reviews Section -->
<section class="reviews-section" id="reviews-section">
    <div class="reviews-container">
        
        <!-- Header -->
        <div class="reviews-header">
            <span class="reviews-badge">TRUSTED BY HUNDREDS</span>
            
            <!-- 1. الكلمة الكبيرة (تنور أزرق عند اللمس) -->
            <h2 class="main-title">
                What Our Customers Say
            </h2>
            
            <!-- 2. الكلمة الصغيرة تحتها (تطلع لفوق وتتلون أخضر عند اللمس) -->
            <p class="sub-title-hover">
                Real stories from people who transformed their daily sitting posture with SitFit.
            </p>
            
            <!-- 3. صندوق التقييم (4.9) (يرتفع وينور أزرق عند اللمس) -->
            <div class="rating-summary-card">
                <div class="rating-stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="rating-score">
                    <span class="score-num">4.9</span>
                    <span class="score-total">/ 5</span>
                </div>
                <div class="rating-count">Based on <strong>500+ Reviews</strong></div>
            </div>
        </div>

        <!-- Reviews Grid -->
        <div class="reviews-grid">
            
            <!-- Review Card 1 -->
            <div class="review-card">
                <div class="card-top">
                    <div class="user-info">
                        <img src="{{ asset('images/user1.jpg') }}" alt="Ahmed Hassan" class="user-avatar">
                        <div class="user-details">
                            <h3>Ahmed Hassan</h3>
                            <span class="user-role">Software Engineer</span>
                        </div>
                    </div>
                    <span class="verified-badge"><i class="fa-solid fa-circle-check"></i> Verified</span>
                </div>
                <div class="review-stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="review-text">
                    "This product has completely changed the way I sit. I feel more comfortable and supported throughout my workday."
                </p>
            </div>

            <!-- Review Card 2 -->
            <div class="review-card">
                <div class="card-top">
                    <div class="user-info">
                        <img src="{{ asset('images/user2.jpg') }}" alt="Sarah Omar" class="user-avatar">
                        <div class="user-details">
                            <h3>Sarah Omar</h3>
                            <span class="user-role">Graphic Designer</span>
                        </div>
                    </div>
                    <span class="verified-badge"><i class="fa-solid fa-circle-check"></i> Verified</span>
                </div>
                <div class="review-stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="review-text">
                    "I spend many hours working at my desk, and this has made sitting for long periods much more comfortable."
                </p>
            </div>

            <!-- Review Card 3 -->
            <div class="review-card">
                <div class="card-top">
                    <div class="user-info">
                        <img src="{{ asset('images/user3.jpg') }}" alt="Mohamed Ali" class="user-avatar">
                        <div class="user-details">
                            <h3>Mohamed Ali</h3>
                            <span class="user-role">Data Analysis</span>
                        </div>
                    </div>
                    <span class="verified-badge"><i class="fa-solid fa-circle-check"></i> Verified</span>
                </div>
                <div class="review-stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="review-text">
                    "Easy to use, comfortable, and the smart reminders really help me improve my sitting posture."
                </p>
            </div>

        </div>

    </div>
</section>
<!-- 9️⃣ FAQ Section (Frequently Asked Questions) -->
<section class="faq-section" id="faq-section">
    <div class="faq-container">
        
        <!-- Header -->
        <div class="faq-header">
            <span class="faq-badge">GOT QUESTIONS?</span>
            <h2 class="faq-main-title">Frequently Asked Questions</h2>
            <p class="faq-sub-title">Everything you need to know about SitFit and how it improves your posture.</p>
        </div>

        <!-- FAQ Accordion List -->
        <div class="faq-accordion">
            
            <!-- Question 1 -->
            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Does it fit most chairs?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes, the product is designed to fit most standard chairs and can be easily adjusted for a comfortable fit.</p>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Does it come with a warranty?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes, the product comes with a warranty to ensure your satisfaction and peace of mind.</p>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>Is it comfortable for long hours of sitting?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes, it is designed to provide better support and comfort, making long hours of sitting more comfortable.</p>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="faq-item">
                <button class="faq-question" onclick="toggleFaq(this)">
                    <span>What makes this product different from a regular chair?</span>
                    <i class="fa-solid fa-chevron-down faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Unlike a regular chair, this smart solution uses technology to help you monitor your sitting habits and improve your posture and comfort.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- جافاسكريفت الأكورديون الاحترافي والسلس -->
<script>
    function toggleFaq(button) {
        const item = button.parentElement;
        const isActive = item.classList.contains('active');
        
        // إغلاق كل الأسئلة المفتوحة الأخرى (اختياري، لجعل السيكشن منظماً)
        const allItems = document.querySelectorAll('.faq-item');
        allItems.forEach(i => i.classList.remove('active'));
        
        // إذا لم يكن مفتوحاً، قومي بفتحه
        if (!isActive) {
            item.classList.add('active');
        }
    }
</script>
<!-- 🔟 Meet Our Team Section -->
<section class="team-section" id="team-section">
    <div class="team-container">
        
        <!-- Header -->
        <div class="team-header">
            <span class="team-badge">THE MINDS BEHIND SITFIT</span>
            <h2 class="team-main-title">Meet Our Expert Team</h2>
        </div>

        <!-- Team Grid -->
        <div class="team-grid">
            
            <!-- Team Member 1 -->
            <div class="team-card">
                <div class="team-img-wrapper">
                    <img src="{{ asset('images/team1.jpg') }}" alt="Ahmed Mahmoud" class="team-avatar">
                </div>
                <div class="team-info">
                    <h3>Ahmed Mahmoud</h3>
                    <span class="team-position">Leader Web /Backend Developer</span>
                    <span class="team-council">Web Development</span>
                    
                    <div class="team-socials">
                        <a href="mailto:ahmed@sitfit.com" title="Email" class="social-btn"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank" title="LinkedIn" class="social-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://github.com" target="_blank" title="GitHub" class="social-btn"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-card">
                <div class="team-img-wrapper">
                    <img src="{{ asset('images/team2.jpg') }}" alt="Sondos" class="team-avatar">
                </div>
                <div class="team-info">
                    <h3>sondos Hitham</h3>
                    <span class="team-position">Frontend Developer</span>
                    <span class="team-council">Web Development</span>
                    
                    <div class="team-socials">
                        <a href="mailto:nouran@sitfit.com" title="Email" class="social-btn"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank" title="LinkedIn" class="social-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-card">
                <div class="team-img-wrapper">
                    <img src="{{ asset('images/team3.jpg') }}" alt="Karim Mohamed" class="team-avatar">
                </div>
                <div class="team-info">
                    <h3>Karim Mohamed</h3>
                    <span class="team-position">Frontend Developer</span>
                    <span class="team-council">Web Development</span>
                    
                    <div class="team-socials">
                        <a href="mailto:tarek@sitfit.com" title="Email" class="social-btn"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank" title="LinkedIn" class="social-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="team-card">
                <div class="team-img-wrapper">
                    <img src="{{ asset('images/team4.jpg') }}" alt="Yasmina Mohamed" class="team-avatar">
                </div>
                <div class="team-info">
                    <h3>Yasmina Mohamed</h3>
                    <span class="team-position">Frontend Developer</span>
                    <span class="team-council">Web Development</span>
                    
                    <div class="team-socials">
                        <a href="mailto:yomna@sitfit.com" title="Email" class="social-btn"><i class="fa-solid fa-envelope"></i></a>
                        <a href="https://linkedin.com" target="_blank" title="LinkedIn" class="social-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="https://github.com" target="_blank" title="GitHub" class="social-btn"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
@endsection