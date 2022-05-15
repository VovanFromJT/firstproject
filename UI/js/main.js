$(document).ready(function(){
    $(this).change(function(){
        let kindOfSort = $("#kindOfSort").val();
        let sizeOfArray = $("#sizeOfArray").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {kindOfSort, sizeOfArray}
        });
    });
});