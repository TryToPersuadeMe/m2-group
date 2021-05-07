class responsiveHeader {
  constructor(props) {
    this.navigation = document.querySelector(props.navigation);
    this.burgerIcon = document.querySelector("." + props.burgerIcon);
    this.htmlBody = document.querySelector("body");
    this.BurgerClick();
    this.WindowClick();
  }
  openState() {
    this.navigation.classList.add("active");
    this.burgerIcon.classList.add("active");
    this.htmlBody.classList.add("body-overlay");
  }
  closeState() {
    this.navigation.classList.remove("active");
    this.burgerIcon.classList.remove("active");
    this.htmlBody.classList.remove("body-overlay");
  }
  BurgerClick() {
    this.burgerIcon.addEventListener("click", () => {
      if (!event.currentTarget.classList.contains("active")) {
        this.openState();
      } else {
        this.closeState();
      }
    });
  }
  WindowClick() {
    document.addEventListener("click", () => {
      if (event.target.classList.contains("body-overlay")) {
        this.closeState();
      }
    });
  }
}

const headerBurgerMenu = new responsiveHeader({
  navigation: "header",
  burgerIcon: "burgerIcon",
});

const hideContent = () => {
  const $wrapperAll = document.querySelector(".after__h");
  const $wrapperContent = document.querySelector(".bpfaq");
  const $closeIcon = document.querySelector(".md-close");
  document.addEventListener("click", () => {
    if ($wrapperAll.querySelector(".md-show")) {
      $wrapperContent.classList.add("hideContent");
      document.body.style.overflow = "hidden";
    }
    if (event.target.classList.contains("md-close")) {
      $wrapperContent.classList.remove("hideContent");
      document.body.style.overflow = "auto";
    }
  });
  document.addEventListener("mousedown", () => {
    if (event.target.classList.contains("md-close")) {
      $wrapperContent.classList.remove("hideContent");
      document.body.style.overflow = "auto";
    }
  });
};

hideContent();
