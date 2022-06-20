/**
 * Created by baris on 10.06.2017.
 */
$(document).ready(function() {
    $(".ortanca").css({
        'width': ($(".sag").width()  + 'px')
    });
});

function popupac(divid){
    var divid = divid;
    document.getElementById("overlay").setAttribute("class",'overlayactive');
    document.getElementById(divid).setAttribute("class",'popupactive');
}
function popupkapat(divid){
    var divid = divid;
    document.getElementById("overlay").setAttribute("class",'pasive');
    document.getElementById(divid).setAttribute("class",'pasive');

}
function toplantiac() {
    document.getElementById("toplanticontainer").setAttribute("class",'active');
}
function listmodal(divid,detayid){
    var divid = divid;
    var detayid = detayid;
    document.getElementById("overlay").setAttribute("class",'overlayactive');
    document.getElementById(divid).setAttribute("class",'popupactive');
    document.getElementById("detayid").value = detayid;
}