require('./bootstrap');

$("#search").autocomplete({
    source: function (request, response) {
        $.ajax({
            url: '/api/search/' + request.term,
            dataType: "json",
            success: function (data) {
                response($.map(data, (item) => {
                    return { label: item.name, value: item.name }
                }));
            }
        });
    },
    minLength: 2,
    select: function (event, ui) {
        let value = ui.item.value.normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .replace(', ', '-')
            .toLowerCase();
        window.location.href = '/' + value;
    }
});