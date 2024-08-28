function filterPCs() {
    const budgetFilter = document.getElementById('budget').value;
    const specsFilter = document.getElementById('specs').value;
    const pcItems = document.querySelectorAll('.pc-item');

    pcItems.forEach(item => {
        const itemBudget = item.getAttribute('data-budget');
        const itemSpecs = item.getAttribute('data-specs');
        
        if ((budgetFilter === 'all' || budgetFilter === itemBudget) &&
            (specsFilter === 'all' || specsFilter === itemSpecs)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
