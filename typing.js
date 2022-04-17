function write(txt) {
    document.getElementById("title").innerHTML = ""
    var i = 0;
    var writeSpeed = 100;
    var delayTime = 1000;
    var deleteSpeed = 35;
    nextLetter();
    function nextLetter() {
        if (i < txt.length) {
            document.getElementById("title").innerHTML += txt.charAt(i);
            i++;
            setTimeout(nextLetter, writeSpeed);
        }
        else {
            setTimeout(deleteLetter, delayTime);
        }
    }
    function deleteLetter() {
        if (i > 0) {
            i--;
            document.getElementById("title").innerHTML = document.getElementById("title").innerHTML.substring(0,document.getElementById("title").innerHTML.length-1);
            setTimeout(deleteLetter, deleteSpeed);
        }
    }
}