$(document).ready(function(){
    $("#sort").click(function(){
        let kindOfSort = $("#kindOfSort").val();
        let sizeOfArray = $("#sizeOfArray").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {kindOfSort, sizeOfArray}
        });
    });

    $("#file").click(function(){
        let kindOfSort = $("#kindOfSort").val();
        let sizeOfArray = $("#sizeOfArray").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {kindOfSort, sizeOfArray}
        });
    });

    $("#db").click(function(){
        let kindOfSort = $("#kindOfSort").val();
        let sizeOfArray = $("#sizeOfArray").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            data: {kindOfSort, sizeOfArray}
        });
    });
});