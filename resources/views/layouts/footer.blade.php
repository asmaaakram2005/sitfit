<!-- Write A footer code under this command. "Ahmed"-->

<footer class="sf-footer">
    <div class="sf-footer-container">

        <div class="sf-footer-grid">

            <!-- Column 1: About SitFit -->
            <div class="sf-footer-col sf-footer-about">

                 <a href="{{ route('home') }}" class="sf-footer-brand">
                     <img src="{{ asset('images/sitfit_logo_footer.png') }}"
                         alt="SitFit Logo"
                     class="sf-footer-logo">
                 </a>

                <p class="sf-footer-text">
                    SitFit brings together comfort, quality, and
                    modern design to help you create spaces you'll
                    love every day.
                </p>

                <div class="sf-footer-social">
                    <a href="https://www.facebook.com/share/1E6quPtUUE/"
                       target="_blank"
                       aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="https://www.instagram.com/sitfit.__?igsh=MWVtd2VwNWhmaWJocg=="
                       target="_blank"
                       aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="https://www.tiktok.com/@sit.fit.__?_r=1&_t=ZS-98PvMp28Ix3"
                       target="_blank"
                       aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>

            </div>

            <!-- Column 2: Company -->
            <div class="sf-footer-col">
                <h3 class="sf-footer-title">Company</h3>

                <ul class="sf-footer-links">
                    <li><a href="{{ route('home') }}#solution-section">About</a></li>
                    <li><a href="{{ route('team.index') }}">Team</a></li>
                    <li><a href="{{route('contact.index')}}">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Support -->
            <div class="sf-footer-col">
                <h3 class="sf-footer-title">Support</h3>

                <ul class="sf-footer-links">
                    <li><a href="{{ route('home') }}#faq-section">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact -->
            <div class="sf-footer-col">
                <h3 class="sf-footer-title">Contact</h3>

                <ul class="sf-footer-contact">
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:support@sitfit.com">
                            support@sitfit.com
                        </a>
                    </li>

                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+18005557483">
                            +1 (800) 555-SITFIT
                        </a>
                    </li>

                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>
                            100 Health Tech Way, Suite 400
                        </span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright -->
        <div class="sf-footer-bottom">
            <p>&copy; 2026 SitFit. All Rights Reserved.</p>
        </div>

    </div>
</footer>