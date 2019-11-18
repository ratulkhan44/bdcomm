$(function () {
    "use strict";

    $(document).ready(function () {
        var form = $("#vertical-wizard").show();
        form
            .steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                stepsOrientation: "vertical",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Allways allow previous action even if the current form is not valid!
                    if (currentIndex > newIndex) {
                        return true;
                    }
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        form.find(".body:eq(" + newIndex + ") label.error").remove();
                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                    }
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    if (currentIndex === 2 && priorIndex === 3) {
                        form.steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex) {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    swal({
                        title: "success!",
                        text: "Congratulations!",
                        icon: "success"
                    });
                }
            })
            .validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
    });

    $(document).ready(function () {
        var form = $("#horizontal-wizard").show();
        form
            .steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                stepsOrientation: "horizontal",
                onStepChanging: function (event, currentIndex, newIndex) {
                    // Allways allow previous action even if the current form is not valid!
                    if (currentIndex > newIndex) {
                        return true;
                    }
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        form.find(".body:eq(" + newIndex + ") label.error").remove();
                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                    }
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex) {
                    if (currentIndex === 2 && priorIndex === 3) {
                        form.steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex) {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex) {
                    swal({
                        title: "success!",
                        text: "Congratulations!",
                        icon: "success"
                    });
                }
            })
            .validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#passwordtwo"
                    }
                }
            });
    });
});
