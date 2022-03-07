$(document).on('click','.update',function(e) {
    var id=$(this).attr("data-id");
    var title=$(this).attr("data-title");
    var barcode=$(this).attr("data-barcode");
    var edition=$(this).attr("data-edition");
    var volume=$(this).attr("data-volume");
    var author=$(this).attr("data-author");
    var publisher=$(this).attr("data-publisher");
    var b_class=$(this).attr("data-b_class");
    var pages=$(this).attr("data-pages");
    var date_received=$(this).attr("data-date_received");
    var year=$(this).attr("data-year");
    var cash=$(this).attr("data-cash_price");
    var sof=$(this).attr("data-sof");
    var remarks=$(this).attr("data-remarks");
    var duration=$(this).attr("data-duration");
    var grade_level=$(this).attr("data-grade_level");
    var subject=$(this).attr("data-subject");
    var copyright=$(this).attr("data-copyright");
    var course=$(this).attr("data-course");
    $('#id').val(id);
    $('#title').val(title);
    $('#barcode').val(barcode);
    $('#edition').val(edition);
    $('#volume').val(volume);
    $('#author').val(author);
    $('#publisher').val(publisher);
    $('#class').val(b_class);
    $('#pages').val(pages);
    $('#date_received').val(date_received);
    $('#year').val(year);
    $('#cash_price').val(cash);
    $('#sof').val(sof);
    $('#remarks').val(remarks);
    $('#duration').val(duration);
    $('#grade_level').val(grade_level);
    $('#subject').val(subject);
    $('#copyright').val(copyright);
    $('#course').val(course);
});
//for Book
$(document).on('click','.editBook',function(e) {
    var id=$(this).attr("data-id");
    var barcode=$(this).attr("data-barcode");
    var title=$(this).attr("data-title");
    var edition=$(this).attr("data-edition");
    var volume=$(this).attr("data-volume");
    var author=$(this).attr("data-author");
    var publisher=$(this).attr("data-publisher");
    var b_class=$(this).attr("data-b_class");
    var pages=$(this).attr("data-pages");
    var date_received=$(this).attr("data-date_received");
    var year=$(this).attr("data-year");
    var cash=$(this).attr("data-cash_price");
    var sof=$(this).attr("data-sof");
    var remarks=$(this).attr("data-remarks");
    $('#id').val(id);
    $('#barcode').val(barcode);
    $('#title').val(title);
    $('#edition').val(edition);
    $('#volume').val(volume);
    $('#author').val(author);
    $('#publisher').val(publisher);
    $('#class').val(b_class);
    $('#pages').val(pages);
    $('#date_received').val(date_received);
    $('#year').val(year);
    $('#cash_price').val(cash);
    $('#sof').val(sof);
    $('#remarks').val(remarks);
});
$(document).on('click','.deleteBook',function(e) {
    var barcode=$(this).attr("data-db_barcode");
    var title=$(this).attr("data-db_title");
    $('#db_barcode').val(barcode);
    $('#db_title').val(title);
    $("#db_title").html(title);
});


//for Audio-Visual
$(document).on('click','.deleteAudioVisual',function(e) {
    var barcode=$(this).attr("data-da_barcode");
    var title=$(this).attr("data-da_title");
    $('#da_barcode').val(barcode);
    $('#da_title').val(title);
    $("#da_title").html(title);
});
//for Government Publication
$(document).on('click','.updatePublication',function(e) {
    var id=$(this).attr("data-id");
    var barcode=$(this).attr("data-barcode");
    var title=$(this).attr("data-title");
    var volume=$(this).attr("data-volume");
    var copy=$(this).attr("data-copy");
    var date_received=$(this).attr("data-date_received");
    var issn=$(this).attr("data-issn");
    var subject=$(this).attr("data-subject");
    $('#id').val(id);
    $('#barcode').val(barcode);
    $('#title').val(title);
    $('#volume').val(volume);
    $('#copy').val(copy);
    $('#date_received').val(date_received);
    $('#issn').val(issn);
    $('#subject').val(subject);
});
$(document).on('click','.deletePublication',function(e) {
    var barcode=$(this).attr("data-dp_barcode");
    var title=$(this).attr("data-dp_title");
    $('#dp_barcode').val(barcode);
    $('#dp_title').val(title);
    $("#dp_title").html(title);
});

//for manuscript
$(document).on('click','.editManuscript',function(e) {
    var id=$(this).attr("data-id");
    var title=$(this).attr("data-title");
    var barcode=$(this).attr("data-barcode");
    var author=$(this).attr("data-author");
    var course=$(this).attr("data-course");
    var year=$(this).attr("data-year");
    $('#id').val(id);
    $('#barcode').val(barcode);
    $('#title').val(title);
    $('#author').val(author);
    $('#course').val(course);
    $('#year').val(year);
});
$(document).on('click','.deleteManuscript',function(e) {
    var barcode=$(this).attr("data-dm_barcode");
    var title=$(this).attr("data-dm_title");
    $('#dm_barcode').val(barcode);
    $('#dm_title').val(title);
    $("#dm_title").html(title);
});
//for Thesis/Dissertation
$(document).on('click','.editThesis',function(e) {
    var id=$(this).attr("data-id");
    var title=$(this).attr("data-title");
    var barcode=$(this).attr("data-barcode");
    var author=$(this).attr("data-author");
    var year=$(this).attr("data-year");
    $('#id').val(id);
    $('#barcode').val(barcode);
    $('#title').val(title);
    $('#author').val(author);
    $('#year').val(year);
});
$(document).on('click','.deleteThesis',function(e) {
    var barcode=$(this).attr("data-th_barcode");
    var title=$(this).attr("data-th_title");
    $('#th_barcode').val(barcode);
    $('#th_title').val(title);
    $("#th_title").html(title);
});
//for Journals
$(document).on('click','.updateJournal',function(e) {
    var id=$(this).attr("data-id");
    var barcode=$(this).attr("data-barcode");
    var title=$(this).attr("data-title");
    var volume=$(this).attr("data-volume");
    var copy=$(this).attr("data-copy");
    var date_received=$(this).attr("data-date_received");
    var issn=$(this).attr("data-issn");
    var subject=$(this).attr("data-subject");
    $('#id').val(id);
    $('#barcode').val(barcode);
    $('#title').val(title);
    $('#volume').val(volume);
    $('#copy').val(copy);
    $('#date_received').val(date_received);
    $('#issn').val(issn);
    $('#subject').val(subject);
});
$(document).on('click','.deleteJournal',function(e) {
    var barcode=$(this).attr("data-jl_barcode");
    var title=$(this).attr("data-jl_title");
    $('#jl_barcode').val(barcode);
    $('#jl_title').val(title);
    $("#jl_title").html(title);
});