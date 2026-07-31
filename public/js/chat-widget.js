document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.chat-btn');
    const box = document.querySelector('.chat-box');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatBody = document.getElementById('chat-body');

    // Toggle Chat Window
    btn.addEventListener('click', () => {
        box.classList.toggle('active');
    });

    // Handle Form Submit
    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault(); // يمنع الـ Page Refresh

        const userMessage = chatInput.value.trim();
        if (!userMessage) return;

        // 1. عرض رسالة المستخدم في الـ Chat
        appendMessage(userMessage, 'user-message');
        chatInput.value = '';

        // 2. عرض مؤشر جاري التحميل (Loading...)
        const loadingDiv = appendMessage('Typing...', 'bot-message loading');

        try {
            // 3. إرسال الطلب لـ Laravel Controller
            const response = await fetch("{{ route('chat.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ message: userMessage })
            });

            const data = await response.json();

            // مسح كلمة Typing...
            loadingDiv.remove();

            if (response.ok) {
                // عرض رد الـ AI (تأكد من اسم الـ key المرتجع من الـ API مثلاً data.message)
                const botReply = data.message || data.response || 'No response received.';
                appendMessage(botReply, 'bot-message');
            } else {
                appendMessage('Sorry, something went wrong. Please try again.', 'bot-message error');
            }

        } catch (error) {
            loadingDiv.remove();
            appendMessage('Network error. Failed to connect.', 'bot-message error');
            console.error('Error:', error);
        }
    });

    // Function لتسهيل إضافة الرسائل للـ Chat Scroll
    function appendMessage(text, className) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `message ${className}`;
        msgDiv.innerHTML = `<p>${text}</p>`;
        chatBody.appendChild(msgDiv);
        
        // Auto Scroll لأحدث رسالة تحت
        chatBody.scrollTop = chatBody.scrollHeight;
        return msgDiv;
    }
});