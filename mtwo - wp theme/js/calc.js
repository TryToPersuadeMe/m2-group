var swiper = new Swiper(".swiper-container", {
  simulateTouch: false,
  autoHeight: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  on: {
    activeIndexChange: function () {
      const $buildCalc = document.querySelector("#buildCalc");
      const $repairCalc = document.querySelector("#repairCalc");
      if ($buildCalc) calc_build();
      if ($repairCalc) calc_repair();
      swiper.allowSlideNext = false;
      this.$el[0].classList.add("blockButtonsStyles");

      if (this.slides[this.activeIndex].classList.contains("allowSlideNext")) swiper.allowSlideNext = true;
    },

    init: function () {
      this.$el[0].classList.add("blockButtonsStyles");
      this.allowSlideNext = false;
    },
  },
});

const toggleState = (item) => {
  const $el = document.querySelector(item);
  const childrens = $el.children;
  if (childrens.length) {
    $el.classList.add("active");
  } else {
    $el.classList.remove("active");
  }
};

toggleState(".promo-r");
toggleState(".promo-l");

$(".promo-r, .promo-l").on("click", ".name", function () {
  let card = this.closest(".item");
  if (card.closest(".promo-r")) {
    $(".promo-l").append(card);
  } else {
    $(".promo-r").append(card);
  }

  toggleState(".promo-r");
  toggleState(".promo-l");
});

$(document).ready(function () {
  $("#phone").mask("+7 (999) 999-99-99");
});

let dataContainer = {
  totalArea: "",
  baseArea: "",
  bathrooms: "",
  additionalServices: "",

  foundation: {
    chosedValue: "",
    cost: "",
  },

  floor: {
    chosedValue: "",
    cost: "",
  },

  technology: {
    chosedValue: "",
    cost: "",
  },
};

function calc_build() {
  /* result DOM */
  const $result_show = document.querySelector("#showResult");
  const $result_send = document.querySelector("#sendResult");
  const $result_show_noCount = document.querySelector("#noCountResult");

  /* rool for special */
  let noCount = false;

  const getValueFromInput = (inputField, result) => (dataContainer[result] = document.querySelector(inputField).value);

  /* площадь основания  */
  getValueFromInput("#baseArea", "baseArea");

  /* количество санузлов */
  getValueFromInput("#bathrooms", "bathrooms");

  /* статус участка  */
  const getStatusFromRadio = (radioForm, result) => {
    const $form = document.querySelector(radioForm);
    let chosenInputValue;

    $form.querySelectorAll("input").forEach((item) => {
      if (item.checked && item.hasAttribute("noCount")) return (noCount = true);
      if (item.checked) chosenInputValue = item.getAttribute("value");
      if (item.checked && item.getAttribute("coef")) dataContainer[result].coef = item.getAttribute("coef");
    });
    return (dataContainer[result].chosedValue = chosenInputValue);
  };

  /* фундамент  */
  getStatusFromRadio("#foundation", "foundation");

  /* технология */
  getStatusFromRadio("#technology", "technology");

  /* этажи */
  getStatusFromRadio("#floor", "floor");

  /* общая площадь */
  dataContainer.totalArea = dataContainer.baseArea * dataContainer.floor.chosedValue;

  /* стоимость  технологии */
  dataContainer.technology.cost = dataContainer.technology.chosedValue * dataContainer.totalArea;

  /* стоимость санузлов */
  dataContainer.bathrooms = 100000 * dataContainer.bathrooms;

  /* стоимость фундамента */
  if (dataContainer.foundation.chosedValue) {
    dataContainer.foundation.cost = dataContainer.foundation.chosedValue * dataContainer.totalArea;
    if (dataContainer.foundation.coef) dataContainer.foundation.cost *= dataContainer.foundation.coef;
  }

  const getStatusFromMultyBox = (form, result) => {
    const $form = document.querySelector(form).querySelectorAll("input");
    let sum = 0;

    Array.from($form).map((item) => {
      if (item.checked) sum += dataContainer.totalArea * item.getAttribute("value");
    });

    return (dataContainer[result] = sum);
  };

  getStatusFromMultyBox("#additionalServices", "additionalServices");

  /* sum */
  let finalResultCalc =
    dataContainer.technology.cost +
    Math.floor(Number(dataContainer.foundation.cost)) +
    Number(dataContainer.bathrooms) +
    Number(dataContainer.additionalServices);

  /* show result */
  if (noCount) {
    $result_show_noCount.innerText = "Итого: расчет производится индивидуально  в руб.";
    $result_send.value = "расчет производится индивидуально";
  } else {
    $result_send.value = finalResultCalc;
    $result_show.innerText = finalResultCalc;
  }
}

let repairDataContainer = {
  globalIncreaseCoef: 1,
  typeOfBuildingCoef: "",
  typeOfRepair: "",
  finalArea: "",
  area: "",
  rooms: "",
  dismantling: "",
  bathrooms: "",
  projectPlan: "",
};

