window.addEventListener("DOMContentLoaded", () => {

    $.ajax({		
        type: "GET",
        url: "https://grupocruvinel.com.br/feed-insta.php"
    }).done(function(data){

        const feed = document.getElementById("feedInsta");
        feed.innerHTML = data;

        setTimeout(() => {
            $(".swiper-insta").slick({
                autoplay: true,
                autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 4,
                pauseOnHover: false,
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