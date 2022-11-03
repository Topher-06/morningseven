"use strict";
! function () {

    var paymentValidator = true;
    const e = $(".select2"),
        a = $(".selectpicker"),
        i = document.querySelector("#wizard-validation");
    if (i, null !== i) {
        var downpayment;
        const n = i.querySelector("#wizard-validation-form"),
            r = n.querySelector("#booking-details-validation");
        var t = n.querySelector("#personal-info-validation"),
            o = n.querySelector("#payment-info-validation");
        var z = n.querySelector("#book-now-validation"),
            vn = n.querySelector("#confirmation-validation");
        var ko = n.querySelector("#calendar-validation");
        const s = [].slice.call(n.querySelectorAll(".btn-next")),
            l = [].slice.call(n.querySelectorAll(".btn-prev")),
            d = new Stepper(i, {
                linear: !0
            }),
            mh = FormValidation.formValidation(ko, {
                fields: {
                    address: {
                        validators: {
                            notEmpty: {
                                message: "The address is required"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "The email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    specialValidation: {
                        validators: {
                            notEmpty: {
                                message: "The special request is required"
                            }
                        }
                    },
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: "The first name is required"
                            }
                        }
                    },
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: "The last name is required"
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: "The country is required"
                            }
                        }
                    },
                    number: {
                        validators: {
                            notEmpty: {
                                message: "The contact number is required"
                            }
                        }
                    }

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-sm-6"
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () {
                d.next();
            }),
            g = FormValidation.formValidation(z, {
                fields: {
                    address: {
                        validators: {
                            notEmpty: {
                                message: "The Address is required"
                            }
                        }
                    },
                    specialValidation: {
                        validators: {
                            notEmpty: {
                                message: "The Address is required"
                            }
                        }
                    },
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: "The first name is required"
                            }
                        }
                    },
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: "The last name is required"
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: "The Country is required"
                            }
                        }
                    },
                    number: {
                        validators: {
                            notEmpty: {
                                message: "The Languages is required"
                            }
                        }
                    }

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-sm-6"
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () {
                d.next();
            }),
            m = FormValidation.formValidation(r, {
                fields: {
                    checkIn: {
                        validators: {
                            notEmpty: {
                                message: "The date is required"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "The Email is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    formValidationPass: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    },
                    formValidationConfirmPass: {
                        validators: {
                            notEmpty: {
                                message: "The Confirm Password is required"
                            },
                            identical: {
                                compare: function () {
                                    return r.querySelector('[name="formValidationPass"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-sm-6"
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                },
                init: e => {
                    e.on("plugins.message.placed", function (e) {
                        e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement)
                    })
                }
            }).on("core.form.valid", function () {

                $('#swiper-with-arrows').addClass('d-none');
                $('#showRoomDesc').removeClass('d-none');

                d.next();

            }),
            u = FormValidation.formValidation(t, {
                fields: {
                    address: {
                        validators: {
                            notEmpty: {
                                message: "The address is required"
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "The email address is required"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                    specialValidation: {
                        validators: {
                            notEmpty: {
                                message: "The special request is required"
                            }
                        }
                    },
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: "The first name is required"
                            }
                        }
                    },
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: "The last name is required"
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: "The country is required"
                            }
                        }
                    },
                    number: {
                        validators: {
                            notEmpty: {
                                message: "The contact number is required"
                            }
                        }
                    }

                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-sm-6"
                    }),
                    autoFocus: new FormValidation.plugins.AutoFocus,
                    submitButton: new FormValidation.plugins.SubmitButton
                }
            }).on("core.form.valid", function () {
                const id = $('#setIdRoom').val()
                var checkInHrs = $("#formValidationCheckIn :selected").val();
                var date = $("#checkIn").val();
                // $("#dateInsert").text(date);
                var add_person = $("#add_person :selected").val();
                var senior = $('#senior :selected').val();
                var getTypeRoom = $("#getTypeRoom").text();



                // $.post("/get-price-downpayment", {
                //         id: id,
                //         checkInHrs: checkInHrs,
                //         add_person: add_person,
                //         senior: senior
                //     },
                //     function (data, status) {

                //         var obj = jQuery.parseJSON(data);
                //         $("#paymentAmount").val(obj.downpayment)
                //         $('#hours').text($("#formValidationCheckIn :selected").text());
                //         $('#costOrigin').text(obj.originalPrice)
                //         $('#addPersonSum').text($("#add_person :selected").val());
                //         $('#addPersonPrice').text(obj.addPersonPrice);



                //         $("#vat").text("₱ " + obj.vat);
                //         $("#totalPaymentCustomer").text("₱ " + obj.downpayment);

                //         $("#taxTotalInsert").text("₱ " + obj.vat)
                //         $("#totalDownpaymentInsert").text("₱ " + obj.downpayment);



                //         // $("#tbodyContentTr").remove();

                //         // $("#tbodyInsert").prev().append("<tr id='tbodyContentTr'><td class='text-nowrap'>" + getTypeRoom + "</td><td>₱" + obj.originalPrice + "</td><td>1</td><td>₱" + obj.originalPrice + "</td></tr>");


                //         downpayment = obj.downpayment;

                

            // });
            d.next();
    }),
f = FormValidation.formValidation(o, {
        fields: {
            paymentFirstname: {
                validators: {
                    notEmpty: {
                        message: "The first name is required"
                    }
                }
            },
            paymentLastname: {
                validators: {
                    notEmpty: {
                        message: "The last name is required"
                    }
                }
            },
            paymentAmount: {
                validators: {
                    notEmpty: {
                        message: "The amount is required"
                    },
                }
            },
            paymentReference: {
                validators: {
                    notEmpty: {
                        message: "The Reference number URL is required"
                    }
                }
            },
            paymentPop: {
                validators: {
                    notEmpty: {
                        message: "The Proof of payment is required"
                    }
                }
            },

        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                eleValidClass: "",
                rowSelector: ".col-sm-6"
            }),
            autoFocus: new FormValidation.plugins.AutoFocus,
            submitButton: new FormValidation.plugins.SubmitButton
        }
    }).on("core.form.valid", function () {
        if (paymentValidator == true) {
            d.next();
        }


    }),
    c = (a.length && a.each(function () {
        $(this).selectpicker().on("change", function () {
            u.revalidateField("formValidationLanguage")
        })
    }), e.length && e.each(function () {
        var e = $(this);
        e.wrap('<div class="position-relative"></div>'), e.select2({
            placeholder: "Select an country",
            dropdownParent: e.parent()
        }).on("change.select2", function () {
            u.revalidateField("formValidationCountry")
        })
    }), FormValidation.formValidation(vn, {
        fields: {
            paymentFirstname: {
                validators: {
                    notEmpty: {
                        message: "The sender first name is required"
                    }
                }
            },
            paymentLastname: {
                validators: {
                    notEmpty: {
                        message: "The sender last name is required"
                    }
                }
            },
            paymentAmount: {
                validators: {
                    notEmpty: {
                        message: "The amount is required"
                    }
                }
            },
            paymentReference: {
                validators: {
                    notEmpty: {
                        message: "The reference number is required"
                    }
                }
            },
            paymentPop: {
                validators: {
                    notEmpty: {
                        message: "The proof of payment is required"
                    }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                eleValidClass: "",
                rowSelector: ".col-sm-6"
            }),
            autoFocus: new FormValidation.plugins.AutoFocus,
            submitButton: new FormValidation.plugins.SubmitButton
        }
    }).on("core.form.valid", function () {
        // $("#wizard-validation-form").submit()
    }));


s.forEach(e => {
    e.addEventListener("click", e => {
        switch (d._currentIndex) {
            case 0:
                mh.validate();
                break;
            case 1:
                g.validate()
                break;
            case 2:
                m.validate();
                break;
            case 3:
                u.validate();
                break;
            case 4:
                f.validate()
                break;
            case 5:
                c.validate()


        }
    })
}), l.forEach(e => {
    e.addEventListener("click", e => {
        switch (d._currentIndex) {
            case 6:
            case 5:
            case 4:
            case 3:
            case 2:
            case 1:
                d.previous()
        }
    })
})
}

function getDownpaymentAmount() {


}

d.next();

$("#paymentAmount").on('input', function () {
    if ($("#paymentAmount").val() >= downpayment) {
        $("#errorPaymentAmount").next().text("");
        paymentValidator = true;
        // d.next();
    } else {
        $("#errorPaymentAmount").next().text("The amount is less than downpayment required");
        paymentValidator = false;
    }
})
}();