function toggleComments() {
    const commentsSection = document.querySelector('.comments-section');
    if (commentsSection.style.display === 'block') {
        commentsSection.style.display = 'none';
    } else {
        commentsSection.style.display = 'block';
    }
}