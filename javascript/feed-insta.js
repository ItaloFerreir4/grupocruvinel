window.addEventListener("DOMContentLoaded", () => {

    $.ajax({		
        type: "GET",
        url: "https://italoferreiracode.com.br/fabiomunra/feed-insta.php"
    }).done(function(data){

        const feed = document.getElementById("feedInsta");
        feed.innerHTML = data;

        setTimeout(() => {
            $(".swiper-insta").slick({
                infinite: true,
                slidesToShow: 2,
                responsive: [
                {
                    breakpoint: 992,
                    settings: {
                    slidesToShow: 1,
                    },
                },
                ],
            });
        }, 200);

    });

});