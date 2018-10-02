$.ajax({
    url: "/api/categories",
    type: "get",
    success: function( result ) {
        console.log(result);
        // let html = '';
        //  result.result.forEach(category => {
        //     url ="?category="+category.id;
        //     html += '<li><a href="' + url + '">'+ category.name + '</a></li>';
        // });
        // $('.navbar-nav').append(html);
    }
 });
 