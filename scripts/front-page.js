jQuery(function () {
  var messages = document.querySelectorAll(".message");
  var prevText = "rohan menon";

  function changeText(text) {
    if (text === prevText) {
      return;
    }

    prevText = text;
    title.querySelector(".text-wrapper .letters").textContent = text;
    animateLetters();
  }

  // var overlap = messages[0].offsetHeight / 1.2;
  var overlap = 600;
  console.log(overlap);

  // watch for a scroll
  window.addEventListener("scroll", function () {
    // see which message is active
    for (var i = 0; i < messages.length; i++) {
      var message = messages[i];
      var messageHeight = message.offsetHeight;
      var messageTop = message.offsetTop;
      var messageBottom = messageTop + messageHeight;

      var isInView =
        messageBottom >= window.scrollY + overlap &&
        messageTop < window.scrollY + overlap;

      if (isInView) {
        message.classList.add("active");
        changeText(message.getAttribute("text"));
      } else {
        message.classList.remove("active");
      }
    }
  });
});
