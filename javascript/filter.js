const filterYear = document.querySelector('.filter[data-filter="year"]');
const filterMonth = document.querySelector('.filter[data-filter="month"]');
const filterCategory = document.querySelector(
  '.filter[data-filter="category"]'
);

function setActiveClasses() {
  const urlParams = new URLSearchParams(window.location.search);
  const sessionCategory = urlParams.get("c");
  const sessionTag = sessionStorage.getItem("t");
  const sessionYear = sessionStorage.getItem("y");
  const sessionMonth = sessionStorage.getItem("m");

  const filterYearButtons = document.querySelectorAll(
    '.filter[data-filter="year"] button'
  );
  const filterMonthButtons = document.querySelectorAll(
    '.filter[data-filter="month"] button'
  );
  const filterCategoryButtons = document.querySelectorAll(
    '.filter[data-filter="category"] > *'
  );
  const filterTagButtons = document.querySelectorAll(".tag-filter button");

  if (filterYearButtons.length > 0) {
    if (sessionYear !== "") {
      filterYearButtons.forEach((element) => {
        if (element.dataset.year === sessionYear) {
          element.classList.add("selected");
        } else {
          element.classList.remove("selected");
        }
      });
    } else {
      filterYearButtons[0].classList.add("selected");
    }
  }

  if (filterMonthButtons.length > 0) {
    if (sessionMonth !== "") {
      filterMonthButtons.forEach((element) => {
        if (element.dataset.month === sessionMonth) {
          element.classList.add("selected");
        } else {
          element.classList.remove("selected");
        }
      });
    } else {
      filterMonthButtons.forEach((element) => {
        element.classList.remove("selected");
      });
      filterMonthButtons[0].classList.add("selected");
    }
  }

  if (filterCategoryButtons.length > 0) {
    if (sessionCategory !== null) {
      filterCategoryButtons.forEach((element) => {
        if (element.dataset.category === sessionCategory) {
          element.classList.add("selected");
        } else {
          element.classList.remove("selected");
        }
      });
    } else {
      filterCategoryButtons[0].classList.add("selected");
    }
  }

  if (filterTagButtons.length > 0) {
    if (sessionTag !== "") {
      const filterTagButtons = document.querySelectorAll(".tag-filter button");
      filterTagButtons.forEach((element) => {
        if (element.dataset.tag === sessionTag) {
          element.classList.add("selected");
        } else {
          element.classList.remove("selected");
        }
      });
    }
  }
}

function toggleActiveClassYear() {
  filterYear.classList.toggle("active");
}

function toggleActiveClassCategory() {
  filterCategory.classList.toggle("active");
}

function toggleActiveClassMonth() {
  filterMonth.classList.toggle("active");
}

function loadButtonsFunctionality() {
  const filterYearButtonsInactive = document.querySelectorAll(
    '.filter[data-filter="year"] button:not(.selected)'
  );
  const filterYearButtonActive = document.querySelector(
    '.filter[data-filter="year"] button.selected'
  );
  const filterMonthButtonsInactive = document.querySelectorAll(
    '.filter[data-filter="month"] button:not(.selected)'
  );
  const filterMonthButtonActive = document.querySelector(
    '.filter[data-filter="month"] button.selected'
  );
  const filterCategoryButtonActive = document.querySelector(
    '.filter[data-filter="category"] > *.selected'
  );
  const filterCategoryButtonsInactive = document.querySelectorAll(
    '.filter[data-filter="category"] > *:not(.selected)'
  );
  const filterTags = document.querySelectorAll(".tag-filter button");

  if (filterYear) {
    filterYearButtonActive.addEventListener(
      "click",
      toggleActiveClassYear,
      true
    );
    filterYearButtonActive.removeAttribute("onclick");

    filterYearButtonsInactive.forEach((element) => {
      element.removeEventListener("click", toggleActiveClassYear, true);
      element.setAttribute(
        "onclick",
        `filterByYear('${element.dataset.year}')`
      );
    });
  }

  if (filterMonth) {
    filterMonthButtonActive.addEventListener("click", toggleActiveClassMonth);
    filterMonthButtonActive.removeAttribute("onclick");
    filterMonthButtonsInactive.forEach((element) => {
      element.removeEventListener("click", toggleActiveClassMonth);
      element.setAttribute(
        "onclick",
        `filterByMonth('${element.dataset.month}')`
      );
    });
  }

  if (filterCategory) {
    filterCategoryButtonActive.addEventListener(
      "click",
      toggleActiveClassCategory
    );
    filterCategoryButtonActive.removeAttribute("onclick");
    filterCategoryButtonsInactive.forEach((element) => {
      element.removeEventListener("click", toggleActiveClassCategory);
      element.setAttribute(
        "onclick",
        `filterByCategory("${element.dataset.category}", "${element.dataset.url}")`
      );
    });
  }

  if (filterTags) {
    filterTags.forEach((element) => {
      element.setAttribute("onclick", `filterByTag("${element.dataset.tag}")`);
    });
  }
}

