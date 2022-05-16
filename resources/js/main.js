$(document).ready(function(){
    $(this).click(function(){
        let kindOfSort = $("#kindOfSort").val();
        let sizeOfArray = $("#sizeOfArray").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {kindOfSort, sizeOfArray}
        });
    });
});