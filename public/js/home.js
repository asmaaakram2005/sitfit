/**
 * =============================================
 *   SitFit — Scroll Animation Observer
 *
 *   📁 المكان: public/js/scroll-animation.js
 *   📌 طريقة الاستخدام:
 *      أضف في آخر home.blade.php قبل @endsection:
 *      <script src="{{ asset('js/scroll-animation.js') }}"></script>
 *
 *   ✅ الكلاسات في HTML
 *   ✅ الـ Styles في home.css
 *   ✅ الـ Observer هنا بس
 * =============================================
 */

document.addEventListener('DOMContentLoaded', function () {

    var observer = new IntersectionObserver(function (entries) {

        entries.forEach(function (entry) {

            if (entry.isIntersecting) {
                // العنصر ظهر في الشاشة — اظهره بعد الـ delay
                var el = entry.target;
                var delay = parseInt(el.getAttribute('data-delay') || '0');

                setTimeout(function () {
                    el.classList.add('sf-visible');
                }, delay);

            } else {
                // العنصر خرج من الشاشة — اخفيه تاني
                entry.target.classList.remove('sf-visible');
            }

        });

    }, {
        threshold: 0.12,              // يبدأ لما 12% من العنصر يظهر
        rootMargin: '0px 0px -50px 0px' // هامش سفلي يخلي الأنيميشن يبدأ بكير شوية
    });

    // راقب كل العناصر اللي عليها كلاس أنيميشن
    document.querySelectorAll('.sf-anim-left, .sf-anim-right, .sf-anim-up, .sf-anim-fade')
        .forEach(function (el) {
            observer.observe(el);
        });

});