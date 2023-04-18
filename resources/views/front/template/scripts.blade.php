{{-- @section('scripts') --}}
<script>
    (function($) {
        $.fn.picZoomer = function(options) {
            var opts = $.extend({}, $.fn.picZoomer.defaults, options),
                $this = this,
                $picBD = $('<div class="picZoomer-pic-wp"></div>').css({
                    'width': opts.picWidth + 'px',
                    'height': opts.picHeight + 'px'
                }).appendTo($this),
                $pic = $this.children('img').addClass('picZoomer-pic').appendTo($picBD),
                $cursor = $('<div class="picZoomer-cursor"><i class="f-is picZoomCursor-ico"></i></div>')
                .appendTo($picBD),
                cursorSizeHalf = {
                    w: $cursor.width() / 2,
                    h: $cursor.height() / 2
                },
                $zoomWP = $(
                    '<div class="picZoomer-zoom-wp"><img src="" alt="" class="picZoomer-zoom-pic"></div>')
                .appendTo($this),
                $zoomPic = $zoomWP.find('.picZoomer-zoom-pic'),
                picBDOffset = {
                    x: $picBD.offset().left,
                    y: $picBD.offset().top
                };


            opts.zoomWidth = opts.zoomWidth || opts.picWidth;
            opts.zoomHeight = opts.zoomHeight || opts.picHeight;
            var zoomWPSizeHalf = {
                w: opts.zoomWidth / 2,
                h: opts.zoomHeight / 2
            };

            //初始化zoom容器大小
            $zoomWP.css({
                'width': opts.zoomWidth + 'px',
                'height': opts.zoomHeight + 'px'
            });
            $zoomWP.css(opts.zoomerPosition || {
                top: 0,
                left: opts.picWidth + 30 + 'px'
            });
            //初始化zoom图片大小
            $zoomPic.css({
                'width': opts.picWidth * opts.scale + 'px',
                'height': opts.picHeight * opts.scale + 'px'
            });

            //初始化事件
            $picBD.on('mouseenter', function(event) {
                $cursor.show();
                $zoomWP.show();
                $zoomPic.attr('src', $pic.attr('src'))
            }).on('mouseleave', function(event) {
                $cursor.hide();
                $zoomWP.hide();
            }).on('mousemove', function(event) {
                var x = event.pageX - picBDOffset.x,
                    y = event.pageY - picBDOffset.y;

                $cursor.css({
                    'left': x - cursorSizeHalf.w + 'px',
                    'top': y - cursorSizeHalf.h + 'px'
                });
                $zoomPic.css({
                    'left': -(x * opts.scale - zoomWPSizeHalf.w) + 'px',
                    'top': -(y * opts.scale - zoomWPSizeHalf.h) + 'px'
                });

            });
            return $this;

        };
        $.fn.picZoomer.defaults = {
            picHeight: 460,
            scale: 2.5,
            zoomerPosition: {
                top: '0',
                left: '380px'
            },

            zoomWidth: 400,
            zoomHeight: 460
        };
    })(jQuery);



    $(document).ready(function() {
        $('.picZoomer').picZoomer();
        $('.piclist li').on('click', function(event) {
            var $pic = $(this).find('img');
            $('.picZoomer-pic').attr('src', $pic.attr('src'));
        });

        var owl = $('#recent_post');
        owl.owlCarousel({
            margin: 20,
            dots: false,
            nav: true,
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                },
                1200: {
                    items: 4
                }
            }
        });

        $('.decrease_').click(function() {
            decreaseValue(this);
        });
        $('.increase_').click(function() {
            increaseValue(this);
        });
        $('.decrease_R').click(function() {
            decreaseValueR(this);
        });
        $('.increase_R').click(function() {
            increaseValueR(this);
        });

        function increaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $(_this).siblings('input#number').val(value);
        }

        function decreaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $(_this).siblings('input#number').val(value);
        }

        function increaseValueR(_this) {
            var value = parseInt($(_this).siblings('input#rent_duration').val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $(_this).siblings('input#rent_duration').val(value);
        }

        function decreaseValueR(_this) {
            var value = parseInt($(_this).siblings('input#rent_duration').val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $(_this).siblings('input#rent_duration').val(value);
        }



        //addtocart


    });
</script>
<script type="text/javascript">
    window.cart = <?php echo json_encode($cart); ?>;

    // updateCartButton();

    $(document).on('click', '.add-to-cart', function(event) {

        // var cart = window.cart || [];
        var cart = [];
        // console.log(cart);
        // cart.push({
        //     'id': $(this).data('id'),
        //     // 'name': $(this).data('name'),
        //     // 'rent_price': $(this).data('price'),
        //     // 'slug': $(this).data('slug'),
        //     // 'image': $(this).data('image'),
        //     // 'category': $(this).data('category'),
        //     'quantity': $('#number').val(),
        //     // 'rent_duration': $('#rent_duration').val()
        // });
        // console.log(cart)
        window.cart = cart;
        // console.log(cart.quantity)

        $.ajax(`/add-to-cart`, {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $(this).data('id'),
                'quantity': $('#number').val(),
                'rent_duration': $('#rent_duration').val()

            },
            success: function(data, status, xhr) {
                // alert(data.status);
                console.log(data.cart)
                alertMessages(data.status)
            }
        });

    });

    $(".update-cart").change(function(e) {

        e.preventDefault();



        var ele = $(this);



        $.ajax({

            url: '{{ route('update.cart') }}',

            method: "patch",

            data: {

                _token: '{{ csrf_token() }}',

                id: ele.parents("tr").attr("data-id"),

                quantity: ele.parents("tr").find(".quantity").val()

            },

            success: function(response, data, status) {

                //    window.location.reload();
                alertMessages(data.status);

            }

        });

    });



    $(".remove-from-cart").click(function(e) {

        e.preventDefault();



        var ele = $(this);


        // console.log($(this).data('slug'))
        if (confirm("Are you sure want to remove?")) {

            $.ajax({

                url: '{{ route('remove.from.cart') }}',

                method: "DELETE",

                data: {
                    _token: '{{ csrf_token() }}',
                    'id': $(this).data('id'),
                    'quantity': $(this).data('quantity'),
                    'slug': $(this).data('slug'),
                },

                success: function(data, status, xhr) {

                    // window.location.reload();

                    alertMessages(data.status);
                    console.log(data.cart)

                },
                error: function(error) {

                }

            });

        }

    });

    function timeout() {
        window.setTimeout(function() {
            $(".alertCartR").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    }

    function alertMessages(messages) {
        $('#alertCart').append(
            `<div class="alert alert-success alert-dismissible fade show alertCartR mt-5" role="alert" id="#alertCartR" style="margin-top: 100px; z-index: 1000"><strong> ${messages} </strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></div>`
        )
        $('#alertCart').focus();
        $('html, body').animate({
            scrollTop: $('#alertCart').offset().top
        }, 300);
        timeout();
    }
</script>
