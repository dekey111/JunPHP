$(document).ready(function () {
    $('#copyText').click(function (e) {
        e.preventDefault();
        var copyText = document.getElementById("cutLinkInput");
        copyText.select();
        document.execCommand("copy");
        alert("Текст: " + copyText.value + " скопирован!");
    });
});

$(document).ready(function () {
    $('#cutLinkSubmit').click(function (e) {
        e.preventDefault();

        var userLink = document.forms.cutLinkForm.cutLinkInput.value;
        userLink = encodeURIComponent(userLink);

        var XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
        var xhr = new XHR();
        xhr.open("GET", "form.php?cutLinkInput=" + userLink, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.forms.cutLinkForm.cutLinkInput.value = xhr.responseText;
            }
        };        
        xhr.send("cutLinkInput=" + userLink);
    });
});