function calc_repair() {
  /* result DOM */
  const $result_show = document.querySelector("#showResult_repair");
  const $result_send = document.querySelector("#sendResult_repair");

  const getValueFromInput = (inputField, result) => (repairDataContainer[result] = document.querySelector(inputField).value);
  getValueFromInput("#area", "area");
  getValueFromInput("#rooms", "rooms");
  getValueFromInput("#bathrooms", "bathrooms");

  /* статус участка  */
  const getStatusFromRadio = (radioForm, result) => {
    const $form = document.querySelector(radioForm);
    let chosenInputValue;

    $form.querySelectorAll("input").forEach((item) => {
      if (item.checked) chosenInputValue = item.getAttribute("value");
    });
    return (repairDataContainer[result] = chosenInputValue);
  };
  getStatusFromRadio("#projectPlan", "projectPlan");
  getStatusFromRadio("#typeOfBuilding", "typeOfBuildingCoef");
  getStatusFromRadio("#typeOfRepair", "typeOfRepair");
  /* Общая площадь  */
  repairDataContainer.finalArea =
    Number(repairDataContainer.area) + Number(repairDataContainer.rooms) * Number(repairDataContainer.area) * 0.1;

  /* демонтаж */
  if (document.querySelector(".dismantling").checked) {
    repairDataContainer.dismantling = Math.floor(repairDataContainer.finalArea / 33) * 10000;
  }

  /* стоимость санузлов */
  repairDataContainer.bathrooms *= 100000;

  /* стоимость проекта */
  if (repairDataContainer.projectPlan != 0) {
    repairDataContainer.projectPlan *= repairDataContainer.finalArea;
  }

  /* calc result */
  let finalResultCalc =
    repairDataContainer.finalArea *
      Number(repairDataContainer.typeOfRepair) *
      (Number(repairDataContainer.globalIncreaseCoef) + Number(repairDataContainer.typeOfBuildingCoef)) +
    Number(repairDataContainer.bathrooms);

  /* show result */
  $result_send.value = finalResultCalc;

  if (finalResultCalc) {
    $result_show.innerText = `Итого ${finalResultCalc} руб. (Данная сумма не является окончательной и подлежит обсуждению)*`;
  } else {
    $result_show.innerText = `Для расчета стоимости заполните все поля`;
  }
}

/* make allert message with increasing global coef */
if (document.querySelector("#projectPlan")) {
  const $alertWrapper = document.querySelector("#projectPlan");
  $alertWrapper.addEventListener("click", () => {
    const $repairCalc = document.querySelector("#repairCalc");
    const $projectPlan = document.querySelector("#projectPlan");
    const $input = $projectPlan.querySelector(".projectPlanNoNeedInput");

    if (event.target.checked && event.target.classList.contains("projectPlanNoNeedInput")) {
      console.log(event.target);
      $repairCalc.classList.add("attention");
      swiper.allowSlideNext = false;
      swiper.allowSlidePrev = false;
    }

    if (event.target.getAttribute("value") == "yes") {
      $repairCalc.classList.remove("attention");
      swiper.allowSlideNext = true;
      swiper.allowSlidePrev = true;
      repairDataContainer.globalIncreaseCoef = 3;
    } else if (event.target.getAttribute("value") == "no") {
      $repairCalc.classList.remove("attention");
      swiper.allowSlideNext = true;
      swiper.allowSlidePrev = true;
      $input.checked = false;
      repairDataContainer.globalIncreaseCoef = 1;
    }
  });
}

/* enter click */
document.addEventListener("keydown", (event) => {
  if (event.keyCode === 13 && !swiper.$el[0].classList.contains("blockButtonsStyles")) {
    swiper.slideNext();
    checkRulesState();
  }
});

const $swiperContainer = document.querySelector(".swiper-container");

function numberInputsRule(item) {
  item.forEach((el) => {
    el.addEventListener("input", () => {
      if (el.value.length > 0) {
        swiper.allowSlideNext = true;
        swiper.$el[0].classList.remove("blockButtonsStyles");
      }
    });
  });
}

function checkRulesState() {
  let $currentSlide = event.currentTarget.querySelector(".swiper-slide-active");

  let $checkedInputs = $currentSlide.querySelectorAll("input:checked");

  let $numberInputs = $currentSlide.querySelectorAll("input[type=number]");

  if ($numberInputs.length > 0) numberInputsRule($numberInputs);
  if ($checkedInputs.length > 0) {
    swiper.$el[0].classList.remove("blockButtonsStyles");
    swiper.allowSlideNext = true;
  }

  if ($currentSlide.classList.contains("allowSlideNext")) {
    swiper.$el[0].classList.remove("blockButtonsStyles");
    swiper.allowSlideNext = true;
  }


  if (swiper.activeIndex == swiper.slides.length - 1) swiper.$el[0].classList.remove("blockButtonsStyles");
}

$swiperContainer.addEventListener("click", () => {
  checkRulesState();
});
