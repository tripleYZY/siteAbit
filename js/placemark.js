ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
            center: [54.7232153, 55.9483825],
            zoom: 17
        }, {
        });

    myMap.geoObjects
        .add(new ymaps.Placemark([54.7232153, 55.9483825], {
            balloonContentHeader: 'Приемная комиссия',
            balloonContentBody: "<span>Уфа, Октябрьской Революции, 3а <br> +7 (347) 272-11-16 <br> bspu.pk@mail.ru <br><br> </span>",
            balloonContentFooter: "График работы: 9:00 - 17:00 (пн-пт)"
        }, {
            preset: 'islands#icon',
            iconColor: '#183884'
        }));
}
