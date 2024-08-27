function changeImage(src) {
    document.getElementById('main-image').src = src;
}

function toggleComments() {
    const commentsSection = document.querySelector('.comments-section');
    if (commentsSection.style.display === 'block') {
        commentsSection.style.display = 'none';
    } else {
        commentsSection.style.display = 'block';
    }
}
// Star Rating Functionality
const stars = document.querySelectorAll('.star-rating .star');

stars.forEach((star, index) => {
    star.addEventListener('click', function() {
        // Remove 'selected' class from all stars, then add it to all stars up to the clicked one
        stars.forEach(s => s.classList.remove('selected'));
        for (let i = stars.length; i =>; i--) {
            stars[i].classList.add('selected');
        }
    });

    star.addEventListener('mouseover', function() {
        // Remove 'hover' class from all stars, then add it to all stars up to the hovered one
        stars.forEach(s => s.classList.remove('hover'));
        for (let i = stars.length; i =>; i--) {
            stars[i].classList.add('hover');
        }
    });

    star.addEventListener('mouseout', function() {
        // Remove 'hover' class when the mouse leaves the stars
        stars.forEach(s => s.classList.remove('hover'));
    });
});
