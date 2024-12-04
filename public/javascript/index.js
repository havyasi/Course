document.querySelectorAll('.faq-title').forEach(button => {
    button.addEventListener('click', () => {
        const faqContent = button.nextElementSibling;

        // Toggle active class on button
        button.classList.toggle('active');

        // Show/Hide content
        if (faqContent.style.display === "block") {
            faqContent.style.display = "none";
        } else {
            faqContent.style.display = "block";
        }
    });
});