function loadContent(listElements) {
  const title = document.querySelector(".counter-title span");
  const urlParams = new URLSearchParams(window.location.search);
  const sessionCategory = urlParams.get("c");
  const sessionTag = sessionStorage.getItem("t");
  const sessionYear = sessionStorage.getItem("y");
  const sessionMonth = sessionStorage.getItem("m");
  let visibleElements = 0;
  listElements.forEach((e) => {
    if (
      (typeof e.dataset.category === "undefined" ||
        sessionCategory === null ||
        e.dataset.category.includes(sessionCategory)) &&
      (typeof e.dataset.tag === "undefined" ||
        e.dataset.tag.includes(sessionTag)) &&
      (typeof e.dataset.year === "undefined" ||
        e.dataset.year.includes(sessionYear)) &&
      (typeof e.dataset.month === "undefined" ||
        e.dataset.month.includes(sessionMonth))
    ) {
      e.style.display = "block";
      visibleElements++;
    } else {
      e.style.display = "none";
    }

    if (visibleElements > maxVisibleElements) {
      e.style.display = "none";
      visibleElements--;
    }
  });
  if (title)
    title.textContent = title.textContent.replace(/\d+/, visibleElements);
  toggleLoadMoreButtonVisibility(listElements, visibleElements);
}

function loadMore(listElements) {
  maxVisibleElements += 3;
  loadContent(listElements);
}

function toggleLoadMoreButtonVisibility(listElements, visibleElements) {
  const btnLoadMore = document.querySelector(".load-more");
  if (btnLoadMore) {
    if (
      visibleElements >= listElements.length ||
      visibleElements < maxVisibleElements
    ) {
      btnLoadMore.style.display = "none";
    } else {
      btnLoadMore.style.display = "block";
    }
  }
}

function loadCountAndSetVisibilityInFilterButtons(listElements) {
  const filterYearButtons = document.querySelectorAll(
    '.filter[data-filter="year"] button'
  );
  const filterMonthButtons = document.querySelectorAll(
    '.filter[data-filter="month"] button'
  );
  const filterCategoryButtons = document.querySelectorAll(
    '.filter[data-filter="category"] > *'
  );
  if (filterYearButtons.length > 0)
    filterYearButtons.forEach((button) => {
      const elementsWithYear = Array.from(listElements).filter(function (
        element
      ) {
        return element.dataset.year === button.dataset.year;
      });
      if (elementsWithYear.length === 0) {
        button.style.display = "none";
      } else {
        button.dataset.count = elementsWithYear.length;
        button.style.display = "block";
      }
    });

  if (filterMonthButtons.length > 0) {
    filterMonthButtons.forEach((button) => {
      const elementsWithMonth = Array.from(listElements).filter(function (
        element
      ) {
        return element.dataset.month === button.dataset.month;
      });
      if (elementsWithMonth.length === 0) {
        button.style.display = "none";
      } else {
        button.dataset.count = elementsWithMonth.length;
        button.style.display = "block";
      }
    });
    filterMonthButtons[0].dataset.count = listElements.length;
    filterMonthButtons[0].style.display = "block";
  }

  if (filterCategoryButtons.length > 0) {
    filterCategoryButtons.forEach((button) => {
      const elementsWithCategory = Array.from(listElements).filter(function (
        element
      ) {
        return element.dataset.category === button.dataset.category;
      });
      if (elementsWithCategory.length === 0) {
        button.style.display = "none";
      } else {
        button.dataset.count = elementsWithCategory.length;
        button.style.display = "block";
      }
    });
    filterCategoryButtons[0].dataset.count = listElements.length;
    filterCategoryButtons[0].style.display = "block";
  }
}

function filterByMonth(filter) {
  sessionStorage.setItem("m", filter);
  setActiveClasses();
  loadButtonsFunctionality();
  loadCountAndSetVisibilityInFilterButtons(listElements);
  loadContent(listElements);
  filterMonth.classList.remove("active");
}

function filterByYear(filter) {
  sessionStorage.setItem("y", filter);
  setActiveClasses();
  loadButtonsFunctionality();
  loadCountAndSetVisibilityInFilterButtons(listElements);
  loadContent(listElements);
  filterYear.classList.remove("active");
}

function filterByTag(filter) {
  sessionStorage.setItem("t", filter);
  setActiveClasses();
  loadButtonsFunctionality();
  loadCountAndSetVisibilityInFilterButtons(listElements);
  loadContent(listElements);
}

function filterByCategory(filter, redirect) {
  let url = new URL(window.location.origin + "/fabiomunra" + redirect);
  url.searchParams.set("c", filter);
  window.location.href = url.href;
}

window.addEventListener("DOMContentLoaded", () => {
  console.log(sessionStorage);
  setActiveClasses();
  loadButtonsFunctionality();
  loadCountAndSetVisibilityInFilterButtons(listElements);
  loadContent(listElements);
});
