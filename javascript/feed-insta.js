window.addEventListener("DOMContentLoaded", () => {

    $.ajax({		
        type: "GET",
        url: "https://italoferreiracode.com.br/grupocruvinel/feed-insta.php"
    }).done(function(data){

        const feed = document.getElementById("feedInsta");
        feed.innerHTML = data;

        setTimeout(() => {
            $(".swiper-insta").slick({
                infinite: true,
                slidesToShow: 4,
                autoplay: true,
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