// Seleziona gli elementi dal DOM
const chatbotIconWrapper = document.getElementById('chatbot-icon-wrapper');
const chatbot = document.getElementById('chatbot');
const chatbotClose = document.getElementById('chatbot-close');

// Apre la maschera del chatbot e nasconde l'icona
chatbotIconWrapper.addEventListener('click', function () {
	chatbot.style.display = 'flex'; // Mostra la maschera
	chatbotIconWrapper.style.display = 'none'; // Nasconde l'icona
});

// Chiude la maschera del chatbot e mostra di nuovo l'icona
chatbotClose.addEventListener('click', function () {
	chatbot.style.display = 'none'; // Nasconde la maschera
	chatbotIconWrapper.style.display = 'flex'; // Mostra l'icona
});
