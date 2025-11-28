<!-- AI Financial Advisor Chatbot Widget -->
<div id="ai-chatbot-widget">
    <!-- Floating Chat Button -->
    <button id="chatbot-toggle" class="chatbot-toggle" aria-label="Toggle AI Financial Advisor">
        <svg class="chatbot-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <svg class="close-icon hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <span class="pulse-ring"></span>
    </button>

    <!-- Chat Window -->
    <div id="chatbot-window" class="chatbot-window hidden">
        <!-- Header -->
        <div class="chatbot-header">
            <div class="flex items-center">
                <div class="chatbot-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div>
                    <h3 class="chatbot-title">Karen (AI financial advisor)</h3>
                    <p class="chatbot-status">
                        <span class="status-dot"></span>
                        Online
                    </p>
                </div>
            </div>
        </div>

        <!-- Messages Container -->
        <div id="chatbot-messages" class="chatbot-messages">
            <!-- Welcome Message -->
            <div class="message ai-message">
                <div class="message-avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div class="message-content">
                    <p>Hello! I'm Karen, your AI financial advisor. I can help you with budgeting, spending analysis, and financial planning based on your transaction data. How can I assist you today?</p>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="chatbot-input-area">
            <form id="chatbot-form">
                <input 
                    type="text" 
                    id="chatbot-input" 
                    class="chatbot-input" 
                    placeholder="Ask me about your finances..."
                    autocomplete="off"
                    maxlength="1000"
                />
                <button type="submit" class="chatbot-send-btn" aria-label="Send message">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
/* AI Chatbot Widget Styles */
#ai-chatbot-widget {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

/* Toggle Button */
.chatbot-toggle {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
}

.chatbot-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
}

.chatbot-toggle:active {
    transform: scale(0.95);
}

.chatbot-icon,
.close-icon {
    width: 28px;
    height: 28px;
    color: white;
    transition: all 0.3s ease;
}

.pulse-ring {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 3px solid #667eea;
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    opacity: 0.6;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 0.6;
    }
    50% {
        transform: scale(1.2);
        opacity: 0;
    }
}

/* Chat Window */
.chatbot-window {
    position: absolute;
    bottom: 80px;
    right: 0;
    width: 380px;
    height: 550px;
    background: rgba(255, 255, 255, 0.98);
    backdrop-filter: blur(20px);
    border-radius: 16px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transform-origin: bottom right;
    animation: slideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.chatbot-window.hidden {
    display: none;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: scale(0.8) translateY(20px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* Header */
.chatbot-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 20px;
    border-radius: 16px 16px 0 0;
}

.chatbot-avatar {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
}

.chatbot-avatar svg {
    width: 24px;
    height: 24px;
}

.chatbot-title {
    font-size: 16px;
    font-weight: 600;
    margin: 0;
}

.chatbot-status {
    font-size: 12px;
    margin: 2px 0 0 0;
    opacity: 0.9;
    display: flex;
    align-items: center;
}

.status-dot {
    width: 6px;
    height: 6px;
    background: #4ade80;
    border-radius: 50%;
    margin-right: 6px;
    animation: blink 2s ease-in-out infinite;
}

@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Messages */
.chatbot-messages {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    background: #f9fafb;
}

.chatbot-messages::-webkit-scrollbar {
    width: 6px;
}

.chatbot-messages::-webkit-scrollbar-track {
    background: transparent;
}

.chatbot-messages::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 3px;
}

.message {
    display: flex;
    margin-bottom: 16px;
    animation: messageSlide 0.3s ease-out;
}

@keyframes messageSlide {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    margin-right: 10px;
}

.ai-message .message-avatar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.ai-message .message-avatar svg {
    width: 18px;
    height: 18px;
}

.user-message {
    flex-direction: row-reverse;
}

.user-message .message-avatar {
    background: #e5e7eb;
    color: #6b7280;
    margin-right: 0;
    margin-left: 10px;
}

.user-message .message-avatar svg {
    width: 18px;
    height: 18px;
}

.message-content {
    max-width: 75%;
    padding: 12px 16px;
    border-radius: 12px;
    font-size: 14px;
    line-height: 1.5;
}

.ai-message .message-content {
    background: white;
    color: #1f2937;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.user-message .message-content {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.message-content p {
    margin: 0;
}

/* Loading Animation */
.loading-message .message-content {
    padding: 16px;
}

.typing-indicator {
    display: flex;
    gap: 4px;
}

.typing-indicator span {
    width: 8px;
    height: 8px;
    background: #9ca3af;
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.typing-indicator span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-indicator span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
    }
    30% {
        transform: translateY(-10px);
    }
}

