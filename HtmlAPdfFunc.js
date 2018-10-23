function CrearPdf()
{
    var head = document.getElementsByTagName('head')[0].outerHTML;
    var docPlan = '<body>' + document.getElementById('DocPlan').outerHTML + '</body>';
    var plan = encodeURIComponent(head + document.getElementById('SeccionC').outerHTML);
    //var plan = encodeURIComponent(head + docPlan);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "HtmlAPdfFunc.php", true);
    xmlhttp.send("plan=" + plan);
}
