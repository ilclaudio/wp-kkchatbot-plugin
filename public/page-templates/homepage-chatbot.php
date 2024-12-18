<?php
/* Template Name: Brevetti
 *
 * @package WP_KKChatBot_Plugin
 */
?>

<!-- ChatBot ICON -->
	<div id="chatbot-icon-wrapper">
	<img src="<?php echo KKC_PLUGIN_DIR_URL; ?>/assets/img/chatbot-icon.webp"
		alt="Chatbot Icon" id="chatbot-icon">
</div>


<!-- ChatBot Interface -->
<div id="chatbot">
	<div id="chatbot-header">
			<img src="<?php echo KKC_PLUGIN_DIR_URL; ?>/assets/img/chatbot-icon.webp"
				alt="Chatbot Icon" id="chatbot-header-icon">
			<span id="chatbot-close">&times;</span>
	</div>
	<div id="chatbot-content">
			<p>Send a message.</p>
	</div>
	<div id="chatbot-footer">
			<input type="text" placeholder="Send a message..." id="chatbot-input">
			<button id="chatbot-send">&gt;</button>
	</div>
</div>