/* Input Area */
.chatbot-input-area {
    padding: 16px;
    background: white;
    border-top: 1px solid #e5e7eb;
}

#chatbot-form {
    display: flex;
    gap: 8px;
}

.chatbot-input {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 24px;
    font-size: 14px;
    outline: none;
    transition: all 0.2s;
}

.chatbot-input:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.chatbot-send-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s;
}

.chatbot-send-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
}

.chatbot-send-btn:active {
    transform: scale(0.95);
}

.chatbot-send-btn svg {
    width: 20px;
    height: 20px;
    color: white;
}

.chatbot-send-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.hidden {
    display: none !important;
}

/* Responsive */
@media (max-width: 480px) {
    #ai-chatbot-widget {
        bottom: 16px;
        right: 16px;
    }
    
    .chatbot-window {
        width: calc(100vw - 32px);
        height: calc(100vh - 120px);
        bottom: 76px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('chatbot-toggle');
    const window = document.getElementById('chatbot-window');
    const chatbotIcon = toggle.querySelector('.chatbot-icon');
    const closeIcon = toggle.querySelector('.close-icon');
    const form = document.getElementById('chatbot-form');
    const input = document.getElementById('chatbot-input');
    const messagesContainer = document.getElementById('chatbot-messages');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    let isOpen = false;

    // Toggle chat window
    toggle.addEventListener('click', function() {
        isOpen = !isOpen;
        window.classList.toggle('hidden');
        chatbotIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        
        if (isOpen) {
            input.focus();
        }
    });

    // Handle form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const message = input.value.trim();
        if (!message) return;

        // Add user message to chat
        addMessage(message, 'user');
        input.value = '';

        // Show loading indicator
        const loadingId = addLoadingMessage();

        try {
            // Send message to backend
            const response = await fetch('/api/ai-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();

            // Remove loading indicator
            removeLoadingMessage(loadingId);

            if (data.success) {
                // Add AI response
                addMessage(data.message, 'ai');
            } else {
                addMessage('Sorry, I encountered an error. Please try again.', 'ai');
            }
        } catch (error) {
            console.error('Chat error:', error);
            removeLoadingMessage(loadingId);
            addMessage('Sorry, I\'m having trouble connecting. Please try again later.', 'ai');
        }
    });

    // Add message to chat
    function addMessage(text, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}-message`;
        
        const avatarDiv = document.createElement('div');
        avatarDiv.className = 'message-avatar';
        
        if (type === 'ai') {
            avatarDiv.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>';
        } else {
            avatarDiv.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>';
        }
        
        const contentDiv = document.createElement('div');
        contentDiv.className = 'message-content';
        contentDiv.innerHTML = `<p>${escapeHtml(text)}</p>`;
        
        messageDiv.appendChild(avatarDiv);
        messageDiv.appendChild(contentDiv);
        messagesContainer.appendChild(messageDiv);
        
        // Scroll to bottom
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Add loading message
    function addLoadingMessage() {
        const loadingId = 'loading-' + Date.now();
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message ai-message loading-message';
        messageDiv.id = loadingId;
        
        messageDiv.innerHTML = `
            <div class="message-avatar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
            </div>
            <div class="message-content">
                <div class="typing-indicator">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        `;
        
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        return loadingId;
    }

    // Remove loading message
    function removeLoadingMessage(loadingId) {
        const loadingMessage = document.getElementById(loadingId);
        if (loadingMessage) {
            loadingMessage.remove();
        }
    }

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
});
</script>
