jQuery(document).ready(function ($) {
  // Wrap for menu items
  $(".header__nav > li:not(:last-child) > a").html(function () {
    var text = $(this).text().split(" ");
    var last = text.pop();
    return text.join(" ") + (text.length > 0 ? " <br>" + last : last);
  });

  $(".header__nav > li.dropdown:not(:last-child) > a").html(function () {
    var text = $(this).text().split(" ");
    var last = text.pop();
    return (
      text.join(" ") +
      (text.length > 0
        ? '<span class="header__arrow"></span><br>' + last + ""
        : last)
    );
  });

  // Disable box-shadow before separator section
  $(".separator").prev("section").css("box-shadow", "none");

  // Homepage infinity click
  var firstMemberWrapper = $(
      ".solutions__member--first .solutions__member-item"
    ),
    secondMemberWrapper = $(
      ".solutions__member--second .solutions__member-item"
    );

  firstMemberWrapper.html(
    $(".solutions__member-item[data-number=" + 1 + "]").html()
  );
  secondMemberWrapper.html(
    $(".solutions__member-item[data-number=" + 2 + "]").html()
  );

  $(document).on("click", ".solutions__team-arrow--left", function () {
    var memberItem = $(".solutions__member-stack .solutions__member-item"),
      firstMemberItem = $(".solutions__member-item.first"),
      secondMemberItem = $(".solutions__member-item.second");

    if (memberItem.length > 1) {
      memberItem.removeClass("first").removeClass("second");
      if (firstMemberItem.prev().length === 0) {
        memberItem.last().addClass("first");
      } else {
        firstMemberItem.prev().addClass("first");
      }
      firstMemberWrapper.html($(".solutions__member-item.first").html());

      if (secondMemberItem.prev().length === 0) {
        memberItem.last().addClass("second");
      } else {
        secondMemberItem.prev().addClass("second");
      }
      secondMemberWrapper.html($(".solutions__member-item.second").html());
    }
  });

  $(document).on("click", ".solutions__team-arrow--right", function () {
    var memberItem = $(".solutions__member-stack .solutions__member-item"),
      firstMemberItem = $(".solutions__member-item.first"),
      secondMemberItem = $(".solutions__member-item.second");

    if (memberItem.length > 1) {
      memberItem.removeClass("first").removeClass("second");

      if (firstMemberItem.next().length === 0) {
        memberItem.first().addClass("first");
      } else {
        firstMemberItem.next().addClass("first");
      }
      firstMemberWrapper.html($(".solutions__member-item.first").html());

      if (secondMemberItem.next().length === 0) {
        memberItem.first().addClass("second");
      } else {
        secondMemberItem.next().addClass("second");
      }
      secondMemberWrapper.html($(".solutions__member-item.second").html());
    }
  });

  const teamList = document.querySelectorAll(".team__list");

  for (let i = 0; i < teamList.length; i++) {
    const teamItems = teamList[i].querySelectorAll(".team__item");
    let n = 1;
    for (let i = 0; i < teamItems.length; i++) {
      let teamItem = teamItems[i];
      if (window.matchMedia("(max-width: 991px)").matches) {
        if (n % 3 === 0) {
          teamItem.addEventListener("click", addClickThird);
        } else {
          teamItem.addEventListener("click", addClick);
        }
      } else {
        if (n % 3 === 0) {
          teamItem.addEventListener("mouseover", mouseOverThird);
          teamItem.addEventListener("mouseout", mouseOutThird);
        } else {
          teamItem.addEventListener("mouseover", mouseOver);
          teamItem.addEventListener("mouseout", mouseOut);
        }
      }

      n += 1;
    }
  }

  const closeAllSibling = (el) => {
    let node = el.parentNode.firstChild;

    while (node) {
      if (
        node !== el &&
        node.nodeType === Node.ELEMENT_NODE &&
        node.classList.contains("col-lg-8")
      ) {
        node.classList.remove("col-lg-8");
        node.classList.add("col-lg-4");
        if (node.previousSibling) node.previousSibling.style.display = "block";
        if (node.nextSibling) node.nextSibling.style.display = "block";
      }
      node = node.nextElementSibling || node.nextSibling;
    }
  };

  const rolloverTrigger = (el, bind) => {
    if (bind.classList.contains("col-lg-4")) {
      bind.classList.remove("col-lg-4");
      bind.classList.add("col-lg-8");
      if (window.matchMedia("(min-width: 992px)").matches && el) {
        el.style.display = "none";
      }
    } else if (bind.classList.contains("col-lg-8")) {
      bind.classList.remove("col-lg-8");
      bind.classList.add("col-lg-4");
      if (window.matchMedia("(min-width: 992px)").matches && el) {
        el.style.display = "block";
      }
    }
  };

  function addClickThird(e) {
    let prevEl = e.currentTarget.previousElementSibling;
    closeAllSibling(this);
    rolloverTrigger(prevEl, this);
  }

  function addClick(e) {
    let nextEl = e.currentTarget.nextElementSibling;
    closeAllSibling(this);
    rolloverTrigger(nextEl, this);
  }

  function mouseOverThird(e) {
    let prevEl = e.currentTarget.previousElementSibling;
    closeAllSibling(this);

    if (this.classList.contains("col-lg-4")) {
      this.classList.remove("col-lg-4");
      this.classList.add("col-lg-8");
      if (window.matchMedia("(min-width: 992px)").matches && prevEl) {
        prevEl.style.display = "none";
      }
    }
  }

  function mouseOver(e) {
    let nextEl = e.currentTarget.nextElementSibling;
    closeAllSibling(this);

    if (this.classList.contains("col-lg-4")) {
      this.classList.remove("col-lg-4");
      this.classList.add("col-lg-8");
      if (window.matchMedia("(min-width: 992px)").matches && nextEl) {
        nextEl.style.display = "none";
      }
    }
  }

  function mouseOutThird(e) {
    let prevEl = e.currentTarget.previousElementSibling;

    if (this.classList.contains("col-lg-8")) {
      this.classList.remove("col-lg-8");
      this.classList.add("col-lg-4");
      if (window.matchMedia("(min-width: 992px)").matches && prevEl) {
        prevEl.style.display = "block";
      }
    }
  }

  function mouseOut(e) {
    let nextEl = e.currentTarget.nextElementSibling;

    if (this.classList.contains("col-lg-8")) {
      this.classList.remove("col-lg-8");
      this.classList.add("col-lg-4");
      if (window.matchMedia("(min-width: 992px)").matches && nextEl) {
        nextEl.style.display = "block";
      }
    }
  }

  // Get Started anchor for mobile
  function checkPosition() {
    var contactSection = $("section.inner-contact");
    var contactImage = $(".inner-contact__image");
    if (window.matchMedia("(max-width: 600px)").matches) {
      contactImage.attr("id", "get-started");
    } else {
      contactSection.attr("id", "get-started");
    }
  }

  checkPosition();

  // Close dropdown after click on link
  $(".dropdown-menu a.dropdown-item").click(function () {
    $("#navbarNavDropdown").removeClass("show");
  });

  const subForm = document.querySelector(".subscription__form");

  if (subForm) {
    const bg = subForm.getAttribute("data-bg");

    let subInput = document.querySelector(
      '.subscription__form input[type="email"]'
    );

    if (subInput) {
      subInput.style.background = bg;
    }
  }
});
