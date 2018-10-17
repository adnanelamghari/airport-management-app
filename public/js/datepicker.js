$(document).ready(function () {

    $('#profil-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#info-profil-panel').show("fast");
        $('#mdps-panel').hide();
        $('#mail-panel').hide();
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').hide();
        $('#social-media-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#social-media-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#social-media-panel').show("fast");
        $('#info-profil-panel').hide();
        $('#mdps-panel').hide();
        $('#mail-panel').hide();
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#diplome-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#diplome-panel').show("fast");
        $('#social-media-panel').hide();
        $('#info-profil-panel').hide();
        $('#mdps-panel').hide();
        $('#mail-panel').hide();
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').hide();
    });

    $('#mdps-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#info-profil-panel').hide();
        $('#mdps-panel').show("fast");
        $('#mail-panel').hide();
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').hide();
        $('#social-media-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#tele-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#info-profil-panel').hide();
        $('#mdps-panel').hide();
        $('#mail-panel').show("fast");
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').hide();
        $('#social-media-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#biographie-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#info-profil-panel').hide();
        $('#mdps-panel').hide();
        $('#mail-panel').hide();
        $('#biographie-panel').show("fast");
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').hide();
        $('#social-media-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#parametre-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#info-profil-panel').hide();
        $('#mdps-panel').hide();
        $('#mail-panel').hide();
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').hide();
        $('#confidentialite-panel').show("fast");
        $('#social-media-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#parametres-generale-button').click(function () {
        $('.active').removeClass("active");
        $(this).addClass("active");
        $('#info-profil-panel').hide();
        $('#mdps-panel').hide();
        $('#mail-panel').hide();
        $('#biographie-panel').hide();
        $('#parametres-generale-panel').show("fast");
        $('#confidentialite-panel').hide();
        $('#social-media-panel').hide();
        $('#diplome-panel').hide();
    });

    $('#button-desactivation').click(function () {
        $('#input-desactivation').val('true');
    });

    $('#dateRangePicker')
        .datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            startDate: '01/01/2010',
            endDate: '12/30/2020'
        })
        .on('changeDate', function (e) {
            // Revalidate the date field
            $('#dateRangeForm').formValidation('revalidateField', 'date');
        });

    $('#dateRangeForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'fa fa-ok',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
            date: {
                validators: {
                    date: {
                        format: 'DD/MM/YYYY',
                        min: '01/01/1990',
                        max: '30/12/2900',
                        message: 'Cette date est invalide'
                    }
                }
            }
        }
    });
});


