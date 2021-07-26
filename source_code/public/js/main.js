function barDisappear() {
    document.getElementById("sidebar").style.margin = "0rem 0rem 0rem -25rem";
}

function barAppear() {
    document.getElementById("sidebar").style.margin = "0rem 0rem 0rem 0rem";
}
$(document).ready(function() {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#nav-tab a[href="' + activeTab + '"]').tab('show');
    }

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

});