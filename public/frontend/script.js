const btn = document.querySelector(".checkbtn");
const icon = document.querySelector(".fa-bars");

btn.onclick = function () {
  if (icon.classList.contains("fa-bars")) {
    icon.classList.replace("fa-bars", "fa-times");
  } else {
    icon.classList.replace("fa-times", "fa-bars");
  }
};

// retailers

$(function () {
  var Accordion = function (el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    // Variables privadas
    var links = this.el.find(".link");
    // Evento
    links.on("click", { el: this.el, multiple: this.multiple }, this.dropdown);
  };

  Accordion.prototype.dropdown = function (e) {
    var $el = e.data.el;
    ($this = $(this)), ($next = $this.next());

    $next.slideToggle();
    $this.parent().toggleClass("open");

    if (!e.data.multiple) {
      $el.find(".submenu").not($next).slideUp().parent().removeClass("open");
    }
  };

  var accordion = new Accordion($("#accordion"), false);
});

// pop-up-shape
var modal = document.querySelector(".side_modal");
var trigger = document.querySelector(".trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
  modal.classList.toggle("side_show-modal");
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

$(".nav_ul a").click(function () {
  let target = $(this).attr("href"),
    offsetTop = $(target).offset().top - 50;
  if (target == "#home") offsetTop = 0;
  $([document.documentElement, document.body]).animate(
    { scrollTop: offsetTop },
    300
  );
});

// scroll animation
$(window).scroll(function () {
  //Fade-in
  $(".fade-in").each(function () {
    if (isScrolledIntoView($(this))) {
      $(this).css({
        opacity: 1,
        visibility: "visible",
      });
    } else {
      $(this).css({
        opacity: 0,
        visibility: "hidden",
      });
    }

    //Fade-in-right
    $(".fade-in-right").each(function () {
      var point = "0px",
        side = "50px";

      if (isScrolledIntoView($(this))) {
        $(this).css({
          opacity: 1,
          visibility: "visible",
          "-webkit-transform": "translateX(" + point + ")",
          transform: "translateX(" + point + ")",
        });
      } else {
        $(this).css({
          opacity: 0,
          visibility: "hidden",
          "-webkit-transform": "translateX(" + side + ")",
          transform: "translateX(" + side + ")",
        });
      }
    });

    //Fade-in-left
    $(".fade-in-left").each(function () {
      var point = "0px",
        move = "-50px";

      if (isScrolledIntoView($(this))) {
        $(this).css({
          opacity: 1,
          visibility: "visible",
          "-webkit-transform": "translateX(" + point + ")",
          transform: "translateX(" + point + ")",
        });
      } else {
        $(this).css({
          opacity: 0,
          visibility: "hidden",
          "-webkit-transform": "translateX(" + move + ")",
          transform: "translateX(" + move + ")",
        });
      }
    });
  });
});

function isScrolledIntoView(elem) {
  var $elem = $(elem);
  var $window = $(window);

  var docViewTop = $window.scrollTop();
  var docViewBottom = docViewTop + $window.height();

  var elemTop = $elem.offset().top;
  var elemBottom = elemTop + $elem.height();

  return elemBottom <= docViewBottom && elemTop >= docViewTop;
}
