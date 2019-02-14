/**
 * Created by Kanak on 2/8/16.
 */

'use strict';
//  Author: ThemeREX.com
//  forms-wizard.html scripts
//

(function($) {

    $(document).ready(function() {

        "use strict";


        // Form Wizard
        var form = $("#custom-form-wizard");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children(".wizard").steps({
            headerTag: ".wizard-section-title",
            bodyTag: ".wizard-section",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                event.preventDefault();
                // Employee info
                var photo = document.getElementById('photo_upload');
                var first_name = $('#first_name').val();
                var middle_name = $('#middle_name').val();
                var last_name = $('#last_name').val();
                var role = $('#role').val();
                var gender = $('#gender:checked').val();
                var date_of_birth = $('#date_of_birth').val();
                var date_of_joining = $('#date_of_joining').val();
                var primary_phone = $('#primary_phone').val();
                var secondary_phone = $('#secondary_phone').val();
                var work_email = $('#work_email').val();
                var personal_email = $('#personal_email').val();
                var current_address = $('#current_address').val();
                var permanent_address = $('#permanent_address').val();
                // Work info
                var qualification = $('.qualification_select').val();
                if (qualification == 'Other') {
                    qualification = $('.qualification_text').val();
                }
                var code = $('#code').val();
                var status = $('#status').val();
                var job_title = $('#job_title').val();
                var department = $('#department').val();
                var salary = $('#salary').val();
                // Contact person
                var contact_person = $('#contact_person').val();
                var contact_person_relationship = $('#contact_person_relationship').val();
                var contact_person_phone = $('#contact_person_phone').val();
                var contact_person_alt_phone = $('#contact_person_alt_phone').val();
                // Government IDs
                var sss_number = $('#sss_number').val();
                var pagibig_number = $('#pagibig_number').val();
                var tin_number = $('#tin_number').val();
                var philhealth_number = $('#philhealth_number').val();
                var health_insurance_number = $('#health_insurance_number').val();
                var token = $('#token').val();

                // Define form data
                var formData = new FormData();

                if (photo.value != '') {
                    formData.append('photo', photo.files[0], photo.value);
                }
                formData.append('first_name', first_name);
                formData.append('middle_name', middle_name);
                formData.append('last_name', last_name);
                formData.append('role', role);
                formData.append('gender', gender);
                formData.append('date_of_birth', date_of_birth);
                formData.append('date_of_joining', date_of_joining);
                formData.append('primary_phone', primary_phone);
                formData.append('secondary_phone', secondary_phone);
                formData.append('work_email', work_email);
                formData.append('personal_email', personal_email);
                formData.append('current_address', current_address);
                formData.append('permanent_address', permanent_address);

                formData.append('qualification', qualification);
                formData.append('code', code);
                formData.append('status', status);
                formData.append('job_title', job_title);
                formData.append('department', department);
                formData.append('salary', salary);

                formData.append('contact_person', contact_person);
                formData.append('contact_person_relationship', contact_person_relationship);
                formData.append('contact_person_phone', contact_person_phone);
                formData.append('contact_person_alt_phone', contact_person_alt_phone);

                formData.append('sss_number', sss_number);
                formData.append('pagibig_number', pagibig_number);
                formData.append('tin_number', tin_number);
                formData.append('philhealth_number', philhealth_number);
                formData.append('health_insurance_number', health_insurance_number);
                formData.append('_token', token);

                var url = $('#url').val();
                /*$.ajax({
                        type: 'POST',
                        url: '/'+ url,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            //var parsed = JSON.parse(data);
                            //$('#modal-header').attr('class', 'modal-header '+parsed.class);
                            //$('.modal-title').append(parsed.title);
                            //$('.modal-body').append(parsed.message);
                            //$('#notification-modal').modal('show');
                        }
                });*/

            }
        });

        // Init Wizard
        var formWizard = $('.wizard');
        var formSteps = formWizard.find('.steps');

        $('.wizard-options .holder-style').on('click', function(e) {
            e.preventDefault();

            var stepStyle = $(this).data('steps-style');

            var stepRight = $('.holder-style[data-steps-style="steps-right"]');
            var stepLeft = $('.holder-style[data-steps-style="steps-left"]');
            var stepJustified = $('.holder-style[data-steps-style="steps-justified"]');

            if (stepStyle === "steps-left") {
                stepRight.removeClass('holder-active');
                stepJustified.removeClass('holder-active');
                formWizard.removeClass('steps-right steps-justified');
            }
            if (stepStyle === "steps-right") {
                stepLeft.removeClass('holder-active');
                stepJustified.removeClass('holder-active');
                formWizard.removeClass('steps-left steps-justified');
            }
            if (stepStyle === "steps-justified") {
                stepLeft.removeClass('holder-active');
                stepRight.removeClass('holder-active');
                formWizard.removeClass('steps-left steps-right');
            }

            if ($(this).hasClass('holder-active')) {
                formWizard.removeClass(stepStyle);
            } else {
                formWizard.addClass(stepStyle);
            }

            $(this).toggleClass('holder-active');
        });
    });

})(jQuery);
