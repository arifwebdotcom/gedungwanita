$(function() {
    var e = $(".select2"),
        t = $(".selectpicker");
    t.length && (t.selectpicker(), handleBootstrapSelectEvents()), e.length && e.each(function() {
        var e = $(this);
        select2Focus(e), e.select2({
            placeholder: "Select value",
            dropdownParent: e.parent()
        })
    })
}), (() => {
    var e = document.querySelector(".wizard-numbered"),
        l = [].slice.call(e.querySelectorAll(".btn-next")),
        r = [].slice.call(e.querySelectorAll(".btn-prev")),
        c = e.querySelector(".btn-submit");
    if (null !== e) {
        let t = new Stepper(e, {
            linear: !1
        });
        l && l.forEach(e => {
            e.addEventListener("click", e => {
                t.next()
            })
        }), r && r.forEach(e => {
            e.addEventListener("click", e => {
                t.previous()
            })
        }), c && c.addEventListener("click", e => {
            e.preventDefault(); // cegah reload halaman

            let formData = $("#form-member").serializeArray(); // ambil semua input
            let dataObj = {};

            $.each(formData, function (i, field) {
                if (field.name === "harapanortu") {
                if (!dataObj[field.name]) {
                    dataObj[field.name] = [];
                }
                dataObj[field.name].push(field.value);
                } else {
                dataObj[field.name] = field.value;
                }
            });

            // ubah array harapanortu jadi string koma
            if (Array.isArray(dataObj.harapanortu)) {
                dataObj.harapanortu = dataObj.harapanortu.join(",");
            }

            $.ajax({
                url: base_url+"member/save-member", // endpoint CI4
                type: "POST",
                data: dataObj,
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                            $("#result").html("<p style='color:green;'>" + response.message + "</p>");
                            toastr.success(response.messages,"Sukses");
                            location.reload();
                            $("#form-member")[0].reset(); // reset form
                        } else {                       
                            $("#error").show();
                            let errorHtml = "<ul style='color:red;'>";
                                $.each(response.errors, function (key, value) {
                                errorHtml += "<li>" + value + "</li>";
                                });
                                errorHtml += "</ul>"+
                                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                $("#error").html(errorHtml);
                        }
                },
                error: function (xhr) {
                    
                    console.log(xhr.responseText);
                }
            });
        })
    }    
})(); // This is just a sample script. Paste your real code (javascript or HTML) here.

if ('this_is' == /an_example/) {
    of_beautifier();
} else {
    var a = b ? (c % d) : e[f];
}