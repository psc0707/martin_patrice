$(document).ready(function() {
    if (localStorage.getItem('category')) {
        $("#category option").eq(localStorage.getItem('category')).prop('selected', true);
    }

    $("#category").on('change', function() {
        localStorage.setItem('category', $('option:selected', this).index());
    });
});

$(document).ready(function(){
    $('#newCategory input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../ajax/backend-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents("#newCategory").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});