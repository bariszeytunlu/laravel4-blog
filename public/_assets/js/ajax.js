    $('#categoryForm').on("submit",function(){
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = {};

        that.find('[name]').each(function(index, value){
            var that = $(this),
                name = that.attr('name'),
                value = that.val();

            data[name] = value;
        });

        $.ajax({
            url: url,
            type: type,
            data: data,
            error: function (data) {


                $(".errors").empty().append('<div class="alert alert-danger">Teknik bir sorun oluştu</div>');
                console.log(data);
            },
            success: function(response) {

                console.log(response);
                // hata dönerse ekrana bastır
                if (typeof response.errors === 'object') {


                    $(".errors").empty().append('<div class="alert alert-warning">'+response.errors+'</div>');

                } else {
                    // cevap hata olarak dönmez ise yeni kategori eklenir
                    // Yeni Kategoriyi Ekle
                    $(".errors").empty();
                    $(".panel-items").append(response);

                    // Input Value Resetle
                    $("input[name='categoryName']").val("");

                }

            }

        });
        return false;
    });
