import $ from "jquery";
$("#search-user").on("keyup", function () {
    const searchTerm = $("#search-user").val();
    const url = window.location.origin;

    if (searchTerm == "") {
        $("#memListUsers").html("");
        $("#result-user").hide();
    } else {
        $.ajax({
            type: "GET",
            data: {
                search: searchTerm,
            },
            url: `${url}/dashboard/users/search`,
            success(response) {
                if (!response.error && response !== "") {
                    $("#memListUsers").empty().html(response);
                    $("#result-user").show();
                }
            },
        });
    }
});

$("#search-customer").on("keyup", function () {
    const searchTerm = $("#search-customer").val();
    const url = window.location.origin;

    if (searchTerm == "") {
        $("#memListCustomers").html("");
        $("#result-customer").hide();
    } else {
        $.ajax({
            type: "GET",
            data: {
                search: searchTerm,
            },
            url: `${url}/dashboard/customers/search`,
            success(response) {
                if (!response.error && response !== "") {
                    $("#memListCustomers").empty().html(response);
                    $("#result-customer").show();
                }
            },
        });
    }
});
$.fn.outerHTML = function () {
    return $("<div />").append(this.eq(0).clone()).html();
};
$("tr td .btn-delete").on("click", function (event) {
    const _self = event.target;
    _self.parentElement.parentElement.remove();
});
const detailRow = $(`#import-detail .detail-row`).first();
const selectInit = $(`#import-detail .detail-row select`).first();
const allOptions = $(`#import-detail .detail-row select option`).toArray();
const updateOptionList = () => {
    const selects = $(`#import-detail .detail-row select`).toArray();
    const selectedOpt = selects.map((e, index) => $(e).val());
    selects.forEach((select, index) => {
        const valShouldRemove = selectedOpt.filter((v, i) => i != index);
        const options = $(select).find("option").toArray();
        allOptions.forEach((opt) => {
            if (!valShouldRemove.includes($(opt).attr("value"))) {
                let exist = false;
                options.forEach((opt2) => {
                    if ($(opt2).attr("value") == $(opt).attr("value")) {
                        exist = true;
                    }
                });
                if (!exist) $(select).append($(opt).outerHTML());
            } else {
                options.forEach((opt2) => {
                    if ($(opt2).attr("value") == $(opt).attr("value")) {
                        $(opt2).remove();
                    }
                });
            }
        });
    });
};
selectInit.on("change", updateOptionList);
$(".btn-add-import-detail").on("click", function (event) {
    const clone = detailRow.clone();

    const detailRows = $(`#import-detail .detail-row`).toArray();
    const selectedOptions = [];
    detailRows.forEach((row) => {
        const selectedOtp = $(row).find(`select`).val();
        selectedOptions.push(selectedOtp);
    });
    if (allOptions.length == selectedOptions.length) {
        alert('"No category left !"');
        return;
    }
    const newSelectOpts = clone.find("select option").toArray();
    newSelectOpts.forEach((opt, index) => {
        if (selectedOptions.includes($(opt).attr("value"))) {
            $(opt).remove();
        }
    });
    clone
        .on("click", function (event) {
            const _self = event.target;
            const classList = $(_self).attr("class").split(/\s+/);
            if (classList.includes("btn-delete")) {
                _self.parentElement.parentElement.remove();
            }
            updateOptionList();
        })
        .insertBefore(".detail-add");
    updateOptionList();
});

const userSelect = $("#create-import #user").first();

userSelect.on("change", function (e) {
    const userId = userSelect.val();
    console.log(userId);
    // TODO:  call ajax to get user info and change inputs
});
