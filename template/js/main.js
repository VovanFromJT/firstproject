$(document).ready(function(){
    $("#kindOfSort").change(function(){
        let kindOfSort = $("#kindOfSort").val();
        let sizeOfArray = $("#sizeOfArray").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {kindOfSort, sizeOfArray}
        });
    });
});