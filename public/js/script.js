$(function() {
    if (localStorage.getItem('category')) {
        $("#category option").eq(localStorage.getItem('category')).prop('selected', true);
    }

    $("#category").on('change', function() {
        localStorage.setItem('category', $('option:selected', this).index());
    });
    
});
