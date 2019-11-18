//title:Demo code for CRM validation

$(function () {
    'use strict';

    $('.custom-select2').select2();
    $('.client-select2').select2();

    $('.datepicker').datepicker({
        startDate: "11/05/2011",
        endDate: "11/05/2100"
    });
    $('.monthpicker').datepicker({
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });
    $(document).ready(function () {
        $('#leaveapply input').on('change', function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var duration = $('input[name=type]:checked', '#leaveapply').attr('data-value');
            if (duration == 'Half') {
                $('#enddate').hide();
                $('#hourlyFix').text('Date');
                $('#hourAmount').show();
            } else if (duration == 'Full') {
                $('#enddate').hide();
                $('#hourAmount').hide();
                $('#hourlyFix').text('Start date');
            } else if (duration == 'More') {
                $('#enddate').show();
                $('#hourAmount').hide();
            }
        });
    });
    $("#addClient").validate({
        rules: {
            companyname: {
                required: true
            },
            username: {
                required: true
            },
            country: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            contact: {
                required: true
            },
            website: {
                url: true
            }
        }
    });
    $("#addProject").validate({
        rules: {
            protitle: {
                required: true,
                range: [2, 80]
            },
            client: {
                required: true
            },
            summery: {
                required: true
            },
            startdate: {
                required: true,
                email: true
            },
            enddate: {
                required: true
            },
            details: {
                url: true
            }
        }
    });
    $("#addTask").validate({
        rules: {
            title: {
                required: true,
                range: [2, 100]
            },
            project: {
                required: true
            },
            member: {
                required: true
            },
            details: {
                required: true,
                range: [50, 1200]
            },
            status: {
                required: true
            }
        }
    });
    $("#leaveapply").validate();
    $("#tickets").validate();
});
