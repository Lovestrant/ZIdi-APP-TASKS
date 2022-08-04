function clearClipboardContent() {

}

//Use Javascript to copy to clipboard
function setClipboardContent($myInput) {
    //Passed parameter is the field Id to copy text from
    var copyText = document.getElementById($myInput);
    copyText.select()
    document.execCommand('copy');
    console.log("Copied");

    }

function getClipboardContent() {

}