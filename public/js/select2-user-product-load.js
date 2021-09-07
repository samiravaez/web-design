var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

    $( "#invalid_users,#valid_users" ).select2({

        ajax: {
            url: config.routes.load_users,
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    _token: CSRF_TOKEN,
                    search: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }

    });

    $("#invalid_products,#valid_products").select2({

        ajax: {
            url: config.routes.load_products,
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    _token: CSRF_TOKEN,
                    search: params.term
                };
            },
            processResults: function (response) {
                return {
                    results: response
                };
            },
            cache: true
        }

    });


    var that = $("#valid_users option:selected").val();

    if (that === undefined){
        $('#invalid_users').prop('disabled',false);
    }
    else if(that !== ""){
        $('#invalid_users').prop('disabled','disabled');
    }

    //
    var that2 = $("#invalid_users option:selected").val();

    if (that2 === undefined){
        $('#valid_users').prop('disabled',false);
    }
    else if(that2 !== ""){
        $('#valid_users').prop('disabled','disabled');
    }

    //
    var that3 = $("#valid_products option:selected").val();

    if (that3 === undefined){
        $('#invalid_products').prop('disabled',false);
    }
    else if(that3 !== ""){
        $('#invalid_products').prop('disabled','disabled');
    }

    var that4 = $("#invalid_products option:selected").val();

    if (that4 === undefined){
        $('#valid_products').prop('disabled',false);
    }
    else if(that4 !== ""){
        $('#valid_products').prop('disabled','disabled');
    }


    //onChange methods
    $('#valid_users').on('change', function() {
        var that = $("#valid_users option:selected").val();

        if (that === undefined){
            $('#invalid_users').prop('disabled',false);
        }
        else if(that !== ""){
            $('#invalid_users').prop('disabled','disabled');
        }

    });
    $('#invalid_users').on('change', function() {
        var that = $("#invalid_users option:selected").val();

        if (that === undefined){
            $('#valid_users').prop('disabled',false);
        }
        else if(that !== ""){
            $('#valid_users').prop('disabled','disabled');
        }

    });

    $('#valid_products').on('change', function() {
        var that = $("#valid_products option:selected").val();

        if (that === undefined){
            $('#invalid_products').prop('disabled',false);
        }
        else if(that !== ""){
            $('#invalid_products').prop('disabled','disabled');
        }

    });
    $('#invalid_products').on('change', function() {
        var that = $("#invalid_products option:selected").val();

        if (that === undefined){
            $('#valid_products').prop('disabled',false);
        }
        else if(that !== ""){
            $('#valid_products').prop('disabled','disabled');
        }

    });

    // $("#invalid_users").change(function(){
    // var inp1 = document.getElementById("valid_users");
    // inp1.addEventListener("input", function () {
    //     document.getElementById("invalid_users").disabled = this.value !== "";
    // })});
    // var inp2 = document.getElementById("invalid_users");
    // inp2.addEventListener("input", function () {
    //     document.getElementById("valid_users").disabled = this.val() !== "";
    // });
    // var inp3 = document.getElementById("valid_products");
    // inp3.addEventListener("input", function () {
    //     document.getElementById("invalid_products").disabled = this.value !== "";
    // });
    // var inp4 = document.getElementById("invalid_products");
    // inp4.addEventListener("input", function () {
    //     document.getElementById("valid_products").disabled = this.value !== "";
    // });

});